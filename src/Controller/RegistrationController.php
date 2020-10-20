<?php

namespace App\Controller;

use App\Entity\InfoCoach;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/inscription", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler
    $guardHandler, LoginFormAuthenticator $authenticator, TokenGeneratorInterface $tokenGenerator): Response
    {
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $user->setRoles(['ROLE_CLIENT']);
            $user->setConfirmationToken($tokenGenerator->getRandomSecureToken(30));
            $user->setIsVerified(false);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('success', 'Votre inscription a bien été prise en compte, 
            elle est en attente de validation.');
            // do anything else you need here, like send an email
            /**
             * @var Response
             */
            $response = $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
            return $response;
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'coachInfo' => $coachInfo,
        ]);
    }
}
