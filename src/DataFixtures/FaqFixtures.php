<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Faq;
use Faker;

class FaqFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 10; $i++) {
            $faq = new Faq();
            $faq->setQuestion($faker->realText(100));
            $faq->setAnswer($faker->realText(200));
            $manager->persist($faq);
        }
        $manager->flush();
    }
}
