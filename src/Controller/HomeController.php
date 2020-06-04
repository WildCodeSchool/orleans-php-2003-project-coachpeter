<?php

namespace App\Controller;

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
        $transformations = $this->getDoctrine()
            ->getRepository(Transformation::class)
            ->findAll();

        return $this->render('home/home.html.twig', [
            'transformations'=>$transformations,
        ]);
    }
}
