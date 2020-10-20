<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\AgencyRepository")
 * @UniqueEntity("nameAgency")
 */
class Agency
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $nameAgency;

    /**
     * @ORM\Column(type="integer")
     */
    private $idDefaultContact;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private $nameContact;
    /**
     * @ORM\Column(type="integer")
     */
    private $idContact;
}
