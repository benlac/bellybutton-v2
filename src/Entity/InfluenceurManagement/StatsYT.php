<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatsYTRepository")
 * @UniqueEntity("idStatsYT")
 */
class idStatsYT
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idStatsYT;
    // TODO Voir avec PJ quel est le type de Estimations (De mémoire Int)
    private $EstimationsYT;
    /**
     * @ORM\Column(type="integer")
     */
    private $likeYT;
    /**
     * @ORM\Column(type="integer")
     */
    private $dislikeYT;
    /**
     * @ORM\Column(type="integer")
     */
    private $viewYT;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbVid7YT;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbVid37YT;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbAboYT;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbComsYT;
    /**
     * @ORM\Column(type="integer")
     */
    private $idAudience;
    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;
}