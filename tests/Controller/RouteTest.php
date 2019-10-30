<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RouteTest extends WebTestCase
{

    /**
     * @dataProvider provideRoutes
     */
    public function testRoute(string $path, int $statusCode): void
    {
        $client = self::createClient();

        $client->request(Request::METHOD_GET, $path);

        self::assertResponseStatusCodeSame($statusCode);
    }

    public function provideRoutes(): iterable
    {
        yield ['/en/', Response::HTTP_OK];
        yield ['/en/contact', Response::HTTP_OK];
    }
}
