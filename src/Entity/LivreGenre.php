<?php

namespace App\Entity;

use App\Repository\LivreGenreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreGenreRepository::class)]
class LivreGenre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'livreGenres')]
    private ?Livre $livreId = null;

    #[ORM\ManyToOne(inversedBy: 'livreGenres')]
    private ?Genre $genreId = null;

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

    public function getGenreId(): ?Genre
    {
        return $this->genreId;
    }

    public function setGenreId(?Genre $genreId): static
    {
        $this->genreId = $genreId;

        return $this;
    }
}
