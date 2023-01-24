<?php

namespace App\Entity;

use App\Repository\PrestataireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestataireRepository::class)
 */
class Prestataire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eMailContact;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomPrestaire;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $numeroContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroTVA;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $siteInternet;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, mappedBy="Prestataire", cascade={"persist", "remove"})
     */
    private $Utilisateur;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="Prestataire")
     */
    private $Commentaire;

    /**
     * @ORM\ManyToMany(targetEntity=CategorieServices::class, inversedBy="Prestataire")
     */
    private $CategorieServices;

    /**
     * @ORM\OneToMany(targetEntity=Promotion::class, mappedBy="Prestataire")
     */
    private $Promotion;

    /**
     * @ORM\OneToMany(targetEntity=Stage::class, mappedBy="Prestataire")
     */
    private $Stage;

    /**
     * @ORM\OneToMany(targetEntity=Images::class, mappedBy="Prestataire")
     */
    private $Images;

    /**
     * @ORM\OneToOne(targetEntity=Images::class, inversedBy="prestataire", cascade={"persist", "remove"})
     */
    private $logo;

    public function __construct()
    {
        $this->Commentaire = new ArrayCollection();
        $this->CategorieServices = new ArrayCollection();
        $this->Promotion = new ArrayCollection();
        $this->Stage = new ArrayCollection();
        $this->Images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEMailContact(): ?string
    {
        return $this->eMailContact;
    }

    public function setEMailContact(string $eMailContact): self
    {
        $this->eMailContact = $eMailContact;

        return $this;
    }

    public function getNomPrestaire(): ?string
    {
        return $this->nomPrestaire;
    }

    public function setNomPrestaire(string $nomPrestaire): self
    {
        $this->nomPrestaire = $nomPrestaire;

        return $this;
    }

    public function getNumeroContact(): ?string
    {
        return $this->numeroContact;
    }

    public function setNumeroContact(?string $numeroContact): self
    {
        $this->numeroContact = $numeroContact;

        return $this;
    }

    public function getNumeroTVA(): ?string
    {
        return $this->numeroTVA;
    }

    public function setNumeroTVA(string $numeroTVA): self
    {
        $this->numeroTVA = $numeroTVA;

        return $this;
    }

    public function getSiteInternet(): ?string
    {
        return $this->siteInternet;
    }

    public function setSiteInternet(?string $siteInternet): self
    {
        $this->siteInternet = $siteInternet;

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
            $this->Utilisateur->setPrestataire(null);
        }

        // set the owning side of the relation if necessary
        if ($Utilisateur !== null && $Utilisateur->getPrestataire() !== $this) {
            $Utilisateur->setPrestataire($this);
        }

        $this->Utilisateur = $Utilisateur;

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
            $commentaire->setPrestataire($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->Commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getPrestataire() === $this) {
                $commentaire->setPrestataire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CategorieServices>
     */
    public function getCategorieServices(): Collection
    {
        return $this->CategorieServices;
    }

    public function addCategorieService(CategorieServices $categorieService): self
    {
        if (!$this->CategorieServices->contains($categorieService)) {
            $this->CategorieServices[] = $categorieService;
        }

        return $this;
    }

    public function removeCategorieService(CategorieServices $categorieService): self
    {
        $this->CategorieServices->removeElement($categorieService);

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
            $promotion->setPrestataire($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        if ($this->Promotion->removeElement($promotion)) {
            // set the owning side to null (unless already changed)
            if ($promotion->getPrestataire() === $this) {
                $promotion->setPrestataire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Stage>
     */
    public function getStage(): Collection
    {
        return $this->Stage;
    }

    public function addStage(Stage $stage): self
    {
        if (!$this->Stage->contains($stage)) {
            $this->Stage[] = $stage;
            $stage->setPrestataire($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): self
    {
        if ($this->Stage->removeElement($stage)) {
            // set the owning side to null (unless already changed)
            if ($stage->getPrestataire() === $this) {
                $stage->setPrestataire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Images>
     */
    public function getImages(): Collection
    {
        return $this->Images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->Images->contains($image)) {
            $this->Images[] = $image;
            $image->setPrestataire($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->Images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getPrestataire() === $this) {
                $image->setPrestataire(null);
            }
        }

        return $this;
    }

    public function getLogo(): ?Images
    {
        return $this->logo;
    }

    public function setLogo(?Images $logo): self
    {
        $this->logo = $logo;

        return $this;
    }
}
