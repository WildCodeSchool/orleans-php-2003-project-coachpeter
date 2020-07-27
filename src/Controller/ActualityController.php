<?php

namespace App\Controller;

use App\Entity\InfoCoach;
use App\Repository\ActualityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualityController extends AbstractController
{
    /**
     * @Route("/actualite", name="app_actuality")
     */
    public function index(ActualityRepository $actualityRepository): Response
    {
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        return $this->render('actuality/index.html.twig', [
            'coachInfo' => $coachInfo,
            'actualities' => $actualityRepository->findBy([], ['date' => 'desc']),
            'page' => 'actuality'
        ]);
    }
}
