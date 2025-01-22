<?php

namespace App\Entity;

use App\Repository\DetailcommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailcommandeRepository::class)]
class Detailcommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, produit>
     */
    #[ORM\ManyToMany(targetEntity: produit::class, inversedBy: 'detailcommandes')]
    private Collection $produit_id;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'detailcommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?commande $commande_id = null;


    public function __construct()
    {
        $this->produit_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, produit>
     */
    public function getProduitId(): Collection
    {
        return $this->produit_id;
    }

    public function addProduitId(produit $produitId): static
    {
        if (!$this->produit_id->contains($produitId)) {
            $this->produit_id->add($produitId);
        }

        return $this;
    }

    public function removeProduitId(produit $produitId): static
    {
        $this->produit_id->removeElement($produitId);

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getCommandeId(): ?commande
    {
        return $this->commande_id;
    }

    public function setCommandeId(?commande $commande_id): static
    {
        $this->commande_id = $commande_id;

        return $this;
    }
}
