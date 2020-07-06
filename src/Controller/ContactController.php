<?php

namespace App\Controller;

use App\Entity\InfoCoach;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact/", name="app_contact")
     * @return Response
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        if ($form->isSubmitted() && $form->isValid()) {
            $dataForm = $_POST['contact'];
            $email = (new Email())
                ->from($dataForm['email'])
                ->to('peter.dionisiopro@gmail.com')
                ->subject('Un nouvelle personnage vous a contacté depuis votre site Internet')
                ->html('<h3>Une nouvelle personne vous a contacté par le biais du formulaire de contact :</h3>
                        <p>Prénom : ' . $dataForm['firstname'] . '</p>
                        <p>Nom : ' . $dataForm['lastname'] . '</p>
                        <p>Numéro de téléphone : ' . $dataForm['phone'] . '</p>
                        <p>Email : ' . $dataForm['email'] . '</p>
                        <p>Message : ' . $dataForm['message'] . '</p>
                        ');

            $mailer->send($email);
        }
        return $this->render('contact/contact.html.twig', [
            'coachInfo' => $coachInfo,
            'form' => $form->createView(),
        ]);
    }
}
