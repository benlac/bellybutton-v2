<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CampaignRepository")
 */
class Campaign
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("campaign_get")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("campaign_get")
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Groups("campaign_get")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     * @Groups("campaign_get")
     */
    private $viewGoal;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups("campaign_get")
     */
    private $view;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups("campaign_get")
     */
    private $nbLike;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups("campaign_get")
     */
    private $nbComment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups("campaign_get")
     */
    private $totalImpression;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups("campaign_get")
     */
    private $costPerThousand;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups("campaign_get")
     */
    private $engagementRate;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("campaign_get")
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("campaign_get")
     */
    private $finishAt;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("campaign_get")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups("campaign_get")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="campaigns")
     * @Groups("campaign_get")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Support", mappedBy="campaign")
     * @Groups("campaign_get")
     */
    private $supports;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->supports = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->status = true;
    }
    public function __toString()
    {
        return $this->name;
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

    public function getFinishAt()
    {
        return $this->finishAt;
    }

    public function setFinishAt($finishAt): self
    {
        $this->finishAt = $finishAt;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt( $updatedAt): self
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
