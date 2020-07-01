<?php

namespace App\Entity;

use App\Repository\ProgramRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProgramRepository::class)
 */
class Program
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max="255", maxMessage="La taille du nom du programme ne peux pas dépasser {{limit}} caractères.")
     * @Assert\NotBlank(message="Merci de donner un nom à votre programme.")
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duration;

    /**
     * @ORM\OneToMany(targetEntity=Attended::class, mappedBy="program", orphanRemoval=true)
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

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
            $attended->setProgram($this);
        }

        return $this;
    }

    public function removeAttended(Attended $attended): self
    {
        if ($this->attendeds->contains($attended)) {
            $this->attendeds->removeElement($attended);
            // set the owning side to null (unless already changed)
            if ($attended->getProgram() === $this) {
                $attended->setProgram(null);
            }
        }

        return $this;
    }
}
