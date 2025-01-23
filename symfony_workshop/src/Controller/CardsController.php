<?php

namespace App\Controller;

use App\Entity\Card;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CardRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

final class CardsController extends AbstractController
{
    #[Route('/cards', name: 'cards')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $cards = $entityManager->getRepository(Card::class)->findAll();

        return $this->render('cards/index.html.twig', [
            'cards' => $cards,
            'controller_name' => 'CardsController',
        ]);
    }

    #[Route('/cards/{id}', name: 'cards_show')]
    public function show(int $id, CardRepository $cardRepository): Response
    {   
        $cards = $cardRepository->find($id);


        if (!$cards) {
            throw $this->createNotFoundException('Carte non trouvée');
        }

        return $this->render('cards/show.html.twig', [
            'cards' => $cards,
        ]);
    }
}
