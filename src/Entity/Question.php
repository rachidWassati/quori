<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: "Veuillez donner un titre à votre question")]
    #[Assert\Length(
        min: 5, 
        minMessage: "Votre titre doit faire au minimum 5 caracteres",
        max: 255,
        maxMessage: "Votre titre est trop long."
    )]
    private $title;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(message: "Veuillez detailler votre question")]
    #[Assert\Length(
        min: 5, 
        minMessage: "Votre question est trop courte",
    )]
    private $content;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'integer')]
    private $rating;

    #[ORM\Column(type: 'integer')]
    private $nbResponse;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getNbResponse(): ?int
    {
        return $this->nbResponse;
    }

    public function setNbResponse(int $nbResponse): self
    {
        $this->nbResponse = $nbResponse;

        return $this;
    }
}
