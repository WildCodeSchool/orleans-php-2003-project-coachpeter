<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{

    /**
     * @Assert\Length(max=50, maxMessage="Votre prénom doit être inférieur à {{ limit }} caractères")
     * @Assert\NotBlank(message="Merci de saisir votre prénom")
     */
    private $firstname;

    /**
     * @Assert\Length(max=50, maxMessage="Votre nom doit être inférieur à {{ limit }} caractères")
     * @Assert\NotBlank(message="Merci de saisir votre nom")
     */
    private $lastname;

    /**
     * @Assert\NotBlank(message="Merci de saisir votre numéro de téléphone")
     * @Assert\Length(min=10, max=20, minMessage="Votre numéro de téléphone doit être composé de 10 chiffres",
     *      maxMessage="Votre numéro de téléphone doit être composé de 10 chiffres")
     */
    private $phone;

    /**
     * @Assert\Length(max=100, maxMessage="Votre email doit être inférieur à {{ limit }} caractères")
     * @Assert\Email(message = "L'email '{{ value }}' n'est pas un format d'email valide.")
     * @Assert\NotBlank(message="Merci de saisir votre adresse email")
     */
    private $email;

    /**
     * @Assert\NotBlank(message="Merci de saisir votre âge (en chiffres)")
     * @Assert\Range(min=0, max=110, notInRangeMessage="Votre âge doit être compris entre 0 et 110 ans")
     */
    private $birthDate;

    /**
     * @Assert\NotBlank(message="Merci de saisir votre message")
     * @Assert\Length(min=20, max=1500, minMessage="Votre message doit être composé d'au moins {{ limit }} caractères",
     *      maxMessage="Votre email ne peut pas dépasser {{ limit }} caractères")
     */
    private $message;

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate($birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }
}
