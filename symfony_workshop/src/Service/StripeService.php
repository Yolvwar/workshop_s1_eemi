<?php
// src/Service/StripeService.php
namespace App\Service;

use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeService
{
    private $stripeSecretKey;
    private $stripePublicKey;

    public function __construct(string $stripeSecretKey, string $stripePublicKey)
    {
        $this->stripeSecretKey = $stripeSecretKey;
        $this->stripePublicKey = $stripePublicKey;

        // Initialiser Stripe avec la clé secrète
        Stripe::setApiKey($this->stripeSecretKey);
    }

    public function createCheckoutSession(int $amount): Session
    {
        // Créer une session de paiement avec Stripe Checkout
        return Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => 'ICO', // Remplacez par le nom de votre produit
                        ],
                        'unit_amount' => $amount, // Montant en centimes
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => 'https://papertoilet.com/', // URL après un paiement réussi
            'cancel_url' => 'https://www.sitedemerde.com/',   // URL en cas d'annulation
        ]);
    }

    public function getStripePublicKey(): string
    {
        return $this->stripePublicKey;
    }
}

