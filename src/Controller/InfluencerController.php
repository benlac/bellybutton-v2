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
    /**
     * Forgotten password
     * 
     * @Route("/forgotpassword", name="forgot_password", methods={"GET", "POST"})
     */
    public function forgottenPassword(Request $request, UserRepository $userRepository, TokenGeneratorInterface $tokenGenerator, EntityManagerInterface $em, UserNotification $notification)
    {
        $form = $this->createForm(ForgotPasswordType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // On vérifie si l'email saisi correspond bien à un user en BDD
            $user = $userRepository->findOneBy(['email' => $data['email']]);

            if($user !== null) {
                $token = $tokenGenerator->generateToken();
                $user->setResetToken($token);
                $em->flush();

                // ENVOIE notification avec liens de reset
                $notification->resetPassword($data['email'], $token);

                $this->addFlash('success', 'Un email vous a été envoyé afin de réinitialiser votre mot de passe.');
                
            } else {
                $this->addFlash('warning', 'L\'email saisie ne correspond pas un compte utilisateur.');
            }
        }

        return $this->render('security/forgot_password.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Reset password
     * 
     * @Route("/resetpassword", name="reset_password", methods={"GET", "POST"})
     */
    public function resetPassword(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $em)
    {
        $form = $this->createForm(ResetPasswordType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // On récupère l'utilisateur
            $user = $userRepository->findOneBy(['resetToken' => $request->query->get('token')]);

            if ($user !== null) {
                $encodedPassword = $passwordEncoder->encodePassword($user, $data['password']);
                $user->setPassword($encodedPassword);
                $user->setResetToken(null);

                $em->flush();

                $this->addFlash('success', 'Votre mot de passe a bien été modifié.');

                // Si tout est bon on redirige
                return $this->render('security/reset_password.html.twig', [
                    'form' => $form->createView(),
                    'reset' => true
                ]);

            } else {
                $this->addFlash('warning', 'Token invalide');
            }
        }

        return $this->render('security/reset_password.html.twig', [
            'form' => $form->createView(),
            'reset' => false
        ]);
    }
}
