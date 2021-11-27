<?php 

class VentesDTO {

    private  $idVente;
    private  $dateVente;
    private  $dateDebutProd;
    private  $dateFinProd;
    private  $dateFinCli;
    private  $EtatProd;
    private  $EtatAchat;

    public function getEtatProd() {
        return $this->EtatProd;
    }

    public function getEtatAchat() {
        return $this->EtatAchat;
    }

    public function setEtatProd($data) {
        $this->EtatProd = $data;
    }

    public function setEtatAchat($data) {
        $this->EtatAchat = $data;
    }

    public function setId($data){
        $this->idVente = $data;
    }

    public function setDateVente($data){
        $this->dateVente = $data;
    }

    public function setDateDebutProd($data){
        $this->dateDebutProd = $data;
    }

    public function setDateFinProd($data){
        $this->dateFinProd = $data;
    }

    public function setDateFinCli($data) {
        $this->dateFinCli = $data;
    }

    public function getId() {
        return $this->idVente;
    }

    public function getDateVente() {
        return $this->dateVente;
    }

    public function getDateDebutProd() {
        return $this->dateDebutProd;
    }

    public function getDateFinProd() {
        return $this->dateFinProd;
    }

    public function getDateFinCli() {
        return $this->dateFinCli;
    }

}