<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantite;



    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="produits")
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity=LigneCommandeProduit::class, mappedBy="produit")
     */
    private $ligneCommandeProduits;

    public function __construct()
    {
        $this->ligneCommandeProduits = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }


    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

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

    /**
     * @return Collection|LigneCommandeProduit[]
     */
    public function getLigneCommandeProduits(): Collection
    {
        return $this->ligneCommandeProduits;
    }

    public function addLigneCommandeProduit(LigneCommandeProduit $ligneCommandeProduit): self
    {
        if (!$this->ligneCommandeProduits->contains($ligneCommandeProduit)) {
            $this->ligneCommandeProduits[] = $ligneCommandeProduit;
            $ligneCommandeProduit->addProduit($this);
        }

        return $this;
    }

    public function removeLigneCommandeProduit(LigneCommandeProduit $ligneCommandeProduit): self
    {
        if ($this->ligneCommandeProduits->removeElement($ligneCommandeProduit)) {
            $ligneCommandeProduit->removeProduit($this);
        }

        return $this;
    }


}
