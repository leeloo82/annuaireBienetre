<?php

namespace App\Entity;

use App\Repository\CategorieServicesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieServicesRepository::class)
 */
class CategorieServices
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
    private $nomService;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enAvant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $valide;

    /**
     * @ORM\ManyToMany(targetEntity=Prestataire::class, mappedBy="CategorieServices")
     */
    private $Prestataire;

    /**
     * @ORM\OneToOne(targetEntity=Images::class, inversedBy="CategoriesServices", cascade={"persist", "remove"})
     */
    private $Images;

    /**
     * @ORM\OneToMany(targetEntity=Promotion::class, mappedBy="CategorieServices")
     */
    private $Promotion;

    public function __construct()
    {
        $this->Prestataire = new ArrayCollection();
        $this->Promotion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomService(): ?string
    {
        return $this->nomService;
    }

    public function setNomService(?string $nomService): self
    {
        $this->nomService = $nomService;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function isEnAvant(): ?bool
    {
        return $this->enAvant;
    }

    public function setEnAvant(bool $enAvant): self
    {
        $this->enAvant = $enAvant;

        return $this;
    }

    public function isValide(): ?bool
    {
        return $this->valide;
    }

    public function setValide(bool $valide): self
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * @return Collection<int, Prestataire>
     */
    public function getPrestataire(): Collection
    {
        return $this->Prestataire;
    }

    public function addPrestataire(Prestataire $prestataire): self
    {
        if (!$this->Prestataire->contains($prestataire)) {
            $this->Prestataire[] = $prestataire;
            $prestataire->addCategorieService($this);
        }

        return $this;
    }

    public function removePrestataire(Prestataire $prestataire): self
    {
        if ($this->Prestataire->removeElement($prestataire)) {
            $prestataire->removeCategorieService($this);
        }

        return $this;
    }

    public function getImages(): ?Images
    {
        return $this->Images;
    }

    public function setImages(?Images $Images): self
    {
        $this->Images = $Images;

        return $this;
    }

    /**
     * @return Collection<int, Promotion>
     */
    public function getPromotion(): Collection
    {
        return $this->Promotion;
    }

    public function addPromotion(Promotion $promotion): self
    {
        if (!$this->Promotion->contains($promotion)) {
            $this->Promotion[] = $promotion;
            $promotion->setCategorieServices($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        if ($this->Promotion->removeElement($promotion)) {
            // set the owning side to null (unless already changed)
            if ($promotion->getCategorieServices() === $this) {
                $promotion->setCategorieServices(null);
            }
        }

        return $this;
    }
}
