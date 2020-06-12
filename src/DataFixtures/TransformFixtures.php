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
            $transformation->setName($faker->Name(15));
            $transformation->setPound($faker->numberBetween($min = 5, $max = 20));
            $transformation->setPictureBefore($faker->imageUrl($width = 640, $height = 480));
            $transformation->setPictureAfter($faker->imageUrl($width = 640, $height = 480));

            $manager->persist($transformation);
          }
        $manager->flush();
    }
}