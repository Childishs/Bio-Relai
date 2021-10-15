<?php 

/*
Utilisateur DAO : 
    - Requête SQL avec la table UTILISATEURS
    - OCCUPATION : Connexion
    - OCCUPATION : CRUD 
*/
 
class UtilisateurDAO {

     /**
     * Permet de vérifier que l'utilisateur a un compte et qu'il peut donc se connecter
     * 
     * 
     * @param string $email
     * @param string $mdp
     * @return UtilisateurDTO|null 
     */
    public static function connexion(string $login, string $mdp) : UtilisateurDTO {

        $query =  DBConnex::getInstance()->prepare("SELECT * FROM UTILISATEURS WHERE mail = ?");
        $query->execute(array($login, $mdp));
        $query->setFetchMode(PDO::FETCH_CLASS, 'UtilisateurDTO');
        $utilisateur = $query->fetch();

        if(!is_callable($utilisateur->getIdUtilisateur())) {
            $_SESSION['error'] = "Erreur d'identification";
            die();

        } else {
            // vérification du password 
            if(password_verify($mdp, $utilisateur->getPassword())) {
                $_SESSION['user'] = ['token' => $utilisateur->getToken(), 'nom' => $utilisateur->getNomUtilisateur(), 'prenom' => $utilisateur->getPrenomUtilisateur(), 'statut' => $utilisateur->getStatut()];
                return $utilisateur;
            }
        }
    }

    /**
     * Fonction permettant de s'inscrire -> Ajout en BDD d'un utilisateur 
     * 
     * @param UtisateurDTO
     * @return bool -> true si ajout / false si erreur
     */
    public static function inscription(UtilisateurDTO $user) : void {
        // Création d'un utilisateur dans db 

        // On commence par vérifier si l'utilisateur n'est pas déjà dans la bdd 
        $req = DBConnex::getInstance()->prepare("SELECT mail FROM UTILISATEURS where mail = ?");
        $req->execute(array($user->getMail()));
        $req->fetch();
        if($req->rowCount() != 0) {
            $_SESSION['error'] = "Problème de connexion";
            dispatcher::dispatch($_SESSION['controleurN1'] = "inscription");
        } 
        // Sinon, on ajoute 
        // On commence par hasher le mdp pcq on est des bogoss de la sécu 
        $mdp = password_hash($user->getMdp(), PASSWORD_DEFAULT);


        // Création du token aléatoire 
        $token = openssl_random_pseudo_bytes(25) + random_bytes(7) + openssl_random_pseudo_bytes(18);
        $token = hash('SHA256', $token);

        // Envoie db 
        try {
            // A terminer
            $req = DBConnex::getInstance()->PREPARE("INSERT INTO UTILISATEURS values ?,?,?,?,?,?");
            $req->execute(array($user->getMail(), $mdp, $user->getStatut(), $user->getNomUtilisateur(), $user->getPrenomUtilisateur(), $token));
            $_SESSION['user'] = ['token' => $token, 'nom' => $user->getNomUtilisateur(), 'prenom' => $user->getPrenomUtilisateur(), 'statut' => $user->getStatut()];

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