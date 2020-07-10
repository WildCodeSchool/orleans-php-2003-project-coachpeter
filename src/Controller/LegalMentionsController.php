<?php


namespace App\Controller;

use App\Entity\InfoCoach;
use App\Repository\FaqRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalMentionsController extends AbstractController
{
    /**
     * @Route("/legals", name="index_legals")
     */
    public function index() : Response
    {
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        return $this->render('legals/index.html.twig', [
            'coachInfo' => $coachInfo,
        ]);
    }
}
