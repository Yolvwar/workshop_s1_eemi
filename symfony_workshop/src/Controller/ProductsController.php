<?php

namespace App\Controller;

use App\Entity\Products;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductsController extends AbstractController
{
    #[Route('/products', name: 'products')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $products = $entityManager->getRepository(Products::class)->findAll();


        return $this->render('products/index.html.twig', [
            'products' => $products,
            'controller_name' => 'ProductsController',
        ]);
    }
}
