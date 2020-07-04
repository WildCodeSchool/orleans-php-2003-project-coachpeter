<?php

namespace App\Entity;

use App\Repository\RessourceRepository;
use App\Entity\ProgramStep;
use App\Entity\Theme;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use \DateTime;

/**
 * @ORM\Entity(repositoryClass=RessourceRepository::class)
 * @Vich\Uploadable
 */
class Ressource
{
    const TYPES_FILES = ['video' => 'video', 'pdf' => 'pdf', 'image' => 'image'];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\Choice(choices=Ressource::TYPES_FILES, message="Merci de choisir un type de fichier valide.")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max=255, maxMessage="La taille de la référence est trop longue.
     * Elle ne doit pas dépasser {{limit}} caractères.")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255, maxMessage="Le nom du fichier est trop long, il ne devrait pas dépasser {{limit}}
     * caractères.")
     */
    private $file;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="ressources_file", fileNameProperty="file")
     *
     * @Assert\File(maxSize = "5M",
     *     maxSizeMessage="Le fichier est trop gros  ({{ size }} {{ suffix }}),
     * il ne doit pas dépasser {{ limit }} {{ suffix }}",
     *     mimeTypes = {"application/pdf", "image/jpeg", "image/gif","image/png"},
     *     mimeTypesMessage = "Veuillez entrer un type de fichier valide: pdf, jpg, jpeg, png ou gif.")
     *
     * @var File|null
     */
    private $fileFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=programStep::class, inversedBy="ressources")
     * @ORM\JoinColumn(nullable=false)
     */
    private $programStep;

    /**
     * @ORM\ManyToOne(targetEntity=theme::class)
     */
    private $theme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
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

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function setFileFile(File $file = null)
    {
        $this->fileFile = $file;
        if ($file) {
            $this->updatedAt = new DateTime('now');
        }
    }

    public function getFileFile(): ?File
    {
        return $this->fileFile;
    }

    public function getProgramStep(): ?programStep
    {
        return $this->programStep;
    }

    public function setProgramStep(?programStep $programStep): self
    {
        $this->programStep = $programStep;

        return $this;
    }

    public function getTheme(): ?theme
    {
        return $this->theme;
    }

    public function setTheme(?theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }
}
