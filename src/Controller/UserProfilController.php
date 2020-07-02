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
     * @Route("/", name="profil_show", methods={"GET"})
     */
    public function showProfil(): Response
    {
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        return $this->render('member/profil.html.twig', [
            'coachInfo' => $coachInfo,
        ]);
    }

    /**
     * @Route("/edit", name="profil_edit", methods={"GET","POST"})
     */

    public function editProfil(Request $request): Response
    {
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        $form = $this->createForm(ProfilType::class, $this->getUser());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_index');
        }

        return $this->render('member/editProfil.html.twig', [
            'form' => $form->createView(),
            'coachInfo' => $coachInfo,
        ]);
    }
}
