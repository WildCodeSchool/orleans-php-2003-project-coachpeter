<?php

namespace App\Entity;

use App\Repository\ProgramStepRepository;
use App\Entity\Program;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProgramStepRepository::class)
 */
class ProgramStep
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $urlVideo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fileExplain;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $begin;

    /**
     * @ORM\ManyToOne(targetEntity=program::class, inversedBy="programSteps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $program;

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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUrlVideo(): ?string
    {
        return $this->urlVideo;
    }

    public function setUrlVideo(?string $urlVideo): self
    {
        $this->urlVideo = $urlVideo;

        return $this;
    }

    public function getFileExplain(): ?string
    {
        return $this->fileExplain;
    }

    public function setFileExplain(?string $fileExplain): self
    {
        $this->fileExplain = $fileExplain;

        return $this;
    }

    public function getBegin(): ?int
    {
        return $this->begin;
    }

    public function setBegin(?int $begin): self
    {
        $this->begin = $begin;

        return $this;
    }

    public function getProgram(): ?program
    {
        return $this->program;
    }

    public function setProgram(?program $program): self
    {
        $this->program = $program;

        return $this;
    }
}
