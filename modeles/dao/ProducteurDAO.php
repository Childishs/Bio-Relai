<?php 

class ProducteurDAO {
    /**
     * 
     * TEMPO RECUP PRODUCTEURS 
     */
    public static function getOneProducteurs($token) {
        try {
            $req = DBConnex::getInstance()->prepare('SELECT * FROM PRODUCTEURS INNER JOIN UTILISATEURS ON PRODUCTEURS.idUtilisateur = UTILISATEURS.idUtilisateur WHERE token = ?');
            $req->execute(array($token));
            $req->setFetchMode(PDO::FETCH_CLASS, 'ProducteursDTO');
            $user = $req->fetch();        
            return $user;
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * temp prod 
     */
    public static function getAllProducteurs() {
        try {
            $req = DBConnex::getInstance()->prepare('SELECT * FROM PRODUCTEURS INNER JOIN UTILISATEURS ON PRODUCTEURS.idUtilisateur = UTILISATEURS.idUtilisateur WHERE UTILISATEURS.statut = "producteurs"');
            $req->execute(array());
            $user = $req->fetchAll(PDO::FETCH_CLASS, 'ProducteursDTO');
            
            // DTO User pour info 


            return $user;
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

     /**
     * Fonction permettant de mettre à jour dans la base de données les données d'un producteur
     * 
     * @param ProducteursDTO $user - Utilisateur près à l'envoie
     * @return bool - True|False selon output 
     */
    public static function update(ProducteursDTO $user, $id) : bool {
        try {
                if($user->getPhotoProducteur() === null) {
                    $req = DBConnex::getInstance()->prepare('UPDATE PRODUCTEURS SET adresseProducteur = ?, communeProducteur = ?, codePostalProducteur = ?, descriptifProducteur = ?  WHERE idUtilisateur = ?');
                    $req->execute(array($user->getAdresseProducteur(), $user->getCommuneProducteur(), $user->getCodePostalProducteur(), $user->getDescriptifProducteur(), $id)); 
                } else {
                    $req = DBConnex::getInstance()->prepare('UPDATE PRODUCTEURS SET adresseProducteur = ?, communeProducteur = ?, codePostalProducteur = ?, descriptifProducteur = ?, photoProducteur = ?  WHERE idUtilisateur = ?');
                $req->execute(array($user->getAdresseProducteur(), $user->getCommuneProducteur(), $user->getCodePostalProducteur(), $user->getDescriptifProducteur(), $user->getPhotoProducteur(), $id)); 
                }
                
            return true;
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

        /**
        * Permet d'inscrire en BDD un producteur en se basant sur un id user 
        * 
        * @param UtilisateurDTO
        * @return bool -> true si ajout / false si erreur
        */
       public static function inscription(ProducteursDTO $user, $id) : void {
           try {
               $req = DBConnex::getInstance()->prepare("INSERT INTO PRODUCTEURS (idUtilisateur,adresseProducteur,communeProducteur,	codePostalProducteur,descriptifProducteur,photoProducteur) VALUES (?,?,?,?,?,?)");
               $req->execute(array($id, $user->getAdresseProducteur(), $user->getCommuneProducteur(), $user->getCodePostalProducteur(), $user->getDescriptifProducteur(), $user->getPhotoProducteur()));
           } catch(Exception $e) {
               die($e->getMessage());
           }
       }
}