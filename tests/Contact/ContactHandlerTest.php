<?php

namespace App\Tests\Contact;

use App\Contact\ContactData;
use App\Contact\ContactHandler;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Mailer\MailerInterface;
use Twig\Environment;

class ContactHandlerTest extends TestCase
{

    public function testHandleContactDataWillSendEmails(): void
    {
        $twig = $this->createMock(Environment::class);
        $mailer = $this->createMock(MailerInterface::class);
        $mailer->expects(self::exactly(2))->method('send');

        $contactHandler = new ContactHandler(
            $twig, $mailer, 'test@localhost', 'test@localhost'
        );

        $data = $this->createMock(ContactData::class);
        $data->firstName = 'Test';
        $data->email = 'test@somewhere';
        $data->message = 'I believe I can fly…';

        $contactHandler->handle($data);
    }
}
