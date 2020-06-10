<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\AuditType;
use App\Form\RegisterBusinessType;
use App\Repository\RoleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
    public function register(Request $request, RoleRepository $roleRepository, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
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
       //@TODO : Mettre en place un voters pour autoriser uniquement un user Authentifier et avec le role business   
        $this->denyAccessUnlessGranted('SHOW', $user);  
        return $this->render('business/dashboard/campagns.html.twig');
    }
}
