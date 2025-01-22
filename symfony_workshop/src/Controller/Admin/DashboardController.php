<?php

namespace App\Controller\Admin;

use App\Entity\Card;
use App\Entity\Order;
use App\Entity\Products;
use App\Entity\Rules;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Workshop - Adminstration')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Gestion application');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Commandes', 'fas fa-cart-flatbed', Order::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-boxes-stacked', Products::class);
        yield MenuItem::linkToCrud('Pages', 'fas fa-window-restore', Products::class);

        yield MenuItem::section('Gestion du jeu');
        yield MenuItem::linkToCrud('Cartes', 'fas fa-id-card', Card::class);
        yield MenuItem::linkToCrud('Regles', 'fas fa-book', Rules::class);
        yield MenuItem::linkToCrud('Packs', 'fas fa-box', Card::class);
        yield MenuItem::linkToCrud('Extensions', 'fas fa-box-open', Card::class);
    }
}
