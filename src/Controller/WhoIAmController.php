<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Entity\InfoCoach;
use App\Entity\Degree;
use App\Entity\Activity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Transformation;

class WhoIAmController extends AbstractController
{
    /**
     * @Route("/qui-suis-je", name="whoiam_index")
     */
    public function index(): Response
    {
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        $coachDegrees = $this->getDoctrine()
            ->getRepository(Degree::class)
            ->findAll();

        return $this->render('WhoIAm/index.html.twig', [
            'degrees' => $coachDegrees,
            'coachInfo' => $coachInfo,
            'page' => 'whoiam'
        ]);
    }
}
