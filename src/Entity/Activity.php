<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Form;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivityRepository", repositoryClass=ActivityRepository::class)
 * @Vich\Uploadable()
 */
class Activity
{
    const CATEGORY=['coaching'=>'coaching', 'team'=>'team'];
    const MAX_SIZE="500k";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Veuillez indiquer le nom de l'activité")
     * @Assert\Length(max=50, maxMessage="Le nom de l'activité {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit }} caractères")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Veuillez remplir la description de l'activité")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=Activity::MAX_SIZE, maxMessage="Le nom du fichier est trop long,
     * il ne devrait pas dépasser {{ limit }} caractères")
     * @Assert\Choice(choices=App\Form\ActivityType::PICTOGRAMS, message="Veuillez choisir un prictogramme existant.")
     */
    private $pictogram;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     * @Assert\Length(max=Activity::MAX_SIZE, maxMessage="Le nom est trop long,
     * il ne devrait pas dépasser {{ limit }} caractères")
     */
    private $picture;

    /**
     * @Vich\UploadableField(mapping="activity_file",fileNameProperty="picture")
     * @var File|null
     * @Assert\File(maxSize = Activity::MAX_SIZE,
     *     maxSizeMessage="Le fichier est trop gros  ({{ size }} {{ suffix }}),
     * il ne doit pas dépasser {{ limit }} {{ suffix }}",
     *     mimeTypes = {"image/jpeg", "image/jpg", "image/gif","image/png"},
     *     mimeTypesMessage = "Veuillez entrer un type de fichier valide: jpg, jpeg, png ou gif.")
     */
    private $activityFile;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\Type(
     *     type="boolean",
     *     message="{{ value }} n'est pas une bonne valeur, votre choix doit être oui ou non")
     */
    private $focus;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\Choice(choices=Activity::CATEGORY, message="Merci de choisir une catégorie valide.")
     */
    private $category;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $updatedAt;


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

    public function setPicture($picture): self
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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getActivityFile(): ?File
    {
        return $this->activityFile;
    }

    /**
     * @param File|null $activityFile
     */
    public function setActivityFile(?File $activityFile)
    {
        $this->activityFile = $activityFile;
        if ($activityFile) {
            $this->updatedAt = new DateTime('now');
        }
    }
}
