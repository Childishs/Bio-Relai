<?php

class FacturesDTO{
    private $idVente;
    private $idCommande;
    private $idUtilisateur;
    private $idProducteur;
    private $dateCommande;
    private $idProduit;
    private $quantite;

    public function getIdVente()
    {
        return $this->idVente;
    }

    public function setIdVente($idVente): void
    {
        $this->idVente = $idVente;
    }

    public function getIdCommande()
    {
        return $this->idCommande;
    }

    public function setIdCommande($idCommande): void
    {
        $this->idCommande = $idCommande;
    }


    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur($idUtilisateur): void
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function getIdProducteur()
    {
        return $this->idProducteur;
    }

    public function setIdProducteur($idProducteur): void
    {
        $this->idProducteur = $idProducteur;
    }

    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    public function setDateCommande($dateCommande): void
    {
        $this->dateCommande = $dateCommande;
    }

    public function getIdProduit()
    {
        return $this->idProduit;
    }

    public function setIdProduit($idProduit): void
    {
        $this->idProduit = $idProduit;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function setQuantite($quantite): void
    {
        $this->quantite = $quantite;
    }
}