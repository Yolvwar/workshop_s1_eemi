<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Rules;
use Doctrine\ORM\EntityManagerInterface;

final class RulesController extends AbstractController
{
    #[Route('/rules', name: 'rules')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $rules = $entityManager->getRepository(Rules::class)->findAll();
        return $this->render('rules/index.html.twig', [
            'rules' => $rules,
            'controller_name' => 'RulesController',
        ]);
    }
}
