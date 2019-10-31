<?php

namespace App\Controller;


use App\Contact\ContactHandler;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    /** @var \Symfony\Component\Mailer\MailerInterface */
    private $mailer;
    /** @var \App\Contact\ContactHandler */
    private $contactHandler;

    public function __construct(
        MailerInterface $mailer,
        ContactHandler $contactHandler
    ) {
        $this->mailer         = $mailer;
        $this->contactHandler = $contactHandler;
    }

    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function homepage(Request $request): Response
    {
        return $this->render('main/homepage.html.twig');
    }

    /**
     * @Route("/contact", name="contact", methods={"GET", "POST"})
     */
    public function contact(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->contactHandler->handle($form->getData());

            $this->addFlash('success',
                'Email successfully sent, please wait for some years to get an answer from Céline.');
            $this->addFlash('success',
                'Céline did not answer to your email yet, but you received a copy of your message by email.');

            return $this->redirectToRoute('home');
        }

        return $this->render('main/contact.html.twig', [
            'contact_form' => $form->createView(),
        ]);
    }
}
