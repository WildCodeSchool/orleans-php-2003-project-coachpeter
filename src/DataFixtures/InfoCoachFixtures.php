<?php

namespace App\DataFixtures;

use App\Entity\InfoCoach;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class InfoCoachFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $infoCoach = new InfoCoach();
        $infoCoach->setAdress('50 rue de Tudelle');
        $infoCoach->setCatchline('Phrase d\'accroche du Coach Peter');
        $infoCoach->setCity('Orléans');
        $infoCoach->setMail('coach@peter.com');
        $infoCoach->setPhilosophy('Le ciel étoilé au dessus de moi et la loi morale en moi - E Kant');
        $infoCoach->setPhone('0601234567');
        $infoCoach->setZipCode('45100');
        $infoCoach->setPresentation('J\'me présente, je m\'appelle Peter');
        $infoCoach->setImage('coach_image_about_me_home.jpg');

        $manager->persist($infoCoach);

        $manager->flush();
    }
}
