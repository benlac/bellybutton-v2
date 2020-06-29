<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InfluencerType;
use App\Form\UserEditPasswordType;
use App\Repository\RoleRepository;
use App\Form\RegisterInfluencerType;
use App\Notification\UserNotification;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

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
    public function register(Request $request, RoleRepository $roleRepository, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder, UserNotification $notification, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $authenticator)
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

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' 
            );
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
    /**
     * @Route("/influencer/profile/{id<\d+>}", name="influencer_edit", methods={"GET","POST"})
     */
    public function edit(User $user, Request $request)
    {
      $this->denyAccessUnlessGranted('EDIT', $user);  
      $form = $this->createForm(InfluencerType::class, $user);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          $this->getDoctrine()->getManager()->flush();
          $this->addFlash('success', 'Vos modification ont bien été prise en compte');

          return $this->redirectToRoute('influencer_edit', array( 'id' => $user->getid()));
      }

      return $this->render('influencer/dashboard/influencer_account_settings.html.twig', [
          'user' => $user,
          'form' => $form->createView(),
      ]);
    }

     /**
     * @Route("/influencer/profile/password/{id<\d+>}", name="influencer_edit_password")
     */
    public function editPassword(User $user, Request $request, UserPasswordEncoderInterface $encoder)
    {
        $this->denyAccessUnlessGranted('EDIT', $user);  

        $user = $this->getUser();

        $form = $this->createForm(UserEditPasswordType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user->setPassword($encoder->encodePassword($user, $user->getPassword()));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->addFlash('success', 'Mot de passe modifié');

            return $this->redirectToRoute('influencer_edit_password', array( 'id' => $user->getid()));
        }

        return $this->render('influencer/edit_password.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("influencer/profile/delete/{id<\d+>}", name="influencer_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user, Session $session)
    {
      $this->denyAccessUnlessGranted('REMOVE', $user);  
      $session = new Session();
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $session->invalidate();
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_logout');
    }
}
