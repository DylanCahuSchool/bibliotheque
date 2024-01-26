<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 510)]
    private ?string $Resume = null;

    #[ORM\OneToMany(mappedBy: 'livreId', targetEntity: Edition::class)]
    private Collection $editions;

    #[ORM\OneToMany(mappedBy: 'livreId', targetEntity: Biblioteque::class)]
    private Collection $biblioteques;

    #[ORM\OneToMany(mappedBy: 'livreId', targetEntity: LivreAuteur::class)]
    private Collection $livreAuteurs;

    #[ORM\OneToMany(mappedBy: 'livreId', targetEntity: Commentaire::class)]
    private Collection $commentaires;

    #[ORM\OneToMany(mappedBy: 'livreId', targetEntity: LivreGenre::class)]
    private Collection $livreGenres;

    public function __construct()
    {
        $this->editions = new ArrayCollection();
        $this->biblioteques = new ArrayCollection();
        $this->livreAuteurs = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->livreGenres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->Resume;
    }

    public function setResume(string $Resume): static
    {
        $this->Resume = $Resume;

        return $this;
    }

    /**
     * @return Collection<int, Edition>
     */
    public function getEditions(): Collection
    {
        return $this->editions;
    }

    public function addEdition(Edition $edition): static
    {
        if (!$this->editions->contains($edition)) {
            $this->editions->add($edition);
            $edition->setLivreId($this);
        }

        return $this;
    }

    public function removeEdition(Edition $edition): static
    {
        if ($this->editions->removeElement($edition)) {
            // set the owning side to null (unless already changed)
            if ($edition->getLivreId() === $this) {
                $edition->setLivreId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Biblioteque>
     */
    public function getBiblioteques(): Collection
    {
        return $this->biblioteques;
    }

    public function addBiblioteque(Biblioteque $biblioteque): static
    {
        if (!$this->biblioteques->contains($biblioteque)) {
            $this->biblioteques->add($biblioteque);
            $biblioteque->setLivreId($this);
        }

        return $this;
    }

    public function removeBiblioteque(Biblioteque $biblioteque): static
    {
        if ($this->biblioteques->removeElement($biblioteque)) {
            // set the owning side to null (unless already changed)
            if ($biblioteque->getLivreId() === $this) {
                $biblioteque->setLivreId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LivreAuteur>
     */
    public function getLivreAuteurs(): Collection
    {
        return $this->livreAuteurs;
    }

    public function addLivreAuteur(LivreAuteur $livreAuteur): static
    {
        if (!$this->livreAuteurs->contains($livreAuteur)) {
            $this->livreAuteurs->add($livreAuteur);
            $livreAuteur->setLivreId($this);
        }

        return $this;
    }

    public function removeLivreAuteur(LivreAuteur $livreAuteur): static
    {
        if ($this->livreAuteurs->removeElement($livreAuteur)) {
            // set the owning side to null (unless already changed)
            if ($livreAuteur->getLivreId() === $this) {
                $livreAuteur->setLivreId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): static
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setLivreId($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getLivreId() === $this) {
                $commentaire->setLivreId(null);
            }
        }

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
            $livreGenre->setLivreId($this);
        }

        return $this;
    }

    public function removeLivreGenre(LivreGenre $livreGenre): static
    {
        if ($this->livreGenres->removeElement($livreGenre)) {
            // set the owning side to null (unless already changed)
            if ($livreGenre->getLivreId() === $this) {
                $livreGenre->setLivreId(null);
            }
        }

        return $this;
    }
}
