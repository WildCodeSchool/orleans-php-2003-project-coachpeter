<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Entity\Activity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Transformation;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(): Response
    {
        $activities = $this->getDoctrine()
            ->getRepository(Activity::class)
            ->findBy(['focus' => true]);

        $transformations = $this->getDoctrine()
            ->getRepository(Transformation::class)
            ->findAll();

        $actualities = $this->getDoctrine()
            ->getRepository(Actuality::class)
            ->findBy([], ['date' => 'desc'], 3);

        return $this->render('home/home.html.twig', [
            'activities' => $activities,
            'transformations'=>$transformations,
            'actualities' => $actualities,
        ]);
    }
}
