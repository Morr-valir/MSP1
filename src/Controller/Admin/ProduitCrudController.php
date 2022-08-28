<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    public function configureFields(string $pageName): iterable
    {

        /**
         * Import des variables du fichies services.yaml
         */
        $produitDir = $this->getParameter('produit_dir');
        $produitUpload = $this->getParameter('produit_image');

        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name')->setLabel('Nom du Produit'),
            ImageField::new('image')->setBasePath($produitDir)->setUploadDir($produitUpload),
            TextEditorField::new('description')->setLabel('Provenance du produit'),
            NumberField::new('prix')->setLabel('Prix du produit'),
            AssociationField::new('categoryProduit')->setLabel('Categorie produit'),
            AssociationField::new('producteur')->setLabel('Producteur'),

        ];
    }
}
