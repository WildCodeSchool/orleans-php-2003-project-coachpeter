<?php

namespace App\DataFixtures;

use App\Entity\RessourceType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RessourceFixtures extends Fixture
{
    const TYPE=['PDF', 'Vidéo', 'Image', 'Texte'];

    public function load(ObjectManager $manager)
    {
        foreach (self::TYPE as $name) {
            $ressourceType = new RessourceType();
            $ressourceType->setName($name);
            $manager->persist($ressourceType);
        }
        $manager->flush();
    }
}
