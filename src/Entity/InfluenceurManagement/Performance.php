<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity("id")
 */

 class Performance
 {
     /**
      * @ORM\Id()
      * @ORM\GeneratedValue()
      * @ORM\Column(type="integer")
      */
    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $idStatsYT;
    /**
     * @ORM\Column(type="integer")
     */
    private $idStatsIG;
    /**
     * @ORM\Column(type="integer")
     */
    private $idStatsTW;
    /**
     * @ORM\Column(type="integer")
     */
    private $idStatsTK;
    /**
     * @ORM\Column(type="integer")
     */
    private $audienceCategorie;
    /**
     * @ORM\Column(type="integer")
     */
    private $status;
    /**
     * @ORM\Column(type="integer")
     */
    private $sector;
    /**
     * @ORM\Column(type="integer", length=2)
     */
    private $margin;

    // TODO figure out a path to add here and how to use it on output
    /**
     * @ORM\Column(type="string")
     */
    private $pictureLarge;
    /**
     * @ORM\Column(type="string")
     */
    private $pictureSmall;

 }