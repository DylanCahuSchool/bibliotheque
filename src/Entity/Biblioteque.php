<?php

namespace App\Entity;

use App\Repository\BibliotequeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibliotequeRepository::class)]
class Biblioteque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $listeEnvie = null;

    #[ORM\ManyToOne(inversedBy: 'biblioteques')]
    private ?Livre $livreId = null;

    #[ORM\ManyToOne(inversedBy: 'biblioteques')]
    private ?User $userId = null;

    #[ORM\Column(length: 255)]
    private ?string $statutLecture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isListeEnvie(): ?bool
    {
        return $this->listeEnvie;
    }

    public function setListeEnvie(bool $listeEnvie): static
    {
        $this->listeEnvie = $listeEnvie;

        return $this;
    }

    public function getLivreId(): ?Livre
    {
        return $this->livreId;
    }

    public function setLivreId(?Livre $livreId): static
    {
        $this->livreId = $livreId;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getStatutLecture(): ?string
    {
        return $this->statutLecture;
    }

    public function setStatutLecture(string $statutLecture): static
    {
        $this->statutLecture = $statutLecture;

        return $this;
    }
}
