<?php


namespace App\DataFixtures;

use App\Entity\Actuality;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ActualityFixtures extends Fixture
{

    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 10; $i++) {
            $actuality = new Actuality();
            $actuality->setTitle($faker->text(20));
            $actuality->setDate($faker->dateTime);
            $actuality->setContent($faker->text);
            $actuality->setPicture($faker->imageUrl());
            $actuality->setTopic($faker->text(20));
            $manager->persist($actuality);
        }
        $manager->flush();
    }
}
