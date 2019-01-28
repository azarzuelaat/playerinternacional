<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LayoutTest extends WebTestCase
{
    public function testPlaceholder()
    {
        $client = static::createClient();

        $response = $client->request('GET', '/');

        static::assertContains('placeholder:Usuario', $response->text());
        static::assertContains('placeholder:Contraseña', $response->text());
    }
}
