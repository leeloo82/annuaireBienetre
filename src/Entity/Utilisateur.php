<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity=CodePostal::class, inversedBy="utilisateur")
     */
    private $CodePostal;

    /**
     * @ORM\ManyToOne(targetEntity=Localite::class, inversedBy="Utilisateur")
     */
    private $Localite;

    /**
     * @ORM\ManyToOne(targetEntity=Commune::class, inversedBy="Utilisateur")
     */
    private $Commune;

    /**
     * @ORM\OneToOne(targetEntity=Prestataire::class, inversedBy="Utilisateur", cascade={"persist", "remove"})
     */
    private $Prestataire;

    /**
     * @ORM\OneToOne(targetEntity=Internaute::class, inversedBy="Utilisateur", cascade={"persist", "remove"})
     */
    private $Internaute;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getCodePostal(): ?CodePostal
    {
        return $this->CodePostal;
    }

    public function setCodePostal(?CodePostal $CodePostal): self
    {
        $this->CodePostal = $CodePostal;

        return $this;
    }

    public function getLocalite(): ?Localite
    {
        return $this->Localite;
    }

    public function setLocalite(?Localite $Localite): self
    {
        $this->Localite = $Localite;

        return $this;
    }

    public function getCommune(): ?Commune
    {
        return $this->Commune;
    }

    public function setCommune(?Commune $Commune): self
    {
        $this->Commune = $Commune;

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

    public function getInternaute(): ?Internaute
    {
        return $this->Internaute;
    }

    public function setInternaute(?Internaute $Internaute): self
    {
        $this->Internaute = $Internaute;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }
}
