<?php

namespace App\Entity;

use App\Repository\InfoCoachRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=InfoCoachRepository::class)
 */
class InfoCoach
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner une phrase d'acccroche.")
     * @Assert\Length(max=255, maxMessage="La phrase d'accroche ne doit pas dépasser {{limit}} caractères.")
     */
    private $catchline;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de sélectionner une image.")
     * @Assert\Length(max=255, maxMessage="Le nom du fichier est trop long, il ne devrait pas dépasser {{limit}}
     * caractères.")
     */
    private $image;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $philosophy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $presentation;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     * @Assert\NotBlank(message="Merci de renseigner un numéro de téléphone.")
     * @Assert\Length(
     *     min=10,
     *     max=10,
     *     minMessage="Le numéro doit faire {{limit}} caractères. (Ex:0611223344)")
     *     maxMessage="Le numéro doit faire {{limit}} caractères. (Ex:0611223344)"))
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner une adresse mail.")
     * @Assert\Length(max=255, maxMessage="L'adresse mail ne doit pas dépasser {{limit}} caractères.")
     * @Assert\Email(message="Merci de renseigner une adresse mail valide. {{ value }} ne l'est pas.")
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner une adresse.")
     * @Assert\Length(max=255, maxMessage="L'adresse ne doit pas dépasser {{limit}} caractères.")
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner une ville.")
     * @Assert\Length(max=255, maxMessage="La ville ne doit pas dépasser {{limit}} caractères.")
     */
    private $country;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Merci de renseigner un code postal.")
     * @Assert\Length(max=5, maxMessage="Le code postal doit être de {{limit}} caractères.")
     * @Assert\Length(min=5, minMessage="Le code postal doit être de {{limit}} caractères.")
     */
    private $codpost;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatchline(): ?string
    {
        return $this->catchline;
    }

    public function setCatchline(string $catchline): self
    {
        $this->catchline = $catchline;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPhilosophy(): ?string
    {
        return $this->philosophy;
    }

    public function setPhilosophy(?string $philosophy): self
    {
        $this->philosophy = $philosophy;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCodPost(): ?int
    {
        return $this->codpost;
    }

    public function setCodPost(?int $codpost): self
    {
        $this->codpost = $codpost;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }
}
