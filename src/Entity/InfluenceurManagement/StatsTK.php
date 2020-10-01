<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatsTKRepository")
 * @UniqueEntity("idStatsTK")
 */
class StatsTK
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idStatsTK;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbrLikeTK;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbrAboTK;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbrComsTK;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbrVuesTK;
    /**
     * @ORM\Column(type="integer")
     */
    private $idAudience;
    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;
}