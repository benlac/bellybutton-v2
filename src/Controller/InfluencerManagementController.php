<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InfluencerManagementController extends AbstractController
{
    /**
     * @Route("InfluencerManagement/add", name="addInfluencer")
     */
    public function addInfluencer()
    {
        return $this->render('influencerManagement/add.html.twig');
    }
    /**
     * @Route("InfluencerMangement/", name="influencerList")
     */
    public function influencer()
    {
        return $this->render('influencerManagement/influencer.html.twig');
    }
    }