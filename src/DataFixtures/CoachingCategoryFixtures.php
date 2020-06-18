<?php

namespace App\DataFixtures;

use App\Entity\CoachingCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class CoachingCategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i=0; $i<=10; $i++) {
            $category = new CoachingCategory();
            $category->setCategory($faker->colorName);
            $manager->persist($category);
            $this->addReference($i, $category);
        }
        $manager->flush();
    }
}
