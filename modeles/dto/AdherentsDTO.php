<?php

class AdherentsDTO extends UtilisateurDTO{
    use Hydrate;
    private $idUtilisateur;
    private $idAdherent;
    private $mail;
    private $mdp;
    private $statut;
    private $nomUtilisateur;
    private $prenomUtilisateur;


    public function getIdUtilisateur(){
        return $this->idUtilisateur;
    }
    public function setIdUtilisateur($newIdUtilisateur){
        $this->idUtilisateur=$newIdUtilisateur;
    }

    public function getIdAdherent(){
        return $this->idAdherent;
    }
    public function setIdAdherent($newIdAdherent){
        $this->idAdherent=$newIdAdherent;
    }

    public function getMail(){
        return $this->mail;
    }
    public function setMail($newMail){
        $this->mail=$newMail;
    }

    public function getMdp(){
        return $this->mdp;
    }
    public function setMdp($newMdp){
        $this->mdp=$newMdp;
    }

    public function getStatut(){
        return $this->statut;
    }
    public function setStatut($newStatut){
        $this->statut=$newStatut;
    }

    public function getNomUtilisateur(){
        return $this->nomUtilisateur;
    }
    public function setNomUtilisateur($newNomUtilisateur){
        $this->nomUtilisateur=$newNomUtilisateur;
    }

    public function getPrenomUtilisateur(){
        return $this->prenomUtilisateur;
    }
    public function setPrenomUtilisateur($newPrenomUtilisateur){
        $this->prenomUtilisateur=$newPrenomUtilisateur;
    }



}
