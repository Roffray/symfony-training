<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class MainControllerTest extends WebTestCase
{

    public function testHomepage(): void
    {
        $client = self::createClient();

        $client->request(Request::METHOD_GET, '/en/');
        self::assertResponseIsSuccessful();
        self::assertSelectorTextSame('h1', 'Homepage');
    }

    public function testContact(): void
    {
        $client = self::createClient();

        $client->request(Request::METHOD_GET, '/en/contact');
        self::assertResponseIsSuccessful();

        $client->enableProfiler();
        $client->submitForm('Submit', [
            'contact[firstName]' => 'Test',
            'contact[email]' => 'test@test.yz',
            'contact[message]' => 'Test!!',
        ]);

        self::assertLessThan(
            500,
            $client->getProfile()->getCollector('time')->getDuration()
        );
        $client->followRedirect();

        self::assertRouteSame('home');
        self::assertSelectorExists('.alert-success');
    }
}
