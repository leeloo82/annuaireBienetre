<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
 */
class Promotion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nomPromotion;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionPromotion;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $documentPromotionPdf;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDebutPromotion;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFinPromotion;

    /**
     * @ORM\Column(type="date")
     */
    private $affichageDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $affichageFin;

    /**
     * @ORM\ManyToOne(targetEntity=Prestataire::class, inversedBy="Promotion")
     */
    private $Prestataire;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieServices::class, inversedBy="Promotion")
     */
    private $CategorieServices;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPromotion(): ?string
    {
        return $this->nomPromotion;
    }

    public function setNomPromotion(?string $nomPromotion): self
    {
        $this->nomPromotion = $nomPromotion;

        return $this;
    }

    public function getDescriptionPromotion(): ?string
    {
        return $this->descriptionPromotion;
    }

    public function setDescriptionPromotion(?string $descriptionPromotion): self
    {
        $this->descriptionPromotion = $descriptionPromotion;

        return $this;
    }

    public function getDocumentPromotionPdf()
    {
        return $this->documentPromotionPdf;
    }

    public function setDocumentPromotionPdf($documentPromotionPdf): self
    {
        $this->documentPromotionPdf = $documentPromotionPdf;

        return $this;
    }

    public function getDateDebutPromotion(): ?\DateTimeInterface
    {
        return $this->dateDebutPromotion;
    }

    public function setDateDebutPromotion(?\DateTimeInterface $dateDebutPromotion): self
    {
        $this->dateDebutPromotion = $dateDebutPromotion;

        return $this;
    }

    public function getDateFinPromotion(): ?\DateTimeInterface
    {
        return $this->dateFinPromotion;
    }

    public function setDateFinPromotion(\DateTimeInterface $dateFinPromotion): self
    {
        $this->dateFinPromotion = $dateFinPromotion;

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

    public function getCategorieServices(): ?CategorieServices
    {
        return $this->CategorieServices;
    }

    public function setCategorieServices(?CategorieServices $CategorieServices): self
    {
        $this->CategorieServices = $CategorieServices;

        return $this;
    }
}
