<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ProduitController extends AbstractController
{
    #[Route('/produit', name: 'app_produit')]
    public function index(): Response
    {
        return $this->render('products/index.html.twig', [
        ]);
    }

    #[Route('/produit-achat', name: 'checkout')]
    public function checkout(): Response
    {
        \Stripe\Stripe::setApiKey('sk_test_51QkDivIqHUyroBDF8y3J7KtojI3m3sXMQFIiOLFvHbxAYkNE1DxzImNPTlAvQf9lBmzwHj81VuZpwOT7njOWBdcL00UM1lOxNX');
        
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'ICO',
                    ],
                    'unit_amount' => 2000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'https://papertoilet.com/',
            'cancel_url' => 'https://isitchristmas.com/',      
        ]);
        return new JsonResponse([ 'id' => $session->id ]); 
    }
}


