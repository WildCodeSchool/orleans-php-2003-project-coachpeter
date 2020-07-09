<?php

namespace App\Entity;

use App\Repository\ProgramStepRepository;
use App\Entity\Program;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use \DateTime;

/**
 * @ORM\Entity(repositoryClass=ProgramStepRepository::class)
 * @Vich\Uploadable
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
     * @Assert\NotBlank(message="Veuillez indiquez le titre de cette étape.")
     * @Assert\Length(max=255, maxMessage="Le titre de cette étape ne doit pas dépasser {{ limit }} caractères." )
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Assert\Length(max=50, maxMessage="La taille de la référence est trop longue.
     * Elle ne doit pas dépasser {{limit}} caractères.")
     */
    private $urlVideo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255, maxMessage="Le nom du fichier est trop long, il ne devrait pas dépasser {{limit}}
     * caractères.")
     */
    private $fileExplain;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="programStep_file", fileNameProperty="fileExplain")
     *
     * @Assert\File(maxSize = "500k",
     *     maxSizeMessage="Le fichier est trop gros  ({{ size }} {{ suffix }}),
     * il ne doit pas dépasser {{ limit }} {{ suffix }}",
     *     mimeTypes = {"application/pdf", "image/webp", "image/jpeg", "image/gif","image/png"},
     *     mimeTypesMessage = "Veuillez entrer un type de fichier valide: pdf, webp, jpg, jpeg, png ou gif.")
     *
     * @var File|null
     */
    private $fileExplainFile;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(min=0)
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

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Ressource::class, mappedBy="programStep")
     */
    private $ressources;

    public function __construct()
    {
        $this->ressources = new ArrayCollection();
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

    public function setFileExplain($fileExplain): self
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

    public function setFileExplainFile(File $fileExplain = null)
    {
        $this->fileExplainFile = $fileExplain;
        if ($fileExplain) {
            $this->updatedAt = new DateTime('now');
        }
    }

    public function getFileExplainFile(): ?File
    {
        return $this->fileExplainFile;
    }

    /**
     * @return Collection|Ressource[]
     */
    public function getRessources(): Collection
    {
        return $this->ressources;
    }

    public function addRessource(Ressource $ressource): self
    {
        if (!$this->ressources->contains($ressource)) {
            $this->ressources[] = $ressource;
            $ressource->setProgramStep($this);
        }

        return $this;
    }

    public function removeRessource(Ressource $ressource): self
    {
        if ($this->ressources->contains($ressource)) {
            $this->ressources->removeElement($ressource);
            // set the owning side to null (unless already changed)
            if ($ressource->getProgramStep() === $this) {
                $ressource->setProgramStep(null);
            }
        }

        return $this;
    }
}
