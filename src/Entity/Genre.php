<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenreRepository::class)]
class Genre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'genreId', targetEntity: LivreGenre::class)]
    private Collection $livreGenres;

    public function __construct()
    {
        $this->livreGenres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, LivreGenre>
     */
    public function getLivreGenres(): Collection
    {
        return $this->livreGenres;
    }

    public function addLivreGenre(LivreGenre $livreGenre): static
    {
        if (!$this->livreGenres->contains($livreGenre)) {
            $this->livreGenres->add($livreGenre);
            $livreGenre->setGenreId($this);
        }

        return $this;
    }

    public function removeLivreGenre(LivreGenre $livreGenre): static
    {
        if ($this->livreGenres->removeElement($livreGenre)) {
            // set the owning side to null (unless already changed)
            if ($livreGenre->getGenreId() === $this) {
                $livreGenre->setGenreId(null);
            }
        }

        return $this;
    }
}
