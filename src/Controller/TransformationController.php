<?php

namespace App\Controller;

use App\Entity\InfoCoach;
use App\Entity\Transformation;
use App\Form\TransformationType;
use App\Repository\TransformationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransformationController extends AbstractController
{
    /**
     * @Route("/transformations", name="transformations", methods={"GET"})
     */
    public function index(TransformationRepository $transformRepository): Response
    {
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        return $this->render('transformations/index.html.twig', [
            'coachInfo' => $coachInfo,
            'transformations' => $transformRepository->findAll(),
            'page' => 'transformation',
        ]);
    }
}
