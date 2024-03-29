<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MessagePublicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: MessagePublicRepository::class)]
#[ApiResource(
    // operations: [
    //     new Get(),
    //     new Post(),

    //     new GetCollection()
    // ]
)]
class MessagePublic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $texteMessage = null;

    #[ORM\Column]
    private ?int $likeMessage = null;

    #[ORM\Column]
    private ?int $rtMessage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreaMessage = null;

    #[ORM\ManyToOne(inversedBy: 'Poste')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $util = null;

    #[ORM\OneToMany(mappedBy: 'messageP', targetEntity: Like::class)]
    private Collection $likes;

    public function __construct()
    {
        $this->likes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexteMessage(): ?string
    {
        return $this->texteMessage;
    }

    public function setTexteMessage(?string $texteMessage): self
    {
        $this->texteMessage = $texteMessage;

        return $this;
    }

    public function getLikeMessage(): ?int
    {
        return $this->likeMessage;
    }

    public function setLikeMessage(int $likeMessage): self
    {
        $this->likeMessage = $likeMessage;

        return $this;
    }

    public function getRtMessage(): ?int
    {
        return $this->rtMessage;
    }

    public function setRtMessage(int $rtMessage): self
    {
        $this->rtMessage = $rtMessage;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDateCreaMessage(): ?\DateTimeInterface
    {
        return $this->dateCreaMessage;
    }

    public function setDateCreaMessage(\DateTimeInterface $dateCreaMessage): self
    {
        $this->dateCreaMessage = $dateCreaMessage;

        return $this;
    }

    public function getUtil(): ?User
    {
        return $this->util;
    }

    public function setUtil(?User $util): self
    {
        $this->util = $util;

        return $this;
    }

    /**
     * @return Collection<int, Like>
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(User $user): self
    {
        if (!$this->likes->contains($user)) {
            $this->likes[] = $user;
        }

        return $this;
    }

    public function removeLike(Like $like): self
    {
        if ($this->likes->removeElement($like)) {
            // set the owning side to null (unless already changed)
            if ($like->getMessageP() === $this) {
                $like->setMessageP(null);
            }
        }

        return $this;
    }

    public function isLikedByUser(User $user): bool
    {
        return $this->likes->contains($user);
    }
}

