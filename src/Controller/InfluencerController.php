<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use App\Form\RegisterInfluencerType;
use App\Notification\UserNotification;
use App\Form\ResetPasswordType;
use App\Form\ForgotPasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class InfluencerController extends AbstractController
{
    /**
     * @Route("/influencer", name="influencer", methods={"GET"})
     */
    public function influencer()
    {
        return $this->render('influencer/index.html.twig');
    }
    /**
     * @Route("/influencer/register", name="influencer_register", methods={"GET", "POST"})
     */
    public function register(Request $request, RoleRepository $roleRepository, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder, UserNotification $notification)
    {
        $user = new User();
        $form = $this->createForm(RegisterInfluencerType::class, $user);
        $form->handleRequest($request);
        $roleBusiness = $roleRepository->findOneBy(['name' => 'ROLE_INFLUENCER']);
        if($form->isSubmitted() && $form->isValid()){
            $user->addUserRole($roleBusiness);
            $encodedPassword = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encodedPassword);
            $em->persist($user);
            $em->flush();
            $notification->notify($user);

            return $this->redirectToRoute('influencer_success');
        }
        return $this->render('influencer/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/influencer/success", name="influencer_success", methods={"GET"})
     */
    public function success()
    {
        return $this->render('influencer/success.html.twig');
    }
}
