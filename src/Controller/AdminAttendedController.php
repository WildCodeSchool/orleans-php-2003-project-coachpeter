<?php

namespace App\Controller;

use App\Entity\Attended;
use App\Form\AttendedEditType;
use App\Form\AttendedType;
use App\Repository\AttendedRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/adhesion")
 */
class AdminAttendedController extends AbstractController
{
    /**
     * @Route("/", name="attended_index", methods={"GET"})
     */
    public function index(AttendedRepository $attendedRepository): Response
    {
        return $this->render('admin_attended/index.html.twig', [
            'attendeds' => $attendedRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="attended_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $attended = new Attended();
        $form = $this->createForm(AttendedType::class, $attended);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($attended);
            $entityManager->flush();

            return $this->redirectToRoute('attended_index');
        }

        return $this->render('admin_attended/new.html.twig', [
            'attended' => $attended,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="attended_show", methods={"GET"})
     */
    public function show(Attended $attended): Response
    {
        return $this->render('admin_attended/show.html.twig', [
            'attended' => $attended,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="attended_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Attended $attended): Response
    {
        $form = $this->createForm(AttendedEditType::class, $attended);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $attended->getUser();
            $attended->getProgram();
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('attended_index');
        }

        return $this->render('admin_attended/edit.html.twig', [
            'attended' => $attended,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="attended_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Attended $attended): Response
    {
        if ($this->isCsrfTokenValid('delete'.$attended->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($attended);
            $entityManager->flush();
        }

        return $this->redirectToRoute('attended_index');
    }
}
