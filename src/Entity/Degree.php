<?php

namespace App\Entity;

use App\Repository\DegreeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=DegreeRepository::class)
 */
class Degree
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max=255, maxMessage="Le nom de la certification doit être inférieur à {{ limit }} caractères")
     * @Assert\NotBlank(message="Merci de saisir le nom de la certification")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max=255, maxMessage="Le nom de l'organisme doit être inférieur à {{ limit }} caractères")
     * @Assert\NotBlank(message="Merci de saisir le nom de l'organisme")
     */
    private $organism;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max=255, maxMessage="La description doit être inférieure à {{ limit }} caractères")
     * @Assert\NotBlank(message="Merci de saisir un descriptif")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Merci de saisir l'année de début")
     * @Assert\Range(min=2000, max=2050,  notInRangeMessage = "L'année doit être comprise entre {{ min }} et {{ max }}")
     */
    private $startDate;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Merci de saisir l'année de fin")
     * @Assert\Range(min=2000, max=2050,  notInRangeMessage = "L'année doit être comprise entre {{ min }} et {{ max }}")
     */
    private $endDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getOrganism(): ?string
    {
        return $this->organism;
    }

    public function setOrganism(?string $organism): self
    {
        $this->organism = $organism;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStartDate(): ?int
    {
        return $this->startDate;
    }

    public function setStartDate(int $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?int
    {
        return $this->endDate;
    }

    public function setEndDate(int $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }
}
