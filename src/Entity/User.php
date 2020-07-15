<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    const ROLES = [
    "Membre" => "ROLE_MEMBER",
    "Administrateur" => "ROLE_ADMIN",];

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
     * @Assert\All({
     *      @Assert\Choice(choices=App\Entity\User::ROLES, message="Le rôle {{ value }} n'est pas autorisé.")
     * })
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez renseigner votre prénom.")
     * @Assert\Length(max=255, maxMessage="Le prénom {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit }} caractères.")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez renseigner votre nom.")
     * @Assert\Length(max=255, maxMessage="Le nom de famille {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit }} caractères.")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255, maxMessage="Le numéro {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit }} caractères.")
     *@Assert\Type(
     *     type="numeric",
     *     message="{{ value }} doit être un numéro de téléphone au format numérique."
     * )
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity=Attended::class, mappedBy="user", orphanRemoval=true)
     */
    private $attendeds;

    public function __construct()
    {
        $this->attendeds = new ArrayCollection();
    }

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

    public function setfirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getlastname(): ?string
    {
        return $this->lastname;
    }

    public function setlastname(?string $lastname): self
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

    /**
     * @return Collection|Attended[]
     */
    public function getAttendeds(): Collection
    {
        return $this->attendeds;
    }

    public function addAttended(Attended $attended): self
    {
        if (!$this->attendeds->contains($attended)) {
            $this->attendeds[] = $attended;
            $attended->setUser($this);
        }

        return $this;
    }

    public function removeAttended(Attended $attended): self
    {
        if ($this->attendeds->contains($attended)) {
            $this->attendeds->removeElement($attended);
            // set the owning side to null (unless already changed)
            if ($attended->getUser() === $this) {
                $attended->setUser(null);
            }
        }

        return $this;
    }

    public function getFirstAndLastname()
    {
        return $this->firstname.' '.$this->lastname;
    }
}
