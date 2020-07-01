<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // Création d’un utilisateur de type “auteur”
        $member = new User();
        $member->setFirstname('Jean');
        $member->setLastname('Dupont');
        $member->setPhone('06 06 06 06 06');
        $member->setEmail('member@monsite.com');
        $member->setRoles(['ROLE_MEMBER']);
        $member->setPassword($this->passwordEncoder->encodePassword(
            $member,
            'memberpassword'
        ));

        $manager->persist($member);
        $this->addReference('user_' . 0, $member);

        // Création d’un utilisateur de type “administrateur”
        $admin = new User();
        $admin->setFirstname('Peter');
        $admin->setLastname('Dionisio');
        $admin->setEmail('admin@monsite.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'adminpassword'
        ));

        $manager->persist($admin);

        // Sauvegarde des 2 nouveaux utilisateurs :
        $manager->flush();
    }
}
