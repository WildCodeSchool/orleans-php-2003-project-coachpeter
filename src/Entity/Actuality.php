<?php

namespace App\Entity;

use App\Repository\ActualityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ActualityRepository::class)
 */
class Actuality
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez indiquer le titre de l'article")
     * @Assert\Length(max=255, maxMessage="Le nom du titre {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit}} caractères")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Veuillez remplir le contenu de l'article")
     */
    private $content;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message = "Veuillez indiquer la date de parution de l'article sous le format JJ/MM/AAAA")
     * @Assert\Date(message = "Veuillez indiquer une date valide")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Veuillez indiquer un thème à l'article")
     * @Assert\Length(max=50, maxMessage="Le nom du thème {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit}} caractères")
     */
    private $theme;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez indiquer le nom d'un fichier")
     * @Assert\Length(max=255, maxMessage="Le nom est trop long, il ne devrait pas dépasser {{ limit}} caractères")
     */
    private $picture;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

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
}
