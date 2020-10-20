<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\AudienceTypeRepository")
 * @UniqueEntity("idAudience")
 */

 class AudienceType
 {
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idAudience;
    /**
     * @ORM\Column(type="string")
     */
    private $country1;
        /**
     * @ORM\Column(type="string")
     */
    private $country2;
        /**
     * @ORM\Column(type="string")
     */
    private $country3;
    /**
     * @ORM\Column(type="integer")
     */
    private $world;
    /**
     * @ORM\Column(type="integer")
     */
    private $shareH;
 }