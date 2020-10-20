<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InfoContactRepository")
 * @UniqueEntity("id")
 */
class infoContact 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $mailPro;
    /**
     * @ORM\Column(type="integer", length=10)
     * @Assert\NotBlank
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $postalAdress;
    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $numWhatsApp;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $preferedContact;
}