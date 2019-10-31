<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RouteTest extends WebTestCase
{

    /** @var \Symfony\Bundle\FrameworkBundle\KernelBrowser */
    private $client;

    protected function setUp(): void
    {
        $this->client = self::createClient();
    }

    /**
     * @dataProvider provideRoutes
     */
    public function testRoute(string $path, int $statusCode): void
    {
        $this->client->request(Request::METHOD_GET, $path);

        self::assertResponseStatusCodeSame($statusCode);
    }

    public function provideRoutes(): iterable
    {
        yield ['/en/', Response::HTTP_OK];
        yield ['/en/contact', Response::HTTP_OK];
    }
}
