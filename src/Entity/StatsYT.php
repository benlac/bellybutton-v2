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
 * @ORM\Entity(repositoryClass="App\Repository\StatsYTRepository")
 * @UniqueEntiry("idStatsYT")
 */
class idStatsYT
{
    private $idStatsYT;
    private $EstimationsYT;
    private $likeYT;
    private $dislikeYT;
    private $viewYT;
    private $nbVid7YT;
    private $nbVid37YT;
    private $nbAboYT;
    private $nbComsYT;
    private $idAudience;
    private $updatedAt;
}