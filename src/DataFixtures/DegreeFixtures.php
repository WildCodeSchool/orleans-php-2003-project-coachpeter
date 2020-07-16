<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Degree;
use Faker;

class DegreeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <=7; $i++) {
            $degree= new Degree();
            $degree->setName($faker->realText(20));
            $degree->setOrganism($faker->realText(20));
            $degree->setDescription($faker->realText(20));
            $degree->setStartDate($faker->numberBetween(2000, 2020));
            $degree->setEndDate($faker->year('now'));
            $manager->persist($degree);
        }
        $manager->flush();
    }
}
