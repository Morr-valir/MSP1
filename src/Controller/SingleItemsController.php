<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SingleItemsController extends AbstractController
{
    /**
     * Route vers la page d'un boutique du site
     * Utilisation des annotation Entity pour la récupération des donnée du produit séléctionner
     */
    #[Route('/Detail/{id}', name: 'app_single_items')]
    #[Entity("Produit", expr:"repository.findOneById(id)")]
    public function index(Produit $produit): Response
    {
        //dd($produit);
        return $this->render('single/index.html.twig', [
            'controller_name' => 'SingleItemsController',
            'produit' => $produit,
        ]);
    }
}
