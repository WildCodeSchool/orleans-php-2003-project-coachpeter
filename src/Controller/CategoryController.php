<?php

namespace App\Controller;

use App\Entity\CoachingCategory;
use App\Form\CoachingCategoryType;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/coaching/category")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="coaching_category_index", methods={"GET"})
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('coaching_category/index.html.twig', [
            'coaching_categories' => $categoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="coaching_category_new", methods={"GET","POST"})
     */
    public function new(Request $request, CategoryRepository $categoryRepository): Response
    {
        $coachingCategory = new CoachingCategory();
        $form = $this->createForm(CoachingCategoryType::class, $coachingCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($coachingCategory);
            $entityManager->flush();
            $this->addFlash(
                'success',
                $coachingCategory->getCategory().' a bien été ajouté aux catégories existantes.'
            );

            return $this->redirectToRoute('activity_new');
        }

        return $this->render('coaching_category/new.html.twig', [
            'coaching_category' => $coachingCategory,
            'form' => $form->createView(),
            'coaching_categories' => $categoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="coaching_category_show", methods={"GET"})
     */
    public function show(CoachingCategory $coachingCategory): Response
    {
        return $this->render('coaching_category/show.html.twig', [
            'coaching_category' => $coachingCategory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="coaching_category_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CoachingCategory $coachingCategory): Response
    {
        $form = $this->createForm(CoachingCategoryType::class, $coachingCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('coaching_category_index');
        }

        return $this->render('coaching_category/edit.html.twig', [
            'coaching_category' => $coachingCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="coaching_category_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CoachingCategory $coachingCategory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coachingCategory->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($coachingCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('coaching_category_index');
    }
}
