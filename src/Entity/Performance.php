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
     * @ORM\Column(type="interger")
     */
    private $idStatsYT;
    /**
     * @ORM\Column(type="interger")
     */
    private $idStatsIG;
    /**
     * @ORM\Column(type="interger")
     */
    private $idStatsTW;
    /**
     * @ORM\Column(type="interger")
     */
    private $idStatsTK;
    /**
     * @ORM\Column(type="char")
     */
    private $audienceCategorie;
    /**
     * @ORM\Column(type="char")
     */
    private $status;
    /**
     * @ORM\Column(type="char")
     */
    private $sector;
    /**
     * @ORM\Column(type="integer, length=(2))
     */
    private $margin;
    /**
     * @ORM\Column(type="string")
     */
    private $pictureLarge;
    /**
     * @ORM\Column(type="string")
     */
    private $pictureSmall;

 }