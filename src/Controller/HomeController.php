<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Entity\InfoCoach;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(): Response
    {
        $coachInfos = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findAll();

        $actualities = $this->getDoctrine()
            ->getRepository(Actuality::class)
            ->findBy([], ['date' => 'desc'], 3);

        return $this->render('home/home.html.twig', [
            'coachInfos' => $coachInfos,
            'actualities' => $actualities,
        ]);
    }
}
