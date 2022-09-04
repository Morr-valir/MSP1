<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Page d'affichage du panier & de sa gestion
 */
class GestionPanierController extends AbstractController
{
    #[Route('/panier', name: 'app_gestion_panier')]
    public function index(SessionInterface $session, ProduitRepository $produit): Response
    {
        //initialisation d'un panier vide si il n'exsiste pas
        $initPanier = $session->get('Panier',[]);
        //Réaction d'un tableau vide qui va contenir les données de la session pour l'affichage
        $panier = [];

        //Boucle pour ajouter les données de la Session dans la variable panier via id du produit
        foreach($initPanier as $id => $quantity){
            $panier[] = [
                'produit' => $produit->find($id),
                'quantite' =>$quantity,
            ];
        }
        //Boucle pour calculer la quantité en € des produits du panier
        $valuePanierPrix = 0;
        foreach($panier as $produit){
            $prixT = $produit['produit']->getPrix() * $produit['quantite'];
            $valuePanierPrix += $prixT;
        }
        //dd($panier);
        return $this->render('gestion_panier/index.html.twig', [
            'controller_name' => 'GestionPanierController',
            'panierContent' => $panier,
            'prixTotal' => $valuePanierPrix,
        ]);
    }

    /**
    * Fonction d'ajout au panier
    * Crée une session si n'existe pas & ajout le produit dans la session
    */
    #[Route('panier/ajout/{id}', name: 'app_panierAdd')]
    public function ajoutPanier($id, SessionInterface $session){
        //Creation de la session Panier [] si celui-ci n'exsiste pas
        $panierUser = $session->get('Panier',[]);
        //Ajout du produit selectionner au panier
        if (!empty($panierUser[$id])) {
            //si exsiste deja
            $panierUser[$id]++;
        } else {
            //si n'exsiste pas
            $panierUser[$id] = 1;
        }
        
        //Persistance du produit ajouter dans la session
        $session->set('Panier',$panierUser);
        dd($session->get('Panier'));
    }

}




