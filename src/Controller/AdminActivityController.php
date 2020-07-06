<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\ActivityType;
use App\Repository\ActivityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/activites")
 */
class AdminActivityController extends AbstractController
{
    /**
     * @Route("/", name="activity_index", methods={"GET"})
     */
    public function index(ActivityRepository $activityRepository): Response
    {
        return $this->render('admin_activity/index.html.twig', [
            'activities' => $activityRepository->findBy(
                [],
                ['category' => 'DESC']
            ),
        ]);
    }

    /**
     * @Route("/new", name="activity_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $activity = new Activity();
        $form = $this->createForm(ActivityType::class, $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($activity);
            $entityManager->flush();
            $this->addFlash('success', 'L\'activité a bien été ajoutée');
            return $this->redirectToRoute('activity_index');
        }

        return $this->render('admin_activity/new.html.twig', [
            'activity' => $activity,
            'form' => $form->createView(),
            'coaching_categories' => $activity::CATEGORY,

        ]);
    }

    /**
     * @Route("/{id}", name="activity_show", methods={"GET"})
     */
    public function show(Activity $activity): Response
    {
        return $this->render('admin_activity/show.html.twig', [
            'activity' => $activity,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="activity_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Activity $activity): Response
    {
        $form = $this->createForm(ActivityType::class, $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'L\'activité a bien été mise à jour');

            return $this->redirectToRoute('activity_index');
        }

        return $this->render('admin_activity/edit.html.twig', [
            'activity' => $activity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="activity_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Activity $activity): Response
    {
        if ($this->isCsrfTokenValid('delete'.$activity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($activity);
            $entityManager->flush();
            $this->addFlash('danger', 'L\'actualité a bien été supprimée');
        }

        return $this->redirectToRoute('activity_index');
    }
}
