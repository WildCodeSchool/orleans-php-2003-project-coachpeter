<?php

namespace App\Controller;

use App\Entity\Ressource;
use App\Entity\ProgramStep;
use App\Entity\Theme;
use App\Form\RessourceType;
use App\Form\ThemeType;
use App\Repository\ProgramStepRepository;
use App\Repository\RessourceRepository;
use App\Repository\ThemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/ressource")
 */
class AdminRessourceController extends AbstractController
{
    /**
     * @Route("/", name="ressource_index", methods={"GET"})
     */
    public function index(RessourceRepository $ressourceRepository): Response
    {
        return $this->render('admin_ressource/index.html.twig', [
            'ressources' => $ressourceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{id}", name="ressource_new", methods={"GET","POST"})
     */
    public function new(Request $request, ThemeRepository $themeRepository, ProgramStep $programStep): Response
    {
        $ressource = new Ressource();
        $form = $this->createForm(RessourceType::class, $ressource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ressource->setProgramStep($programStep);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ressource);
            $entityManager->flush();

            return $this->redirectToRoute('program_index');
        }

        $theme = new Theme();
        $themeForm = $this->createForm(ThemeType::class, $theme);
        $themeForm->handleRequest($request);

        if ($themeForm->isSubmitted() && $themeForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($theme);
            $entityManager->flush();
            $this->addFlash(
                'success',
                $theme->getNameTheme() .' a bien été ajouté aux thèmes existants.'
            );
            return $this->redirectToRoute('ressource_new', ['id'=>$programStep->getId()]);
        }


        return $this->render('admin_ressource/new.html.twig', [
            'ressource' => $ressource,
            'form' => $form->createView(),
            'themeForm' => $themeForm->createView(),
            'programStep' => $programStep,
        ]);
    }

    /**
     * @Route("/{id}", name="ressource_show", methods={"GET"})
     */
    public function show(Ressource $ressource): Response
    {
        return $this->render('admin_ressource/show.html.twig', [
            'ressource' => $ressource,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ressource_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ressource $ressource, ThemeRepository $themeRepository): Response
    {
        $form = $this->createForm(RessourceType::class, $ressource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('program_index');
        }

        $theme = new Theme();
        $themeForm = $this->createForm(ThemeType::class, $theme);
        $themeForm->handleRequest($request);

        if ($themeForm->isSubmitted() && $themeForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($theme);
            $entityManager->flush();
            $this->addFlash(
                'success',
                $theme->getNameTheme() . ' a bien été ajouté aux thèmes existants.'
            );
        }

        return $this->render('admin_ressource/edit.html.twig', [
            'ressource' => $ressource,
            'form' => $form->createView(),
            'themeForm' => $themeForm->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ressource_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ressource $ressource): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ressource->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ressource);
            $entityManager->flush();
        }

        return $this->redirectToRoute('program_index');
    }
}
