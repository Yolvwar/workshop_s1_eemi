<?php
namespace App\Service;

use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class StripeService
{
  private $stripeSecretKey;
  private $stripePublicKey;
  private $router;


  public function __construct(string $stripeSecretKey, string $stripePublicKey, UrlGeneratorInterface $router)
  {
    $this->stripeSecretKey = $stripeSecretKey;
    $this->stripePublicKey = $stripePublicKey;
    $this->router = $router;
    // Initialize Stripe with the secret key
    Stripe::setApiKey($this->stripeSecretKey);
  }

  public function createCheckoutSession(array $lineItems): Session
  {
    // Create a payment session with Stripe Checkout
    return Session::create([
      'payment_method_types' => ['card'],
      'line_items' => $lineItems,
      'mode' => 'payment',
      'success_url' => $this->router->generate('order_success', [], UrlGeneratorInterface::ABSOLUTE_URL), // URL after successful payment
      'cancel_url' => $this->router->generate('app_cart', [], UrlGeneratorInterface::ABSOLUTE_URL),   // URL in case of cancellation
    ]);
  }

  public function getStripePublicKey(): string
  {
    return $this->stripePublicKey;
  }
}
