<?php

namespace App\Controller;

use App\Entity\Products;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; // Utilisation de Annotation pour les routes

class ProductsController extends AbstractController
{
    #[Route('/products', name: 'products')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Récupérer tous les produits
        $products = $entityManager->getRepository(Products::class)->findAll();

        // Retourner la vue avec les produits
        return $this->render('products/index.html.twig', [
            'products' => $products,
            'controller_name' => 'ProductsController',
        ]);
    }
}
