<?php


namespace App\DataFixtures;

use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ThemeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i <= 6; $i++) {
            $theme = new Theme();
            $theme->setName($faker->title);
            $manager->persist($theme);
            $this->addReference($i, $theme;
        }
        $manager->flush();
    }
}
