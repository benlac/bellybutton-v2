<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
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
    public function contact(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            dump($contact);
            //TODO mise en place du mailer
        }
        return $this->render('main/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
