<?php

// tests/Controller/ProfileControllerTest.php
namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProfileControllerTest extends WebTestCase
{
    // ...

    // public function testCommentSubmission()
    // {
    //     $this->client = static::createClient();
    //     $crawler = $this->client->request('GET', '/login');
    //     $form = $crawler->selectButton('login')->form();
    //     $form['email'] = 'JackPierre1@gmail.com';
    //     $form['password'] = 'JackPierre1#';
 
    //     $crawler = $this->client->submit($form);
 

    //     $this->assertPageTitleContains('Accueil');
    // }

        public function testCommentSubmission()
    {
        $client = static::createClient();
        $client->request('GET', '/login');
        $client->submitForm('loginA', [
            'email' => 'JackPierre1@gmail.com',
            'password' => 'JackPierre1#'
        ]);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertSelectorExists('div:contains("vous")');
    }
}

