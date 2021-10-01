<?php 

/*
Utilisateur DAO : 
    - Requête SQL avec la table UTILISATEURS
    - OCCUPATION : Connexion
    - OCCUPATION : CRUD 
*/

class UtilisateurDAO {

    private PDO $db;
    private string $mail;
    private string $mdp;
    private int $id;

    public function __construct(int $id = null, string $mail, string $mdp) {
        $this->db = Db::CONNECT();
        $this->id = $id;
        $this->mail = $mail;
        $this->mdp = $mdp;
    }

    /**
     * Permet de vérifier que l'utilisateur a un compte et qu'il peut donc se connecter
     * V1 -> Aucune sécurité de connexion (verification dans le MDP -> Envoie brute)
     * 
     * @return UtilisateurDTO|null 
     */
    public static function verifConnexion() : ?UtilisateurDTO {
        $req = SELF::$db->prepare("SELECT * FROM Utilisateurs WHERE mail = ? AND mdp = ? ");
        $req->execute(array(SELF::$mail, SELF::$mdp));

        $req->setFetchMode(\PDO::FETCH_CLASS, "UtilisateurDTO");
        $un = $req->fetch(\PDO::FETCH_CLASS);
        return $un;
    }




}