<?php 

class VentesDTO {

    private  $idVente;
    private  $dateVente;
    private  $dateDebutProd;
    private  $dateFinProd;
    private  $dateFinCli;

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