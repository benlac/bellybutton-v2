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
