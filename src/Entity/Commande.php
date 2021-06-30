<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_commande;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $remise;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statut;



    /**
     * @ORM\OneToOne(targetEntity=Livraison::class, cascade={"persist", "remove"})
     */
    private $id_livraison;

    /**
     * @ORM\OneToMany(targetEntity=LigneCommandeMenu::class, mappedBy="commande")
     */
    private $ligneCommandeMenus;

    /**
     * @ORM\OneToMany(targetEntity=LigneCommandeProduit::class, mappedBy="commande")
     */
    private $ligneCommandeProduits;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="commandes")
     */
    private $utilisateur;

    public function __construct()
    {
        $this->ligneCommandeMenus = new ArrayCollection();
        $this->ligneCommandeProduits = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->date_commande;
    }

    public function setDateCommande(?\DateTimeInterface $date_commande): self
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    public function getRemise(): ?string
    {
        return $this->remise;
    }

    public function setRemise(?string $remise): self
    {
        $this->remise = $remise;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }



    public function getIdLivraison(): ?livraison
    {
        return $this->id_livraison;
    }

    public function setIdLivraison(?livraison $id_livraison): self
    {
        $this->id_livraison = $id_livraison;

        return $this;
    }

    /**
     * @return Collection|LigneCommandeMenu[]
     */
    public function getLigneCommandeMenus(): Collection
    {
        return $this->ligneCommandeMenus;
    }

    public function addLigneCommandeMenu(LigneCommandeMenu $ligneCommandeMenu): self
    {
        if (!$this->ligneCommandeMenus->contains($ligneCommandeMenu)) {
            $this->ligneCommandeMenus[] = $ligneCommandeMenu;
            $ligneCommandeMenu->setCommande($this);
        }

        return $this;
    }

    public function removeLigneCommandeMenu(LigneCommandeMenu $ligneCommandeMenu): self
    {
        if ($this->ligneCommandeMenus->removeElement($ligneCommandeMenu)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommandeMenu->getCommande() === $this) {
                $ligneCommandeMenu->setCommande(null);
            }
        }

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
            $ligneCommandeProduit->setCommande($this);
        }

        return $this;
    }

    public function removeLigneCommandeProduit(LigneCommandeProduit $ligneCommandeProduit): self
    {
        if ($this->ligneCommandeProduits->removeElement($ligneCommandeProduit)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommandeProduit->getCommande() === $this) {
                $ligneCommandeProduit->setCommande(null);
            }
        }

        return $this;
    }

    public function getUtilisateur(): ?utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
