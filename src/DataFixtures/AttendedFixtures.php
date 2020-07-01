<?php

namespace App\DataFixtures;

use App\Entity\Attended;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AttendedFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        $attended = new Attended();
        $attended->setBeginDate($faker->dateTime);
        $attended->setEndDate($faker->dateTime);
        $attended->setUser($this->getReference('user_' . 0));
        $attended->setProgram($this->getReference('program_' . '0'));

        $manager->persist($attended);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [UserFixtures::class, ProgramFixtures::class];
    }
}
