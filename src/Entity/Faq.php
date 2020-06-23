<?php

namespace App\Entity;

use App\Repository\FaqRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=FaqRepository::class)
 */
class Faq
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de saisir une question")
     * @Assert\Length(max=255, maxMessage="La question doit être inférieure à {{ limit }} caractères")
     */
    private $question;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Merci de saisir une réponse")
     */
    private $answer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion($question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer($answer): self
    {
        $this->answer = $answer;

        return $this;
    }
}
