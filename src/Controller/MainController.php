<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Notification\UserNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function home()
    {
        return $this->render('main/home.html.twig');
    }
    /**
     * @Route("/about", name="about", methods={"GET"})
     */
    public function about()
    {
        return $this->render('main/about.html.twig');
    }
    /**
     * @Route("/contact", name="main_contact", methods={"GET", "POST"})
     */
    public function contact(Request $request, UserNotification $notification)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $notification->contact($contact);
            return $this->render('main/success_mail.html.twig');
        }
        return $this->render('main/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/cookies", name="main_cookies", methods={"GET"})
     */
    public function cookiesPage()
    {
        return $this->render('main/cookies.html.twig');
    }
    /**
     * @Route("/legal", name="main_legal", methods={"GET"})
     */
    public function legalNotices()
    {
        return $this->render('main/legal.html.twig');
    }
    /**
     * @Route("/protection-data", name="main_data_protection", methods={"GET"})
     */
    public function dataProtection()
    {
        return $this->render('main/data_protection.html.twig');
    }
}
