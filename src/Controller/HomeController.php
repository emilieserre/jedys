<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use GuzzleHttp\Client;

class HomeController extends AbstractController
{

    public function index()
    {
        // Create a client with a base URI
        $client = new Client([
                'base_uri' => 'http://easteregg.wildcodeschool.fr/api/',
            ]);

        // Send a request to https://foo.com/api/test
        $response = $client->request('GET', 'eggs');
        $body = $response->getBody();
        $content = $body->getContents();
        $eggs = json_decode($content, true);

        return $this->twig->render('Home/index.html.twig', ['eggs' => $eggs]);
    }

    public function map()
    {
        return $this->twig->render('Page/map.html.twig');
    }

    public function kingslanding()
    {
        return $this->twig->render('Home/kingslanding.html.twig');
    }
}
