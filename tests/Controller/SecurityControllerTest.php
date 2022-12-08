<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testGET()
    {
        $client = static::createClient();
        $client->request('GET', 'https://127.0.0.1/login');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h3', 'Bienvenue');
    }
}