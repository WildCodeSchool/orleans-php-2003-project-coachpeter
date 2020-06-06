<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ActivityRepository::class)
 */
class Activity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Veuillez indiquer le nom de l'activité")
     * @Assert\Length(max=255, maxMessage="Le nom de l'activité {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit}} caractères")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Veuillez remplir la description de l'activité")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pictogram;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez indiquer le nom d'un fichier")
     * @Assert\Length(max=255, maxMessage="Le nom du fichier est trop long, il ne devrait pas dépasser {{ limit}} caractères")
     */
    private $picture;

    /**
     * @ORM\Column(type="boolean")
     */
    private $focus;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPictogram(): ?string
    {
        return $this->pictogram;
    }

    public function setPictogram(?string $pictogram): self
    {
        $this->pictogram = $pictogram;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getFocus(): ?bool
    {
        return $this->focus;
    }

    public function setFocus(bool $focus): self
    {
        $this->focus = $focus;

        return $this;
    }
}
