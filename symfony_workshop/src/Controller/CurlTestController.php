<?php

// src/Controller/CurlTestController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CurlTestController
{
    #[Route('/test-curl', name: 'test_curl')]
    public function testCurl(): Response
    {
        if (function_exists('curl_version')) {
            $curlVersion = curl_version();
            return new Response('<pre>' . print_r($curlVersion, true) . '</pre>');
        } else {
            return new Response('cURL n\'est pas activé sur ce serveur.', 500);
        }
    }
}
