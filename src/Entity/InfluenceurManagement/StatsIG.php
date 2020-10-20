<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatsIGRepository")
 * @UniqueEntity("idStatsIG")
 */
class StatsIG
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idStatsIG;
    /**
     * @ORM\Column(type="integer")
     */
    private $likeIG;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbrComsIG;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbrAboIG;
    /**
     * @ORM\Column(type="integer")
     */
    private $idAudience;
    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

}