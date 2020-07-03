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

class TeamTrainingController extends AbstractController
{
    /**
     * @Route("/team_training", name="index_team_traing")
     */
    public function index(): Response
    {
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        return $this->render('planning/index.html.twig', [
            'coachInfo' => $coachInfo,
        ]);
    }
}
