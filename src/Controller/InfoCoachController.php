<?php

namespace App\Controller;

use App\Entity\InfoCoach;
use App\Form\InfoCoachType;
use App\Repository\InfoCoachRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/infocoach")
 */
class InfoCoachController extends AbstractController
{
    /**
     * @Route("/", name="info_coach_index", methods={"GET"})
     */
    public function index(InfoCoachRepository $infoCoachRepository): Response
    {
        return $this->render('admin_info_coach/index.html.twig', [
            'infoCoach' => $infoCoachRepository->findOneBy([]),
        ]);
    }

    /**
     * @Route("/new", name="info_coach_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $infoCoach = new InfoCoach();
        $form = $this->createForm(InfoCoachType::class, $infoCoach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infoCoach);
            $entityManager->flush();

            return $this->redirectToRoute('info_coach_index');
        }

        return $this->render('admin_info_coach/new.html.twig', [
            'infoCoach' => $infoCoach,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="info_coach_show", methods={"GET"})
     */
    public function show(InfoCoach $infoCoach): Response
    {
        return $this->render('admin_info_coach/show.html.twig', [
            'infoCoach' => $infoCoach,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="info_coach_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InfoCoach $infoCoach): Response
    {
        $form = $this->createForm(InfoCoachType::class, $infoCoach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Les informations ont bien été mise à jour.');

            return $this->redirectToRoute('info_coach_index');
        }

        return $this->render('admin_info_coach/edit.html.twig', [
            'infoCoach' => $infoCoach,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="info_coach_delete", methods={"DELETE"})
     */
    public function delete(Request $request, InfoCoach $infoCoach): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infoCoach->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($infoCoach);
            $entityManager->flush();
        }

        return $this->redirectToRoute('info_coach_index');
    }
}
