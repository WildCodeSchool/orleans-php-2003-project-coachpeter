<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $program = new Program();
        $program->setName('Perte de poids');
        $program->setDuration(180);
        $manager->persist($program);
        $this->addReference('program', $program);

        $manager->flush();
    }
}
