<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UsersController extends AbstractController
{
    #[Route('/users', name: 'users')]
    public function index( EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();

        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
            'users' => $users,
        ]);
    }
}
