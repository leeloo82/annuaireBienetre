<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contenu;

    /**
     * @ORM\Column(type="integer")
     */
    private $cote;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEncodage;

    /**
     * @ORM\ManyToOne(targetEntity=Prestataire::class, inversedBy="Commentaire")
     */
    private $Prestataire;

    /**
     * @ORM\OneToMany(targetEntity=Abus::class, mappedBy="Commentaire")
     */
    private $Abus;

    /**
     * @ORM\ManyToOne(targetEntity=Internaute::class, inversedBy="Commentaire")
     */
    private $Internaute;

    public function __construct()
    {
        $this->Abus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getCote(): ?int
    {
        return $this->cote;
    }

    public function setCote(int $cote): self
    {
        $this->cote = $cote;

        return $this;
    }

    public function getDateEncodage(): ?\DateTimeInterface
    {
        return $this->dateEncodage;
    }

    public function setDateEncodage(\DateTimeInterface $dateEncodage): self
    {
        $this->dateEncodage = $dateEncodage;

        return $this;
    }

    public function getPrestataire(): ?Prestataire
    {
        return $this->Prestataire;
    }

    public function setPrestataire(?Prestataire $Prestataire): self
    {
        $this->Prestataire = $Prestataire;

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
            $abu->setCommentaire($this);
        }

        return $this;
    }

    public function removeAbu(Abus $abu): self
    {
        if ($this->Abus->removeElement($abu)) {
            // set the owning side to null (unless already changed)
            if ($abu->getCommentaire() === $this) {
                $abu->setCommentaire(null);
            }
        }

        return $this;
    }

    public function getInternaute(): ?Internaute
    {
        return $this->Internaute;
    }

    public function setInternaute(?Internaute $Internaute): self
    {
        $this->Internaute = $Internaute;

        return $this;
    }
}
