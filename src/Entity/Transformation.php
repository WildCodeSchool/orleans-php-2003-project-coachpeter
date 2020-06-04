<?php

namespace App\Entity;

use App\Repository\TransformationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TransformationRepository::class)
 */
class Transformation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message='Veuillez indiquez le nom de la personne.')
     * @Assert\Length(max=50, maxMessage="Le nom ne doit pas dépasser {{ limit }} caractères." )
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message='Veuillez indiquez le nombre de kilos perdu.')
     * @Assert\Positive(message='Le nombre de kilos doit être un entier positif.')
     * @Assert\LessThan(value=150, maxMessage('Le poid perdu ne peut dépasser {{value}} kilos.')
     */
    private $pound;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message='Veuillez indiquez une image AVANT.')
     */
    private $pictureBefore;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message='Veuillez indiquez une image APRES.')
     */
    private $pictureAfter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPound(): ?int
    {
        return $this->pound;
    }

    public function setPound(int $pound): self
    {
        $this->pound = $pound;

        return $this;
    }

    public function getPictureBefore(): ?string
    {
        return $this->pictureBefore;
    }

    public function setPictureBefore(string $pictureBefore): self
    {
        $this->pictureBefore = $pictureBefore;

        return $this;
    }

    public function getPictureAfter(): ?string
    {
        return $this->pictureAfter;
    }

    public function setPictureAfter(string $pictureAfter): self
    {
        $this->pictureAfter = $pictureAfter;

        return $this;
    }
}
