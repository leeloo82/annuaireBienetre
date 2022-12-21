<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StageRepository::class)
 */
class Stage
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
    private $nomStage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionStage;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $tarif;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $infoCompl;

    /**
     * @ORM\Column(type="date")
     */
    private $debutStage;

    /**
     * @ORM\Column(type="date")
     */
    private $finStage;

    /**
     * @ORM\Column(type="date")
     */
    private $affichageDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $affichageFin;

    /**
     * @ORM\ManyToOne(targetEntity=Prestataire::class, inversedBy="Stage")
     */
    private $Prestataire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomStage(): ?string
    {
        return $this->nomStage;
    }

    public function setNomStage(string $nomStage): self
    {
        $this->nomStage = $nomStage;

        return $this;
    }

    public function getDescriptionStage(): ?string
    {
        return $this->descriptionStage;
    }

    public function setDescriptionStage(?string $descriptionStage): self
    {
        $this->descriptionStage = $descriptionStage;

        return $this;
    }

    public function getTarif(): ?string
    {
        return $this->tarif;
    }

    public function setTarif(?string $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getInfoCompl(): ?string
    {
        return $this->infoCompl;
    }

    public function setInfoCompl(?string $infoCompl): self
    {
        $this->infoCompl = $infoCompl;

        return $this;
    }

    public function getDebutStage(): ?\DateTimeInterface
    {
        return $this->debutStage;
    }

    public function setDebutStage(\DateTimeInterface $debutStage): self
    {
        $this->debutStage = $debutStage;

        return $this;
    }

    public function getFinStage(): ?\DateTimeInterface
    {
        return $this->finStage;
    }

    public function setFinStage(\DateTimeInterface $finStage): self
    {
        $this->finStage = $finStage;

        return $this;
    }

    public function getAffichageDebut(): ?\DateTimeInterface
    {
        return $this->affichageDebut;
    }

    public function setAffichageDebut(\DateTimeInterface $affichageDebut): self
    {
        $this->affichageDebut = $affichageDebut;

        return $this;
    }

    public function getAffichageFin(): ?\DateTimeInterface
    {
        return $this->affichageFin;
    }

    public function setAffichageFin(\DateTimeInterface $affichageFin): self
    {
        $this->affichageFin = $affichageFin;

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
}
