<?php

class ProduitDTO{
    private $idProduit;
    private $nomProduit;
    private $descriptionProduit;
    private $photoProduit;
    private $idCategorie;
    private $idUtilisateur;
    private $dateVente;
    private $prix;
    private $quantite;

   /* public function __construct($idProduit, $idVente, $prix, $unite, $quantite){
        $this->idProduit = $idProduit;
        $this->idVente = $idVente;
        $this->prix =$prix;
        $this->unite=$unite;
        $this->quantite=$quantite;
    }
*/

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function setQuantite($quantite): void
    {
        $this->quantite = $quantite;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix): void
    {
        $this->prix = $prix;
    }

    public function getDateVente()
    {
        return $this->dateVente;
    }

    public function setIdUtilisateur($data) {
        $this->idUtilisateur = $data;
    }


    public function setDateVente($dateVente): void
    {
        $this->dateVente = $dateVente;
    }

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }


    public function getDescriptionProduit()
    {
        return $this->descriptionProduit;
    }

    public function setDescriptionProduit($descriptionProduit): void
    {
        $this->descriptionProduit = $descriptionProduit;
    }

    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    public function setNomProduit($nomProduit): void
    {
        $this->nomProduit = $nomProduit;
    }

    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    public function getPhotoProduit()
    {
        return $this->photoProduit;
    }

    public function setPhotoProduit($photoProduit): void
    {
        $this->photoProduit = $photoProduit;
    }

    public function setIdCategorie($idCategorie): void
    {
        $this->idCategorie = $idCategorie;
    }

    public function getIdProduit()
    {
        return $this->idProduit;
    }

    public function setIdProduit($idProduit): void
    {
        $this->idProduit = $idProduit;
    }

    



}