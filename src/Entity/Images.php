<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImagesRepository::class)
 */
class Images
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ordre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomImage;

    /**
     * @ORM\OneToOne(targetEntity=CategorieServices::class, mappedBy="Images", cascade={"persist", "remove"})
     */
    private $CategoriesServices;

    /**
     * @ORM\ManyToOne(targetEntity=Prestataire::class, inversedBy="Images")
     */
    private $Prestataire;

    /**
     * @ORM\OneToOne(targetEntity=Prestataire::class, mappedBy="logo", cascade={"persist", "remove"})
     */
    private $prestataire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(?int $ordre): self
    {
        $this->ordre = $ordre;

        return $this;
    }

    public function getNomImage(): ?string
    {
        return $this->nomImage;
    }

    public function setNomImage(?string $nomImage): self
    {
        $this->nomImage = $nomImage;

        return $this;
    }

    public function getCategoriesServices(): ?CategorieServices
    {
        return $this->CategoriesServices;
    }

    public function setCategoriesServices(?CategorieServices $CategoriesServices): self
    {
        // unset the owning side of the relation if necessary
        if ($CategoriesServices === null && $this->CategoriesServices !== null) {
            $this->CategoriesServices->setImages(null);
        }

        // set the owning side of the relation if necessary
        if ($CategoriesServices !== null && $CategoriesServices->getImages() !== $this) {
            $CategoriesServices->setImages($this);
        }

        $this->CategoriesServices = $CategoriesServices;

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
