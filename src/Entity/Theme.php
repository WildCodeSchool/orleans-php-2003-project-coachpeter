<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ThemeRepository::class)
 */
class Theme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Veuillez indiquer le nom du thème")
     * @Assert\Length(max=50, maxMessage="Le nom du thème {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit}} caractères.")
     */
    private $nameTheme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameTheme(): ?string
    {
        return $this->nameTheme;
    }

    public function setNameTheme(string $nameTheme): self
    {
        $this->nameTheme = $nameTheme;

        return $this;
    }
}
