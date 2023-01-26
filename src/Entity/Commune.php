<?php

namespace App\Entity;

use App\Repository\CommuneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommuneRepository::class)
 */
class Commune
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $commune;

    /**
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="Commune")
     */
    private $Utilisateur;

    /**
     * @ORM\OneToMany(targetEntity=CodePostal::class, mappedBy="commune")
     */
    private $codePostals;

    /**
     * @ORM\ManyToOne(targetEntity=CodePostal::class, inversedBy="commune")
     */
    private $codePostal;

    public function __construct()
    {
        $this->Utilisateur = new ArrayCollection();
        $this->codePostals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateur(): Collection
    {
        return $this->Utilisateur;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->Utilisateur->contains($utilisateur)) {
            $this->Utilisateur[] = $utilisateur;
            $utilisateur->setCommune($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->Utilisateur->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getCommune() === $this) {
                $utilisateur->setCommune(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CodePostal>
     */
    public function getCodePostals(): Collection
    {
        return $this->codePostals;
    }

    public function addCodePostal(CodePostal $codePostal): self
    {
        if (!$this->codePostals->contains($codePostal)) {
            $this->codePostals[] = $codePostal;
            $codePostal->setCommune($this);
        }

        return $this;
    }

    public function removeCodePostal(CodePostal $codePostal): self
    {
        if ($this->codePostals->removeElement($codePostal)) {
            // set the owning side to null (unless already changed)
            if ($codePostal->getCommune() === $this) {
                $codePostal->setCommune(null);
            }
        }

        return $this;
    }

    public function getCodePostal(): ?CodePostal
    {
        return $this->codePostal;
    }

    public function setCodePostal(?CodePostal $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }
}
