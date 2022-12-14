<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("products:read")]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups("products:read")]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups("products:read")]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups("products:read")]
    private ?float $prix = null;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'produits')]
    #[Groups("products:read")]
    private Collection $categoryProduit;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?User $producteur = null;

    #[ORM\Column(length: 255)]
    #[Groups("products:read")]
    private ?string $image = null;

    #[ORM\Column(nullable: true)]
    private ?bool $vedette = null;


    public function __construct()
    {
        $this->categoryProduit = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategoryProduit(): Collection
    {
        return $this->categoryProduit;
    }

    public function addCategoryProduit(Category $categoryProduit): self
    {
        if (!$this->categoryProduit->contains($categoryProduit)) {
            $this->categoryProduit->add($categoryProduit);
        }

        return $this;
    }

    public function removeCategoryProduit(Category $categoryProduit): self
    {
        $this->categoryProduit->removeElement($categoryProduit);

        return $this;
    }

    public function getProducteur(): ?User
    {
        return $this->producteur;
    }

    public function setProducteur(?User $producteur): self
    {
        $this->producteur = $producteur;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function isVedette(): ?bool
    {
        return $this->vedette;
    }

    public function setVedette(?bool $vedette): self
    {
        $this->vedette = $vedette;

        return $this;
    }

}
