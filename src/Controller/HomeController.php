<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * Route vers l'accueil du site
     */
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * Route vers la boutique du site
     */
    #[Route('/boutique', name: 'app_shop')]
    public function shop(): Response
    {
        return $this->render('boutique/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
        /**
     * Route vers la page contact du site
     */
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
       
}
