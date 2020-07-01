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

    /**
     * @Route("/{id}/edit", name="profil_edit", methods={"GET","POST"})
     */

    public function editProfil(Request $request, User $user): Response
    {
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        $form = $this->createForm(ProfilType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_index');
        }

        return $this->render('member/editProfil.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'coachInfo' => $coachInfo,
        ]);
    }
}
