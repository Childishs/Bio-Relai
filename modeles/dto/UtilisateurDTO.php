<?php 

/*
UtilisateurDTO : 
    - Infos BDD
    - Accesseurs principaux 
*/

class UtilisateurDTO {

    private int $idUtilisateur;
    private string $mail;
    private string $mdp;
    private string $statut;
    private string $nomUtilisateur;
    private string $prenomutilisateur;
    private string $token;

    // Accesseurs 

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
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
        return $this->nom;
    }

    public function getPrenomUtilisateur() {
        return $this->prenomutilisateur;
    }

    public function setPrenomUtilisateur(string $prenom) {
        $this->prenomutilisateur = $prenom;
    }

    public function getToken() {
        return $this->token;
    }

    public function setToken(string $token) {
        $this->token = $token;
    }

}