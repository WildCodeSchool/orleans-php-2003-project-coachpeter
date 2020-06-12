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
        $faker = Faker\Factory::create( 'fr_FR');
        for ($i = 1; $i <= 50; $i++) {
            $actuality = new Actuality();
            $actuality->setTitle($faker->title);
            $actuality->setDate($faker->dateTime);
            $actuality->setContent($faker->text);
            $actuality->setPicture($faker->imageUrl($width = 640, $height = 480));
            $actuality->setTheme($faker->title);
            $manager->persist($actuality);
        }
        $manager->flush();

    }
}