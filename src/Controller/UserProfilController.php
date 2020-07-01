<?php


namespace App\Controller;

use App\Entity\InfoCoach;
use App\Entity\User;
use App\Form\ProfilType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil")
 */
class UserProfilController extends AbstractController
{
    /**
     * @Route("/{id}", name="profil_show", methods={"GET"})
     */
    public function showProfil(User $user): Response
    {
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        return $this->render('member/profil.html.twig', [
            'user' => $user,
            'coachInfo' => $coachInfo,
        ]);
    }
}
