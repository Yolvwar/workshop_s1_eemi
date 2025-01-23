<?php

namespace App\Controller;

use App\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\ProductsRepository;
use Symfony\Component\Routing\Attribute\Route;

final class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(SessionInterface $session, ProductsRepository $productsRepository): Response
    {
        $cart = $session->get('cart', []);

        // Initialisation des produits
        $products = [];
        $total = 0;

        foreach ($cart as $id => $quantity) {
            $product = $productsRepository->find($id);

            $products[] = [
                'product' => $product,
                'quantity' => $quantity,
            ];

            $total += $product->getPrice() * $quantity;
        }

        return $this->render('cart/index.html.twig', [
            'controller_name' => 'CartController',
            'products' => $products,
            'total' => $total,
        ]);
    }

    #[Route('cart/add/{id}', name: 'app_cart_add')]
    public function add(Products $product, SessionInterface $session): Response
    {

        // On recupere l'id du produit
        $id = $product->getId();

        // On recupere le panier
        $cart = $session->get('cart', []);

        // Ajouter le produit au panier sinon on incremente la quantité (si le produit est deja dans le panier)
        if (empty($cart[$id])) {
            $cart[$id] = 1;
        } else {
            $cart[$id]++;
        }

        // On sauvegarde le panier


        $session->set('cart', $cart);

        return $this->redirectToRoute('app_cart');
    }
}
