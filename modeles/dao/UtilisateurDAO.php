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
    public static function connexion(string $login, string $mdp)
    {

        $query = DBConnex::getInstance()->prepare("SELECT * FROM UTILISATEURS WHERE mail = ?");
        $query->execute(array($login));
        $query->setFetchMode(PDO::FETCH_CLASS, 'UtilisateurDTO');
        $utilisateur = $query->fetch();
        if (!$utilisateur->getMail()) {
            $_SESSION['error'] = "Erreur d'identification";
            die();

        } else {
            // vérification du password

            if (password_verify($mdp, $utilisateur->getMdp())) {
                $_SESSION['user'] = ['token' => $utilisateur->getToken(), 'nom' => $utilisateur->getNomUtilisateur(), 'prenom' => $utilisateur->getPrenomUtilisateur(), 'statut' => $utilisateur->getStatut(), 'email' => $utilisateur->getMail()];
                $_SESSION['AGENT'] = $_SERVER['HTTP_USER_AGENT'];
                $_SESSION['TOKEN'] = $utilisateur->getToken();

                return $utilisateur;
            }
            else{
                $_SESSION['error'] = "Erreur d'identification";
            }
        }
    }

    /**
     * Fonction permettant de s'inscrire -> Ajout en BDD d'un utilisateur 
     * 
     * @param UtilisateurDTO
     * @return bool -> true si ajout / false si erreur
     */
    public static function inscription(UtilisateurDTO $user) : void {
        // Création d'un utilisateur dans db 
        // On commence par vérifier si l'utilisateur n'est pas déjà dans la bdd
        $req = DBConnex::getInstance()->prepare("SELECT mail FROM UTILISATEURS where mail = ?");
        $req->execute(array($user->getMail()));
        $req->fetch();
        if($req->rowCount() != 0) {
            $_SESSION['error'] = "Problème d'inscription!";
        }
        // Sinon, on ajoute 
        // On commence par hasher le mdp pcq on est des bogoss de la sécu 
        $mdp = password_hash($user->getMdp(), PASSWORD_DEFAULT);

        // Création du token aléatoire 
        $token = strval(openssl_random_pseudo_bytes(25));
        $token = hash('SHA256', $token);

        // Envoie db 
        try {
            // A terminer
            $req = DBConnex::getInstance()->prepare("INSERT INTO UTILISATEURS (mail,mdp,statut,nomUtilisateur,prenomUtilisateur,token) VALUES (?,?,?,?,?,?)");
            $req->execute(array($user->getMail(), $mdp, $user->getStatut(), $user->getNomUtilisateur(), $user->getPrenomUtilisateur(), $token));

            if(empty($_SESSION['user'])) {
                $_SESSION['user'] = ['token' => $token, 'nom' => $user->getNomUtilisateur(), 'prenom' => $user->getPrenomUtilisateur(), 'statut' => $user->getStatut(), 'email' => $user->getMail()];
            }


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
    public static function getAllByStatut(string $statut) : ?array {
        $req = DBConnex::getInstance()->prepare('SELECT * FROM UTILISATEURS WHERE statut = ?');
        $req->execute(array($statut));
        $tous = $req->fetchAll(PDO::FETCH_CLASS, 'UtilisateurDTO');
        return $tous;
    }


    /**
     * Fonction permettant de mettre à jour dans la base de données les données d'un utilisateur
     * 
     * @param UtilisateurDTO $user - Utilisateur près à l'envoie
     * @return bool - True|False selon output 
     */
    public static function update(UtilisateurDTO $user) : bool {
        try {
            // On Hash le mdp seulement si l'utilisateur le change, on va pas hasher du déjà hashé 
            if($user->getMdp() != null) {
                $mdp = $user->getMdp();
                if(strlen($mdp) < 30) {
                    $mdp = password_hash($mdp, PASSWORD_DEFAULT);
                    
                }
                $req = DBConnex::getInstance()->prepare('UPDATE UTILISATEURS SET nomUtilisateur = ?, prenomUtilisateur = ?, mail = ?, mdp = ? WHERE token = ?');
                $req->execute(array($user->getNomUtilisateur(), $user->getPrenomUtilisateur(), $user->getMail(), $mdp, $user->getToken()));
            } else {
                /// Si on update sans mdp (ex changement prod ou autre)
                $req = DBConnex::getInstance()->prepare('UPDATE UTILISATEURS SET nomUtilisateur = ?, prenomUtilisateur = ?, mail = ? WHERE token = ?');
                $req->execute(array($user->getNomUtilisateur(), $user->getPrenomUtilisateur(), $user->getMail(), $user->getToken())); 
            }
        
            return true;

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Permet de récupérer un utilisateur avec son token
     * 
     * @param string $token - Token d'identification
     * @return UtilisateurDTO|null - S'il trouve l'user ou non
     */
    public static function getOne(string $token) : ?UtilisateurDTO {
        try {
            $req = DBConnex::getInstance()->prepare('SELECT * FROM UTILISATEURS WHERE token = ?');
            $req->execute(array($token));
            $req->setFetchMode(PDO::FETCH_CLASS, 'UtilisateurDTO');
            $user = $req->fetch();
            return $user;
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }


    /**
     * Permet de supprimer un utilisateur 
     * 
     * @param int $token - Identification de l'utilsiateur 
     * @return bool 
     */
    public static function delete(string $token) : bool {
        try {
            $req = DBConnex::getInstance()->prepare('DELETE FROM UTILISATEURS WHERE token = ?');
            $req->execute(array($token));
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




}