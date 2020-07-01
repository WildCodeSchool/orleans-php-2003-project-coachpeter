<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Assert\Choice(choices=App\Form\UserType::ROLES, message="Veuillez choisir au moins un rôle.")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(max=255, maxMessage="Le prénom {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit}} caractères.")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(max=255, maxMessage="Le nom de famille {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit}} caractères.")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255, maxMessage="Le numéro {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit}} caractères.")
     */
    private $phone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getfirstname(): ?string
    {
        return $this->firstname;
    }

    public function setfirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getlastname(): ?string
    {
        return $this->lastname;
    }

    public function setlastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getphone(): ?string
    {
        return $this->phone;
    }

    public function setphone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
}
