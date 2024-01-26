<?php

namespace App\Entity;

use App\Repository\EditionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EditionRepository::class)]
class Edition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'editions')]
    private ?Editeur $editeurId = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\ManyToOne(inversedBy: 'editions')]
    private ?Livre $livreId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEditeurId(): ?Editeur
    {
        return $this->editeurId;
    }

    public function setEditeurId(?Editeur $editeurId): static
    {
        $this->editeurId = $editeurId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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
}
