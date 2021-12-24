<?php
//voir héritage possible avec fetch class
class ProducteursDTO extends UtilisateurDTO {

    private $idProudcteur;
    private $adresseProducteur;
    private $communeProducteur;
    private $codePostalProducteur;
    private $descriptifProducteur;
    private $photoProducteur;
    
    public function setPhotoProducteur($photoProducteur) {
        $this->photoProducteur = $photoProducteur;
    }

    public function getAdresseProducteur()
    {
        return $this->adresseProducteur;
    }

    public function getCodePostalProducteur()
    {
        return $this->codePostalProducteur;
    }

    public function getDescriptifProducteur()
    {
        return $this->descriptifProducteur;
    }

    public function getCommuneProducteur()
    {
        return $this->communeProducteur;
    }

    public function getIdProudcteur()
    {
        return $this->idProudcteur;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }


    public function getPhotoProducteur()
    {
        return $this->photoProducteur;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function getPrenomUtilisateur()
    {
        return $this->prenomUtilisateur;
    }

    public function setAdresseProducteur($adresseProducteur): void
    {
        $this->adresseProducteur = $adresseProducteur;
    }

    public function setCodePostalProducteur($codePostalProducteur): void
    {
        $this->codePostalProducteur = $codePostalProducteur;
    }

    public function setCommuneProducteur($communeProducteur): void
    {
        $this->communeProducteur = $communeProducteur;
    }

    public function setDescriptifProducteur($descriptifProducteur): void
    {
        $this->descriptifProducteur = $descriptifProducteur;
    }

    public function setIdProudcteur($idProudcteur): void
    {
        $this->idProudcteur = $idProudcteur;
    }


}

