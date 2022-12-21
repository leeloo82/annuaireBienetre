<?php

namespace App\Entity;

use App\Repository\AbusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AbusRepository::class)
 */
class Abus
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
    private $DescriptionAbus;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEncodage;

    /**
     * @ORM\ManyToOne(targetEntity=Commentaire::class, inversedBy="Abus")
     */
    private $Commentaire;

    /**
     * @ORM\ManyToOne(targetEntity=Internaute::class, inversedBy="Abus")
     */
    private $Internaute;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionAbus(): ?string
    {
        return $this->DescriptionAbus;
    }

    public function setDescriptionAbus(string $DescriptionAbus): self
    {
        $this->DescriptionAbus = $DescriptionAbus;

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

    public function getCommentaire(): ?Commentaire
    {
        return $this->Commentaire;
    }

    public function setCommentaire(?Commentaire $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

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
