<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BusinessController extends AbstractController
{
    /**
     * @Route("/business", name="business", methods={"GET"})
     */
    public function business()
    {
        return $this->render('business/business.html.twig');
    }
}
