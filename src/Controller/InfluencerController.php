<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InfluencerController extends AbstractController
{
    /**
     * @Route("/influencer", name="influencer", methods={"GET"})
     */
    public function influencer()
    {
        return $this->render('influencer/index.html.twig');
    }
}
