<?php

namespace App\Entity;

use App\Repository\CodePostalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CodePostalRepository::class)
 */
class CodePostal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $codePostal;

    /**
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="CodePostal")
     */
    private $utilisateur;


    /**
     * @ORM\ManyToOne(targetEntity=Localite::class, inversedBy="codePostals")
     */
    private $localite;

    /**
     * @ORM\OneToMany(targetEntity=Commune::class, mappedBy="codePostal")
     */
    private $commune;

    public function __construct()
    {
        $this->utilisateur = new ArrayCollection();
        $this->commune = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateur(): Collection
    {
        return $this->utilisateur;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateur->contains($utilisateur)) {
            $this->utilisateur[] = $utilisateur;
            $utilisateur->setCodePostal($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateur->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getCodePostal() === $this) {
                $utilisateur->setCodePostal(null);
            }
        }

        return $this;
    }

    public function getLocalite(): ?string
    {
        return $this->localite;
    }

    public function setLocalite(string $localite): self
    {
        $this->localite = $localite;

        return $this;
    }

    public function getCommune(): ?Commune
    {
        return $this->commune;
    }

    public function setCommune(?Commune $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    public function addCommune(Commune $commune): self
    {
        if (!$this->commune->contains($commune)) {
            $this->commune[] = $commune;
            $commune->setCodePostal($this);
        }

        return $this;
    }

    public function removeCommune(Commune $commune): self
    {
        if ($this->commune->removeElement($commune)) {
            // set the owning side to null (unless already changed)
            if ($commune->getCodePostal() === $this) {
                $commune->setCodePostal(null);
            }
        }

        return $this;
    }
}
