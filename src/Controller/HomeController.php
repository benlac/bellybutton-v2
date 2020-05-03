<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function home()
    {
        return $this->render('home/home.html.twig');
    }
    /**
     * @Route("/about", name="about", methods={"GET"})
     */
    public function about()
    {
        return $this->render('home/about.html.twig');
    }
}
