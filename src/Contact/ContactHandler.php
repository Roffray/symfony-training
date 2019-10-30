<?php

namespace App\Contact;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class ContactHandler
{

    /** @var \Twig\Environment */
    private $twig;

    /** @var \Symfony\Component\Mailer\Mailer */
    private $mailer;

    public function __construct(Environment $twig, MailerInterface $mailer)
    {
        $this->twig = $twig;
        $this->mailer = $mailer;
    }

    public function handle(ContactData $data): void
    {
        $email = (new Email())
            ->addTo('us@website.tld')
            ->addFrom($data->email)
            ->priority(Email::PRIORITY_NORMAL)
            ->subject("Message from {$data->firstName}")
            ->html($this->twig->render('emails/contact.html.twig', [
                'firstName' => $data->firstName,
                'message' => $data->message,
            ]));

        //$this->mailer->send($email);


        $email = (new Email())
            ->addTo($data->email)
            ->addFrom('no-reply@website.tld')
            ->priority(Email::PRIORITY_NORMAL)
            ->subject('Message sent to Website.tld')
            ->html($this->twig->render('emails/contact.html.twig', [
                'firstName' => $data->firstName,
                'message' => $data->message,
            ]));

        //$this->mailer->send($email);
    }
}
