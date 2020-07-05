<?php

namespace App\Entity;

use App\Repository\AttendedRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AttendedRepository::class)
 */
class Attended
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Merci d'indiquer une date de début")
     * @Assert\Date(message = "Veuillez indiquer une date valide")
     */
    private $beginDate;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Merci d'indiquer une date de fin")
     * @Assert\Date(message = "Veuillez indiquer une date valide")
     */
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity=Program::class, inversedBy="attendeds")
     * @ORM\JoinColumn(nullable=false)
     * *@Assert\Choice(callback={"App\Entity\Program", "getProgram"})
     */
    private $program;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="attendeds")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\Choice(callback={"App\Entity\User", "getUser"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginDate(): ?\DateTimeInterface
    {
        return $this->beginDate;
    }

    public function setBeginDate(\DateTimeInterface $beginDate): self
    {
        $this->beginDate = $beginDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getProgram(): ?Program
    {
        return $this->program;
    }

    public function setProgram(?Program $program): self
    {
        $this->program = $program;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
