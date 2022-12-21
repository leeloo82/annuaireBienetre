<?php

namespace App\Entity;

use App\Repository\InternauteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InternauteRepository::class)
 */
class Internaute
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
    private $nomInternaute;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $prenomInternaute;

    /**
     * @ORM\Column(type="boolean")
     */
    private $newsletter;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, mappedBy="Internaute", cascade={"persist", "remove"})
     */
    private $Utilisateur;

    /**
     * @ORM\OneToMany(targetEntity=Abus::class, mappedBy="Internaute")
     */
    private $Abus;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="Internaute")
     */
    private $Commentaire;

    /**
     * @ORM\ManyToMany(targetEntity=Bloc::class, mappedBy="Internaute")
     */
    private $Bloc;

    public function __construct()
    {
        $this->Abus = new ArrayCollection();
        $this->Commentaire = new ArrayCollection();
        $this->Bloc = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomInternaute(): ?string
    {
        return $this->nomInternaute;
    }

    public function setNomInternaute(string $nomInternaute): self
    {
        $this->nomInternaute = $nomInternaute;

        return $this;
    }

    public function getPrenomInternaute(): ?string
    {
        return $this->prenomInternaute;
    }

    public function setPrenomInternaute(string $prenomInternaute): self
    {
        $this->prenomInternaute = $prenomInternaute;

        return $this;
    }

    public function isNewsletter(): ?bool
    {
        return $this->newsletter;
    }

    public function setNewsletter(bool $newsletter): self
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->Utilisateur;
    }

    public function setUtilisateur(?Utilisateur $Utilisateur): self
    {
        // unset the owning side of the relation if necessary
        if ($Utilisateur === null && $this->Utilisateur !== null) {
            $this->Utilisateur->setInternaute(null);
        }

        // set the owning side of the relation if necessary
        if ($Utilisateur !== null && $Utilisateur->getInternaute() !== $this) {
            $Utilisateur->setInternaute($this);
        }

        $this->Utilisateur = $Utilisateur;

        return $this;
    }

    /**
     * @return Collection<int, Abus>
     */
    public function getAbus(): Collection
    {
        return $this->Abus;
    }

    public function addAbu(Abus $abu): self
    {
        if (!$this->Abus->contains($abu)) {
            $this->Abus[] = $abu;
            $abu->setInternaute($this);
        }

        return $this;
    }

    public function removeAbu(Abus $abu): self
    {
        if ($this->Abus->removeElement($abu)) {
            // set the owning side to null (unless already changed)
            if ($abu->getInternaute() === $this) {
                $abu->setInternaute(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaire(): Collection
    {
        return $this->Commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->Commentaire->contains($commentaire)) {
            $this->Commentaire[] = $commentaire;
            $commentaire->setInternaute($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->Commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getInternaute() === $this) {
                $commentaire->setInternaute(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Bloc>
     */
    public function getBloc(): Collection
    {
        return $this->Bloc;
    }

    public function addBloc(Bloc $bloc): self
    {
        if (!$this->Bloc->contains($bloc)) {
            $this->Bloc[] = $bloc;
            $bloc->addInternaute($this);
        }

        return $this;
    }

    public function removeBloc(Bloc $bloc): self
    {
        if ($this->Bloc->removeElement($bloc)) {
            $bloc->removeInternaute($this);
        }

        return $this;
    }
}
