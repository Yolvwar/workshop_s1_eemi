<?php

namespace App\Controller;

use App\Entity\Products;
use App\Repository\ProductsRepository;
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

    #[Route('/products/{id}', name: 'products_show')]
    public function show(int $id, ProductsRepository $productsRepository): Response
    {
        $products = $productsRepository->find($id);

        if (!$products) {
            throw $this->createNotFoundException('Produit non trouvé');
        }

        return $this->render('products/show.html.twig', [
            'products' => $products,
        ]);
    }
}
