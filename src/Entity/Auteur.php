<?php

namespace App\Entity;

use App\Repository\AuteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuteurRepository::class)]
class Auteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\OneToMany(mappedBy: 'auteurId', targetEntity: LivreAuteur::class)]
    private Collection $livreAuteurs;

    public function __construct()
    {
        $this->livreAuteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

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
            $livreAuteur->setAuteurId($this);
        }

        return $this;
    }

    public function removeLivreAuteur(LivreAuteur $livreAuteur): static
    {
        if ($this->livreAuteurs->removeElement($livreAuteur)) {
            // set the owning side to null (unless already changed)
            if ($livreAuteur->getAuteurId() === $this) {
                $livreAuteur->setAuteurId(null);
            }
        }

        return $this;
    }
}
