<?php

namespace App\Entity;

use App\Repository\BlocRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BlocRepository::class)
 */
class Bloc
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
    private $nomBloc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionBloc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $position;

    /**
     * @ORM\ManyToMany(targetEntity=Internaute::class, inversedBy="Bloc")
     */
    private $Internaute;

    public function __construct()
    {
        $this->Internaute = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomBloc(): ?string
    {
        return $this->nomBloc;
    }

    public function setNomBloc(string $nomBloc): self
    {
        $this->nomBloc = $nomBloc;

        return $this;
    }

    public function getDescriptionBloc(): ?string
    {
        return $this->descriptionBloc;
    }

    public function setDescriptionBloc(?string $descriptionBloc): self
    {
        $this->descriptionBloc = $descriptionBloc;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Collection<int, Internaute>
     */
    public function getInternaute(): Collection
    {
        return $this->Internaute;
    }

    public function addInternaute(Internaute $internaute): self
    {
        if (!$this->Internaute->contains($internaute)) {
            $this->Internaute[] = $internaute;
        }

        return $this;
    }

    public function removeInternaute(Internaute $internaute): self
    {
        $this->Internaute->removeElement($internaute);

        return $this;
    }
}
