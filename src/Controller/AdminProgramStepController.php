<?php

namespace App\Controller;

use App\Entity\ProgramStep;
use App\Form\ProgramStepType;
use App\Repository\ProgStepRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/program/step")
 */
class AdminProgramStepController extends AbstractController
{
    /**
     * @Route("/", name="program_step_index", methods={"GET"})
     */
    public function index(ProgStepRepository $progStepRepository): Response
    {
        return $this->render('admin_program_step/index.html.twig', [
            'program_steps' => $progStepRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="program_step_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $programStep = new ProgramStep();
        $form = $this->createForm(ProgramStepType::class, $programStep);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($programStep);
            $entityManager->flush();

            return $this->redirectToRoute('program_step_index');
        }

        return $this->render('admin_program_step/new.html.twig', [
            'program_step' => $programStep,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="program_step_show", methods={"GET"})
     */
    public function show(ProgramStep $programStep): Response
    {
        return $this->render('admin_program_step/show.html.twig', [
            'program_step' => $programStep,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="program_step_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProgramStep $programStep): Response
    {
        $form = $this->createForm(ProgramStepType::class, $programStep);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('program_index');
        }

        return $this->render('admin_program_step/edit.html.twig', [
            'program_step' => $programStep,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="program_step_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ProgramStep $programStep): Response
    {
        if ($this->isCsrfTokenValid('delete'.$programStep->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($programStep);
            $entityManager->flush();
        }

        return $this->redirectToRoute('program_index');
    }
}
