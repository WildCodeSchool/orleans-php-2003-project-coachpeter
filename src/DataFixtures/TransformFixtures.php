<?php


namespace App\DataFixtures;

use App\Entity\Transformation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class TransformFixtures extends Fixture
{
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 4; $i++) {
            $transformation = new Transformation();
            $transformation->setName($faker->Name('female'));
            $transformation->setPound($faker->numberBetween(5, 20));
            $transformation->setPictureBefore($faker->imageUrl(640, 480));
            $transformation->setPictureAfter($faker->imageUrl());

            $manager->persist($transformation);
        }
        $manager->flush();
    }
}
