<?php

namespace App\DataFixtures;

use App\Entity\Attended;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AttendedFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        $attended = new Attended();
        $attended->setBeginDate($faker->dateTime);
        $attended->setEndDate($faker->dateTime);
        $attended->setUser($this->getReference('user'));
        $attended->setProgram($this->getReference('program'));

        $manager->persist($attended);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [UserFixtures::class, ProgramFixtures::class];
    }
}
