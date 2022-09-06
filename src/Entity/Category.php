<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("products:read")]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups("products:read")]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Produit::class, mappedBy: 'categoryProduit')]
    private Collection $produits;

    public function __construct()
    {
        $this->producteur = new ArrayCollection();
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->addCategoryProduit($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            $produit->removeCategoryProduit($this);
        }

        return $this;
    }

    /**
     * Retourne de nom de la categorie ( utiliser pour easyadmin crud)
     */
    public function __toString()
    {
        return $this->name;
    }
}
