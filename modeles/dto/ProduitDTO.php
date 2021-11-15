<?php

class ProduitDTO{
    private $idProduit;
    private $nomProduit;
    private $descriptionProduit;
    private $photoProduit;
    private $idCategorie;
    private $idUtilisateur;
    private $idProducteur;


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

    public function getIdProducteur()
    {
        return $this->idProducteur;
    }

}