<?php

namespace App\Notification;

use App\Entity\Contact;
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
        ->setFrom('tp@bellybutton-group.com')
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
        ->setFrom('tp@bellybutton-group.com')
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
    public function audit($data)
    {
        $message = (new \Swift_Message('Demande d\'audit'))
        ->setFrom($data['email'])
        ->setTo('tp@bellybutton-group.com')
        ->setBody(
            $this->renderer->render(
                'mails/audit.html.twig',
                ['data' => $data]
            ),
            'text/html'
        );

        $this->mailer->send($message);

    }
    public function contact(Contact $contact)
    {
        $message = (new \Swift_Message('Demande de contact'))
        ->setFrom($contact->getEmail())
        ->setTo('tp@bellybutton-group.com')
        ->setBody(
            $this->renderer->render(
                'mails/contact.html.twig',
                ['contact' => $contact]
            ),
            'text/html'
        );

        $this->mailer->send($message);

    }
}