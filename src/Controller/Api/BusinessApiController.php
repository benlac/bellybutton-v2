<?php

namespace App\Controller\Api;

use App\Service\DateFormatter;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use App\Repository\CampaignRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api", name="api")
 */
class BusinessApiController extends AbstractController
{
    /**
     * @Route("/campaign/{id<\d+>}", name="_campaign", methods={"GET"})
     */
    public function list(UserRepository $userRepository, RoleRepository $roleRepository,CampaignRepository $campaignRepository, $id)
    { 
      // Je récupère le role "business"  
      $roleBusiness= $roleRepository->findOneBy(['name' => 'ROLE_BUSINESS']);
      // je récupère l'utilisateur qui as le role business et l'id de l'utilisateur que l'api va requeter 
      $business = $userRepository->getUserByRole($roleBusiness, $id);
      // Récuperation des campagnes liée à l'utilisateur $business
      $campaign = $campaignRepository->getCampaignByBusiness($business);

      foreach($campaign as $camp){
        DateFormatter::format($camp, ['createdAt', 'finishAt']);
      };

      return $this->json($campaign, Response::HTTP_OK, [], ['groups' => 'campaign_get']);
    }
    /**
     * @Route("/user", name="_user_logged", methods={"GET"})
     */
    public function userLogged()
    { 
      $user = $this->getUser();
      if($user === null) {
        return $this->json([
            'message' => 'Veuillez vous identifiez'
            ],
            Response::HTTP_NOT_FOUND
        );
    }
      return $this->json($user, Response::HTTP_OK, [], ['groups' => 'user_logged']);
    }
}
