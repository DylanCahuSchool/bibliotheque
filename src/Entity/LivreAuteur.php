<?php

namespace App\Entity;

use App\Repository\LivreAuteurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreAuteurRepository::class)]
class LivreAuteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'livreAuteurs')]
    private ?Livre $livreId = null;

    #[ORM\ManyToOne(inversedBy: 'livreAuteurs')]
    private ?Auteur $auteurId = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAuteurId(): ?Auteur
    {
        return $this->auteurId;
    }

    public function setAuteurId(?Auteur $auteurId): static
    {
        $this->auteurId = $auteurId;

        return $this;
    }
}
