<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

final class OrdersController extends AbstractController
{
    #[Route('/orders', name: 'orders')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $orders = $entityManager->getRepository(Order::class)->findAll();


        return $this->render('orders/index.html.twig', [
            'orders' => $orders,
            'controller_name' => 'OrdersController',
        ]);
    }

    #[Route('/orders/add', name: 'order_add')]
    public function add(SessionInterface $session, ProductsRepository $productsRepository, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $cart = $session->get('cart', []);

        if (empty($cart)) {
            $this->addFlash('error', 'Votre panier est vide');
            return $this->redirectToRoute('app_cart');
        }

        $order = new Order();
        $order->setClient($this->getUser());
        $order->setOrderedAt(new \DateTime());

        foreach ($cart as $item => $quantity) {
            $orderItem = new OrderItem();

            $product = $productsRepository->find($item);
            $price = $product->getPrice();

            $orderItem->setProduct($product);
            $orderItem->setPrice($price);
            $orderItem->setQuantity($quantity);
            $orderItem->setOrder($order);

            $order->addOrderItem($orderItem);
        }

        // persiste & flush

        $entityManager->persist($order);
        $entityManager->flush();

        // clear cart

        $session->remove('cart');

        $this->addFlash('success', 'Commande crée avec succès');
        return $this->redirectToRoute('homepage');
    }
}
