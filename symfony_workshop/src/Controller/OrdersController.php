<?php

namespace App\Controller;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
}
