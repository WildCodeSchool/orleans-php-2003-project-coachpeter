<?php

namespace App\Entity;

use App\Repository\InfoCoachRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use \DateTime;

/**
 * @ORM\Entity(repositoryClass=InfoCoachRepository::class)
 * @Vich\Uploadable
 */
class InfoCoach
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner une phrase d'acccroche.")
     * @Assert\Length(max=255, maxMessage="La phrase d'accroche ne doit pas dépasser {{limit}} caractères.")
     */
    private $catchline;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de sélectionner une image.")
     * @Assert\Length(max=255, maxMessage="Le nom du fichier est trop long, il ne devrait pas dépasser {{limit}}
     * caractères.")
     */
    private $image;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="coach_image", fileNameProperty="image")
     *
     * @Assert\File(maxSize = "200k",
     *     maxSizeMessage="Le fichier est trop gros  ({{ size }} {{ suffix }}),
     * il ne doit pas dépasser {{ limit }} {{ suffix }}",
     *     mimeTypes = {"image/jpeg", "image/jpg", "image/gif","image/png"},
     *     mimeTypesMessage = "Veuillez entrer un type de fichier valide: jpg, jpeg, png ou gif.")
     *
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $philosophy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $presentation;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     * @Assert\NotBlank(message="Merci de renseigner un numéro de téléphone.")
     * @Assert\Length(10, exactMessage="Le numéro doit faire {{limit}} caractères. (Ex:0611223344)")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner une adresse mail.")
     * @Assert\Length(max=255, maxMessage="L'adresse mail ne doit pas dépasser {{limit}} caractères.")
     * @Assert\Email(message="Merci de renseigner une adresse mail valide. {{ value }} ne l'est pas.")
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner une adresse.")
     * @Assert\Length(max=255, maxMessage="L'adresse ne doit pas dépasser {{limit}} caractères.")
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner une ville.")
     * @Assert\Length(max=255, maxMessage="La ville ne doit pas dépasser {{limit}} caractères.")
     */
    private $city;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Merci de renseigner un code postal.")
     * @Assert\Length(5, exactMessage="Le code postal doit être de {{limit}} caractères.")
     */
    private $zipCode;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatchline(): ?string
    {
        return $this->catchline;
    }

    public function setCatchline(string $catchline): self
    {
        $this->catchline = $catchline;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPhilosophy(): ?string
    {
        return $this->philosophy;
    }

    public function setPhilosophy(?string $philosophy): self
    {
        $this->philosophy = $philosophy;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?int $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }
    }
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
}
