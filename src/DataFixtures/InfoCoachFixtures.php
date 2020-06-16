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
        $infoCoach->setCatchline('Ma méthode de coaching repose sur une approche naturelle et respectueuse 
        du corps en prenant en compte 4 piliers santé :
    Alimentation, 
    Sommeil, 
    Stress, et 
    Activité physique.
');
        $infoCoach->setCity('Orléans');
        $infoCoach->setMail('infos@coach-peter.com');
        $infoCoach->setPhilosophy("N'attendez pas le bon moment, il n'arrivera jamais. Commencez maintenant.");
        $infoCoach->setPhone('0601234567');
        $infoCoach->setZipCode('45100');
        $infoCoach->setPresentation("Ma mission en tant que coach est de vous accompagner vers
            la réalisation de vos objectifs, de booster votre motivation vers le chemin de la réussite, que ça soit une
            perte de poids, une remise en forme ou une recherche de développement musculaire.
            Sportif depuis petit et passionné par le fonctionnement du corps humain, je m’oriente vers les métiers de
            la forme et de la santé en validant le diplôme BPJEPS AGFF au centre de formation FORMASAT Orléans.
            J’ai très vite pris goût à aider et à voir évolué les personnes que j’encadrai, ce qui m’amène à me
            spécialiser dans le coaching personnel, l’alimentation et tout ce qui touche à la santé au naturelle");
        $infoCoach->setImage('coach_image_about_me_home.jpg');

        $manager->persist($infoCoach);

        $manager->flush();
    }
}
