<?php
// src/Controller/ProduitController.php
namespace App\Controller;

use App\Service\StripeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class ProduitController extends AbstractController
{
    private StripeService $stripeService;

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    #[Route('/produit', name: 'app_produit')]
    public function index(): Response
    {
        // Vous pouvez récupérer la clé publique ici
        $stripePublicKey = $this->stripeService->getStripePublicKey();

        return $this->render('products/index.html.twig', [
            'stripePublicKey' => $stripePublicKey
        ]);
    }

    #[Route('/produit-achat', name: 'checkout')]
    public function checkout(): Response
    {
        // Crée la session Stripe Checkout pour le paiement
        $session = $this->stripeService->createCheckoutSession(2000); // 2000 correspond à 20 EUR

        // Retourne l'ID de la session
        return new JsonResponse([ 'id' => $session->id ]);
    }
}



