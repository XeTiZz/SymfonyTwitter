<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 40)]
    private ?string $nomUtil = null;

    #[ORM\Column(length: 40)]
    private ?string $prenomUtil = null;

    #[ORM\Column(length: 20)]
    private ?string $pseudoUtil = null;

    #[ORM\Column]
    private ?bool $ageUtil = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreaUtil = null;

    #[ORM\Column]
    private ?bool $actifUtil = null;

    #[ORM\Column(length: 255)]
    private ?string $pfpUser = null;

    #[ORM\OneToMany(mappedBy: 'util', targetEntity: messagePublic::class, orphanRemoval: true)]
    private Collection $Poste;

    public function __construct()
    {
        $this->Poste = new ArrayCollection();
    }

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
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNomUtil(): ?string
    {
        return $this->nomUtil;
    }

    public function setNomUtil(string $nomUtil): self
    {
        $this->nomUtil = $nomUtil;

        return $this;
    }

    public function getPrenomUtil(): ?string
    {
        return $this->prenomUtil;
    }

    public function setPrenomUtil(string $prenomUtil): self
    {
        $this->prenomUtil = $prenomUtil;

        return $this;
    }

    public function getPseudoUtil(): ?string
    {
        return $this->pseudoUtil;
    }

    public function setPseudoUtil(string $pseudoUtil): self
    {
        $this->pseudoUtil = $pseudoUtil;

        return $this;
    }



    public function isAgeUtil(): ?bool
    {
        return $this->ageUtil;
    }

    public function setAgeUtil(bool $ageUtil): self
    {
        $this->ageUtil = $ageUtil;

        return $this;
    }

    public function getDateCreaUtil(): ?\DateTimeInterface
    {
        return $this->dateCreaUtil;
    }

    public function setDateCreaUtil(\DateTimeInterface $dateCreaUtil): self
    {
        $this->dateCreaUtil = $dateCreaUtil;

        return $this;
    }

    public function isActifUtil(): ?bool
    {
        return $this->actifUtil;
    }

    public function setActifUtil(bool $actifUtil): self
    {
        $this->actifUtil = $actifUtil;

        return $this;
    }

    public function getPfpUser(): ?string
    {
        return $this->pfpUser;
    }

    public function setPfpUser(string $pfpUser): self
    {
        $this->pfpUser = $pfpUser;

        return $this;
    }

    /**
     * @return Collection<int, messagePublic>
     */
    public function getPoste(): Collection
    {
        return $this->Poste;
    }

    public function addPoste(messagePublic $poste): self
    {
        if (!$this->Poste->contains($poste)) {
            $this->Poste->add($poste);
            $poste->setUtil($this);
        }

        return $this;
    }

    public function removePoste(messagePublic $poste): self
    {
        if ($this->Poste->removeElement($poste)) {
            // set the owning side to null (unless already changed)
            if ($poste->getUtil() === $this) {
                $poste->setUtil(null);
            }
        }

        return $this;
    }

}
