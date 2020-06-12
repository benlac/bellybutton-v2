<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\AuditType;
use App\Form\UserType;
use App\Form\RegisterBusinessType;
use App\Repository\RoleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Notification\UserNotification;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class BusinessController extends AbstractController
{
    /**
     * @Route("/business", name="business", methods={"GET"})
     */
    public function business()
    {
        return $this->render('business/business.html.twig');
    }
    /**
     * @Route("/business/register", name="business_register", methods={"GET", "POST"})
     */
    public function register(Request $request, RoleRepository $roleRepository, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder, UserNotification $notification)
    {
        $user = new User();
        $form = $this->createForm(RegisterBusinessType::class, $user);
        $form->handleRequest($request);
        $roleBusiness = $roleRepository->findOneBy(['name' => 'ROLE_BUSINESS']);
        if($form->isSubmitted() && $form->isValid()){
            $user->addUserRole($roleBusiness);
            $encodedPassword = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encodedPassword);
            $em->persist($user);
            $em->flush();
            $notification->notify($user);

            return $this->redirectToRoute('business_success');
        }

        return $this->render('business/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/business/success", name="business_success", methods={"GET"})
     */
    public function success()
    {
        return $this->render('business/success.html.twig');
    }
    /**
     * @Route("/business/audit", name="business_audit", methods={"GET", "POST"})
     */
    public function audit(Request $request)
    {
        $form = $this->createForm(AuditType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $userLogged = $this->getUser();
            $data = $form->getData();
            // dump($userLogged);
            // dump($data);
            //TODO envoyer via le mailer, les datas du form et l'utilisateur connecté
        }
        return $this->render('business/audit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/business/dashboard/{id<\d+>}/{reactRouting}", name="business_dashboard", defaults={"reactRouting": null})
     */
    public function dashboard(User $user)
    { 
        $this->denyAccessUnlessGranted('SHOW', $user);  
        return $this->render('business/dashboard/campagns.html.twig');
    }

    /**
     * @Route("/business/profile/{id<\d+>}", name="business_edit", methods={"GET","POST"})
     */
    public function edit(User $user, Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
      $this->denyAccessUnlessGranted('EDIT', $user);  
      $form = $this->createForm(UserType::class, $user);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          if($form->get('password')->getData()){
              $encodedPassword = $passwordEncoder->encodePassword($user, $form->get('password')->getData());
              $user->setPassword($encodedPassword);
          }
          $this->getDoctrine()->getManager()->flush();

          return $this->redirectToRoute('home');
      }

      return $this->render('business/business_account_settings.html.twig', [
          'user' => $user,
          'form' => $form->createView(),
      ]);
    }

    /**
     * @Route("business/profile/delete/{id}", name="business_delete", methods={"DELETE"})
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
