<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ActivityFixtures extends Fixture
{
    const ICONS = [
        'box' => 1,
        'computer' => 2,
        'dumbbell'=> 3,
        'jumping_rope'=> 4,
        'pilate_women'=> 5,
        'team'=> 6
    ];

    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i=0; $i<=20; $i++) {
            $activity = new Activity();
            $activity->setTitle($faker->realtext(30));
            $activity->setDescription($faker->realtext(500));
            $activity->setPicture('header_sportif_lacets.jpg');
            $activity->setPictogram(array_rand(self::ICONS));
            $activity->setFocus(1);
            $activity->setCategory(array_rand($activity::CATEGORY));
            $manager->persist($activity);
        }
        $manager->flush();
    }
}
