<?php

namespace App\Entity;

use App\Repository\TransformationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use \DateTime;

/**
 * @ORM\Entity(repositoryClass=TransformationRepository::class)
 * @Vich\Uploadable
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
     * @Assert\NotBlank(message="Veuillez indiquez le nom de la personne.")
     * @Assert\Length(max=50, maxMessage="Le nom ne doit pas dépasser {{ limit }} caractères." )
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Veuillez indiquez le nombre de kilos perdu.")
     * @Assert\Positive(message="Le nombre de kilos doit être un entier positif.")
     * @Assert\LessThan(value=150, message="Le poid perdu ne peut dépasser {{value}} kilos.")
     */
    private $pound;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pictureBefore;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="transformation_image", fileNameProperty="pictureBefore")
     *
     * @Assert\File(maxSize = "500k",
     *     maxSizeMessage="Le fichier est trop gros  ({{ size }} {{ suffix }}),
     * il ne doit pas dépasser {{ limit }} {{ suffix }}",
     *     mimeTypes = {"image/jpeg", "image/jpg", "image/gif","image/png"},
     *     mimeTypesMessage = "Veuillez entrer un type de fichier valide pour pictureBefore: jpg, jpeg, png ou gif.")
     *
     * @var File|null
     */
    private $pictureBeforeFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pictureAfter;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="transformation_image", fileNameProperty="pictureAfter")
     *
     * @Assert\File(maxSize = "500k",
     *     maxSizeMessage="Le fichier est trop gros  ({{ size }} {{ suffix }}),
     * il ne doit pas dépasser {{ limit }} {{ suffix }}",
     *     mimeTypes = {"image/jpeg", "image/jpg", "image/gif","image/png"},
     *     mimeTypesMessage = "Veuillez entrer un type de fichier valide pour pictureAfter: jpg, jpeg, png ou gif.")
     *
     * @var File|null
     */

    private $pictureAfterFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255, maxMessage="Votre titre ne doit pas dépasser {{ limit }} caractères." )
     */
    private $title;

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

    public function setPictureBefore($pictureBefore): self
    {
        $this->pictureBefore = $pictureBefore;

        return $this;
    }

    public function getPictureAfter(): ?string
    {
        return $this->pictureAfter;
    }

    public function setPictureAfter($pictureAfter): self
    {
        $this->pictureAfter = $pictureAfter;

        return $this;
    }

    public function setPictureBeforeFile(File $image = null)
    {
        $this->pictureBeforeFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }
    }

    public function getPictureBeforeFile(): ?File
    {
        return $this->pictureBeforeFile;
    }

    public function setPictureAfterFile(File $image = null)
    {
        $this->pictureAfterFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }
    }

    public function getPictureAfterFile(): ?File
    {
        return $this->pictureAfterFile;
    }

    public function getdescription(): ?string
    {
        return $this->description;
    }

    public function setdescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
