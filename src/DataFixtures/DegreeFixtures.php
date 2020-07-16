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
            $degree->setStartDate($faker->numberBetween($min = 2000, $max = 2005));
            $degree->setEndDate($faker->numberBetween($min = 2005, $max = 2010));
            $manager->persist($degree);
        }
        $manager->flush();
    }
}
