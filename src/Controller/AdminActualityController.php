<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Form\ActualityType;
use App\Repository\ActualityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/actuality")
 */
class AdminActualityController extends AbstractController
{
    /**
     * @Route("/", name="actuality_index", methods={"GET"})
     */
    public function index(ActualityRepository $actualityRepository): Response
    {
        return $this->render('admin_actuality/index.html.twig', [
            'actualities' => $actualityRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="actuality_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $actuality = new Actuality();
        $form = $this->createForm(ActualityType::class, $actuality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($actuality);
            $entityManager->flush();
            $this->addFlash('success', 'L\'actualité a bien été ajoutée');
            return $this->redirectToRoute('actuality_index');
        }

        return $this->render('admin_actuality/new.html.twig', [
            'actuality' => $actuality,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="actuality_show", methods={"GET"})
     */
    public function show(Actuality $actuality): Response
    {
        return $this->render('admin_actuality/show.html.twig', [
            'actuality' => $actuality,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="actuality_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Actuality $actuality): Response
    {
        $form = $this->createForm(ActualityType::class, $actuality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'L\'actualité a bien été modifiée');
            return $this->redirectToRoute('actuality_index');
        }

        return $this->render('admin_actuality/edit.html.twig', [
            'actuality' => $actuality,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="actuality_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Actuality $actuality): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actuality->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($actuality);
            $entityManager->flush();
        }

        return $this->redirectToRoute('actuality_index');
    }
}
