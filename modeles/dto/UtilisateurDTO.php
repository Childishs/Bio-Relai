<?php 

/*
UtilisateurDTO : 
    - Infos BDD
    - Accesseurs principaux 
*/

class UtilisateurDTO {

    protected  $idUtilisateur;
    protected  $mail;
    protected  $mdp;
    protected  $statut;
    protected  $nomUtilisateur;
    protected  $prenomUtilisateur;
    protected  $token;

    // Accesseurs 

    public function getId() {
        return $this->idUtilisateur;
    }

    public function setId(int $id) {
        $this->idUtilisateur = $id;
    }

    public function getMail() {
        return $this->mail;
    }

    public function setmail(string $mail) {
        $this->mail = $mail;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function setMdp(string $mdp) {
        $this->mdp = $mdp;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function setStatut(string $statut) {
        $this->statut = $statut;
    }

    public function getNomUtilisateur() {
        return $this->nomUtilisateur;
    }

    public function setNomUtilisateur(string $nom) {
        $this->nomUtilisateur = $nom;
    }

    public function getPrenomUtilisateur() {
        return $this->prenomUtilisateur;
    }

    public function setPrenomUtilisateur(string $prenom) {
        $this->prenomUtilisateur = $prenom;
    }

    public function getToken() {
        return $this->token;
    }

    public function setToken(string $token) {
        $this->token = $token;
    }

}