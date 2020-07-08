<?php

namespace App\Controller;

use App\Entity\Degree;
use App\Form\DegreeType;
use App\Repository\DegreeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/certification")
 */
class AdminDegreeController extends AbstractController
{
    /**
     * @Route("/", name="degree_index", methods={"GET"})
     */
    public function index(DegreeRepository $degreeRepository): Response
    {
        return $this->render('admin_degree/index.html.twig', [
            'degrees' => $degreeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="degree_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $degree = new Degree();
        $form = $this->createForm(DegreeType::class, $degree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($degree);
            $entityManager->flush();

            return $this->redirectToRoute('degree_index');
        }

        return $this->render('admin_degree/new.html.twig', [
            'admin_degree' => $degree,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="degree_show", methods={"GET"})
     */
    public function show(Degree $degree): Response
    {
        return $this->render('admin_degree/show.html.twig', [
            'admin_degree' => $degree,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="degree_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Degree $degree): Response
    {
        $form = $this->createForm(DegreeType::class, $degree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('degree_index');
        }

        return $this->render('admin_degree/edit.html.twig', [
            'admin_degree' => $degree,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="degree_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Degree $degree): Response
    {
        if ($this->isCsrfTokenValid('delete'.$degree->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($degree);
            $entityManager->flush();
        }

        return $this->redirectToRoute('degree_index');
    }
}
