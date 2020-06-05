<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CampaignRepository")
 */
class Campaign
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $viewGoal;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $view;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbLike;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbComment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $totalImpression;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $costPerThousand;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $engagementRate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $finishAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="campaigns")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Support", mappedBy="campaign")
     */
    private $supports;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->supports = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getViewGoal(): ?int
    {
        return $this->viewGoal;
    }

    public function setViewGoal(int $viewGoal): self
    {
        $this->viewGoal = $viewGoal;

        return $this;
    }

    public function getView(): ?int
    {
        return $this->view;
    }

    public function setView(?int $view): self
    {
        $this->view = $view;

        return $this;
    }

    public function getNbLike(): ?int
    {
        return $this->nbLike;
    }

    public function setNbLike(?int $nbLike): self
    {
        $this->nbLike = $nbLike;

        return $this;
    }

    public function getNbComment(): ?int
    {
        return $this->nbComment;
    }

    public function setNbComment(?int $nbComment): self
    {
        $this->nbComment = $nbComment;

        return $this;
    }

    public function getTotalImpression(): ?int
    {
        return $this->totalImpression;
    }

    public function setTotalImpression(?int $totalImpression): self
    {
        $this->totalImpression = $totalImpression;

        return $this;
    }

    public function getCostPerThousand(): ?int
    {
        return $this->costPerThousand;
    }

    public function setCostPerThousand(?int $costPerThousand): self
    {
        $this->costPerThousand = $costPerThousand;

        return $this;
    }

    public function getEngagementRate(): ?int
    {
        return $this->engagementRate;
    }

    public function setEngagementRate(?int $engagementRate): self
    {
        $this->engagementRate = $engagementRate;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getFinishAt(): ?\DateTimeInterface
    {
        return $this->finishAt;
    }

    public function setFinishAt(\DateTimeInterface $finishAt): self
    {
        $this->finishAt = $finishAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
        }

        return $this;
    }

    /**
     * @return Collection|Support[]
     */
    public function getSupports(): Collection
    {
        return $this->supports;
    }

    public function addSupport(Support $support): self
    {
        if (!$this->supports->contains($support)) {
            $this->supports[] = $support;
            $support->setCampaign($this);
        }

        return $this;
    }

    public function removeSupport(Support $support): self
    {
        if ($this->supports->contains($support)) {
            $this->supports->removeElement($support);
            // set the owning side to null (unless already changed)
            if ($support->getCampaign() === $this) {
                $support->setCampaign(null);
            }
        }

        return $this;
    }
}
