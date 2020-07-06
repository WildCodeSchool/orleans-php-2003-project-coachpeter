<?php


namespace App\Controller;

use App\Entity\InfoCoach;
use App\Entity\User;
use App\Entity\Attended;
use App\Entity\Program;
use App\Repository\AttendedRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MemberController extends AbstractController
{
    /**
     * @Route("/membre/{id}", name="app_member")
     */
    public function index(User $user, AttendedRepository $attendedRepository) : Response
    {
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        return $this->render('member/index.html.twig', [
            'coachInfo' => $coachInfo,
            'member' => $user,
            'attendeds' => $user->getAttendeds(),
        ]);
    }
}
