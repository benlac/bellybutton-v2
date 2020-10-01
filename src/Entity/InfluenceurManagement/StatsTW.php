<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\RepositoryStatsTWRepository")
 * @UniqueEntity("idStatsTW")
 */
class StatsTW
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idStatsTW;
    /**
     * @ORM\Column(type="integer")
     */
    private $averageViewTW;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbrAboTW;
    /**
     * @ORM\Column(type="integer")
     */
    private $idAudience;
    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;
}
