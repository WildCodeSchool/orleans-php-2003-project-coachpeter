<?php


namespace App\Controller;

use App\Entity\InfoCoach;
use App\Repository\FaqRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FaqController extends AbstractController
{
    /**
     * @Route("/faq", name="app_faq")
     */
    public function index(FaqRepository $faqRepository) : Response
    {
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        return $this->render('faq/index.html.twig', [
            'coachInfo' => $coachInfo,
            'faqs' => $faqRepository->findAll(),
        ]);
    }
}
