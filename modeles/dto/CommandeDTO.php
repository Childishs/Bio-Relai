<?php

class CommandeDTO{
    private $idCommande;
    private $dateCommande;
    private $idUtilisateur;
    private $idAdherent;
    private $idVente;
    private $idProduit;
    private $quantité;

    public function setIdCommande($idCommande): void
    {
        $this->idCommande = $idCommande;
    }

    public function getIdCommande()
    {
        return $this->idCommande;
    }

    public function setDateCommande($dateCommande): void
    {
        $this->dateCommande = $dateCommande;
    }

    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    public function setIdUtilisateur($idUtilisateur): void
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function getIdAdherent()
    {
        return $this->idAdherent;
    }

    public function setIdAdherent($idAdherent): void
    {
        $this->idAdherent = $idAdherent;
    }

    public function setIdVente($idVente): void
    {
        $this->idVente = $idVente;
    }

    public function getIdVente()
    {
        return $this->idVente;
    }

    public function setIdProduit($idProduit): void
    {
        $this->idProduit = $idProduit;
    }

    public function getIdProduit()
    {
        return $this->idProduit;
    }

    public function getQuantité()
    {
        return $this->quantité;
    }

    public function setQuantité($quantité): void
    {
        $this->quantité = $quantité;
    }

}
