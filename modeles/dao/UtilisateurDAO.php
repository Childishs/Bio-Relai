<?php 
require_once('DBConnex.php');

/*
Utilisateur DAO : 
    - Requête SQL avec la table UTILISATEURS
    - OCCUPATION : Connexion
    - OCCUPATION : CRUD 
*/
 
class UtilisateurDAO {


    /**
     * Permet de vérifier que l'utilisateur a un compte et qu'il peut donc se connecter
     * V1 -> Aucune sécurité de connexion (verification dans le MDP -> Envoie brute)
     * 
     * @return UtilisateurDTO|null 
     */
    public static function verifConnexion(string $email, string $mdp) : ?UtilisateurDTO {
        // Changement requête 
        $req = DBConnex::getInstance()->prepare("SELECT * FROM UTILISATEURS WHERE mail = ? AND mdp = ? ");
        $req->execute(array($email, $mdp));
        $req->setFetchMode(\PDO::FETCH_CLASS, get_class(new UtilisateurDTO));
        $un = $req->fetch(\PDO::FETCH_CLASS);
        var_dump($un);
        return $un;
    }

    /**
     * Fonction permettant de s'inscrire -> Ajout en BDD d'un utilisateur 
     * 
     * @param UtisateurDTO
     * @return bool -> true si ajout / false si erreur
     */
    public function inscription(UtilisateurDTO $user) : bool {
        // Création d'un utilisateur dans db 

        // On commence par vérifier si l'utilisateur n'est pas déjà dans la bdd 
        $req = DBConnex::getInstance()->prepare("SELECT mail FROM UTILISATEURS where mail = ?");
        $req->execute(array($user->getMail()));
        $req->fetchAll();
        if($req->rowCount() != 0) {
            return false;
        } 
        // Sinon, on ajoute 
        // On commence par hasher le mdp pcq on est des bogoss de la sécu 
        $mdp = password_hash($user->mdp, PASSWORD_DEFAULT);
        // Envoie db 
        try {
            // A terminer
            $req = DBConnex::getInstance()->PREPARE("INSERT INTO UTILISATEURS values ?,?,?,?,?,?,?");
            $req->execute(array($user->getNomUtilisateur(), $user->get ));

            return true;

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Fonction permettant de récupérer tous les utilisateurs par statut
     * 
     * @param $statut le statut de la DB 
     * @return UtilisateurDto[]|null Selon la reception, un tableau d'objet ou null si vide 
     */
    public function getAllByStatut(string $statut) : ?array {
        $req = DBConnex::getInstance()->prepare('SELECT * FROM UTILISATEURS WHERE statut = ?');
        $req->execute(array($statut));
        $tous = $req->fetchAll(\PDO::FETCH_CLASS, get_class(new UtilisateurDTO));
        return $tous;
    }







}