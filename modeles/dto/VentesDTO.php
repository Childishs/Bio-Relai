<?php 

class VentesDTO {

    private int $idVente;
    private DateTime $dateVente;
    private DateTime $dateDebutProd;
    private DateTime $dateFinProd;
    private DateTime $dateFinCli;

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