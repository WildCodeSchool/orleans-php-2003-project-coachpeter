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
     * @Assert\NotBlank(message="Merci de renseigner un slogan")
     * @Assert\Length(max=255, maxMessage="Le slogan ne doit pas dépasser {{limit}} caractères")
     */
    private $catchline;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci d'enregistrer un chemin vers une image'")
     * @Assert\Length(max=255, maxMessage="Le chemin est trop long, il ne devrait pas dépasser {{limit}} caractères")
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
}
