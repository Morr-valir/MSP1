<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Produit;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{


    function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {}

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gestion de stockage');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Gestion produit', 'fa-solid fa-cart-shopping', Produit::class);
        yield MenuItem::linkToCrud('Gestion categorie', 'fa-solid fa-list', Category::class);
        yield MenuItem::linkToCrud('Gestion utilisateurs', 'fa-solid fa-user', User::class);

    }
}
