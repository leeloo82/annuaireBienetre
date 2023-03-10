<?php

namespace App\Entity;

use App\Repository\LocaliteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocaliteRepository::class)
 */
class Localite
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
    private $localite;

    /**
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="Localite")
     */
    private $Utilisateur;

    /**
     * @ORM\OneToMany(targetEntity=CodePostal::class, mappedBy="localite")
     */
    private $codePostals;

    public function __construct()
    {
        $this->Utilisateur = new ArrayCollection();
        $this->codePostals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $utilisateur->setLocalite($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->Utilisateur->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getLocalite() === $this) {
                $utilisateur->setLocalite(null);
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
            $codePostal->setLocalite($this);
        }

        return $this;
    }

    public function removeCodePostal(CodePostal $codePostal): self
    {
        if ($this->codePostals->removeElement($codePostal)) {
            // set the owning side to null (unless already changed)
            if ($codePostal->getLocalite() === $this) {
                $codePostal->setLocalite(null);
            }
        }

        return $this;
    }
}
