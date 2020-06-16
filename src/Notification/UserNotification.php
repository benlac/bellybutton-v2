<?php

namespace App\Notification;

use App\Entity\User;
use Twig\Environment;

class UserNotification
{
    /**
     * @var Environnement
     */
    private $renderer;
    
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }
    public function notify(User $user)
    {
        $message = (new \Swift_Message('Email de confirmation d\'inscription'))
        ->setFrom('admin@bellybutton.com')
        ->setTo($user->getEmail())
        ->setBody(
            $this->renderer->render(
                'mails/registration.html.twig',
                ['user' => $user]
            ),
            'text/html'
        );

        $this->mailer->send($message);

    }
    public function resetPassword($userEmail, $token)
    {
        $message = (new \Swift_Message('Email d\'alerte : réinitilisation du mot de passe'))
        ->setFrom('admin@bellybutton.com')
        ->setTo($userEmail)
        ->setBody(
            $this->renderer->render(
                'mails/reset_password.html.twig',
                ['emailUSer' => $userEmail,
                'token' => $token
                ]
            ),
            'text/html'
        );

        $this->mailer->send($message);
    }
}