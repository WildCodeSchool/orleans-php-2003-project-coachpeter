<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\CoachType;

class ActivityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
            $faker  =  Faker\Factory::create('fr_FR');
            for ($i=0; $i<3; $i++) {
                $activity = new Activity();
                $activity->setTitle($faker->realtext(30));
                $activity->setDescription($faker->realtext(500));
                $activity->setPicture('http://formation.naveilhan.com/fixtures/activity'.($i+1).'.jpg');
                $activity->setPictogram('build/white_haltere.svg');
                $activity->setFocus(1);
                $manager->persist($activity);
            }
        $manager->flush();
    }
}
