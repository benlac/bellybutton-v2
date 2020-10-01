<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatsYTRepository")
 * @UniqueEntity("idStatsYT")
 */
class StatsYT
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idStatsYT;
    /**
     * @ORM\Column(type="integer")
     */
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