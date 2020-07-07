<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{

    /**
     * @Assert\Length(max=255, maxMessage="Votre prénom doit être inférieur à {{ limit }} caractères")
     * @Assert\NotBlank(message="Merci de saisir votre prénom")
     */
    private $firstname;

    /**
     * @Assert\Length(max=255, maxMessage="Votre nom doit être inférieur à {{ limit }} caractères")
     * @Assert\NotBlank(message="Merci de saisir votre nom")
     */
    private $lastname;

    /**
     * @Assert\NotBlank(message="Merci de saisir votre numéro de téléphone")
     */
    private $phone;

    /**
     * @Assert\Length(max=255, maxMessage="Votre email doit être inférieur à {{ limit }} caractères")
     * @Assert\Email(message = "L'email '{{ value }}' n'est pas un format d'email valide.")
     * @Assert\NotBlank(message="Merci de saisir votre adresse email")
     */
    private $email;

    /**
     * @Assert\NotBlank(message="Merci de saisir votre message")
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
