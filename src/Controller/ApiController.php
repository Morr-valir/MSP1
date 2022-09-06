<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ApiController extends AbstractController
{

    #[Route('/api/product', name: 'app_api')]
    public function index(ProduitRepository $produitRepository, NormalizerInterface $normalizerInterface): Response
    {

        //On récupere la liste de tous les produits
        $produits = $produitRepository->findAll();

        //On recupere nos object et on les transforme sous forme de tableau
        $normaliser = $normalizerInterface->normalize($produits, null, ['groups' =>'products:read']);

        //On encode notre tableau au format JSON
        $encodeJson = json_encode($normaliser);

        //L'on crée une Response contenant nos données au format json
        $reponse = new Response($encodeJson,200, [
            'Content-Type' => "Application/json"
        ]);

        return $reponse;
    }
}
