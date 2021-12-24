<?php

/*
 * créer/modif/supprimer produit pour une vente
 *
 */

class ProduitDAO{


    public static function getOne(string $idProduit){
        try{
            $req = DBConnex::getInstance()->prepare("SELECT * FROM PRODUITS WHERE idProduit = ?");
            $req->execute(array($idProduit));
            $req->setFetchMode(PDO::FETCH_CLASS, 'ProduitDTO');
            $produit = $req->fetch();
            return $produit;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }


    public static function getAll($idUtilisateur) : ?array {
        try {
            $req = DBConnex::getInstance()->prepare('SELECT * FROM PRODUITS WHERE idUtilisateur = ?');
            $req->execute(array($idUtilisateur));
            $all =$req->fetchAll(PDO::FETCH_CLASS, 'ProduitDTO');
            return $all;

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public static function creerProduit(ProduitDTO $newProduit)
    {
        try {
            $req = DBConnex::getInstance()->prepare('INSERT INTO PRODUITS (nomProduit,descriptionProduit,photoProduit,idCategorie,idUtilisateur) VALUES (?,?,?,?,?)');
            $req->execute(array($newProduit->getNomProduit(), $newProduit->getDescriptionProduit(), $newProduit->getPhotoProduit(), $newProduit->getIdCategorie(), $newProduit->getIdUtilisateur()));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public static function modifierProduit(ProduitDTO $produit){
        try {
            if($produit->getPhotoProduit() != null) {
                $req = DBConnex::getInstance()->prepare("UPDATE PRODUITS SET nomProduit = ?,descriptionProduit = ?,photoProduit = ?,idCategorie = ? WHERE idProduit = ?");
                $req->execute(array($produit->getNomProduit(), $produit->getDescriptionProduit(), $produit->getPhotoProduit(), $produit->getIdCategorie(), $produit->getIdProduit()));
            } else {
                $req = DBConnex::getInstance()->prepare("UPDATE PRODUITS SET nomProduit = ?,descriptionProduit = ?,idCategorie = ? WHERE idProduit = ?");
                $req->execute(array($produit->getNomProduit(), $produit->getDescriptionProduit(), $produit->getIdCategorie(), $produit->getIdProduit()));
            }
           
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public static function supprimerProduit($idProduit){
        try{
            $req = DBConnex::getInstance()->prepare("DELETE FROM PRODUITS WHERE idProduit=?");
            $req->execute(array($idProduit));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }




    //proposer à la vente
    public static function creerProduitVente(ProduitDTO $produit, $idVente){
        try{
            $req= DBConnex::getInstance()->prepare("INSERT INTO PROPOSER (idVente,idProduit,quantite,prix) VALUES (?,?,?,?)");
            $req->execute(array($idVente,$produit->getIdProduit(),$produit->getQuantite(),$produit->getPrix()));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }


    //modifier produit à la vente
    public static function modifProduitVente(ProduitDTO $produit, $idVente){
        try{
            $req= DBConnex::getInstance()->prepare("UPDATE PROPOSER SET quantite = ?,prix = ? WHERE idProduit = ? AND idVente = ?");
            $req->execute(array($produit->getQuantite(), $produit->getPrix(), $produit->getIdProduit(),$idVente));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public static function suppProduitVente($idVente, $idProduit){
        try{
            $req = DBConnex::getInstance()->prepare("DELETE FROM PROPOSER WHERE idProduit=? and idVente=?");
            $req->execute(array($idProduit,$idVente));
            return true;

        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public static function getOneVente($idVente, $idProduit){
        try{
            $req = DBConnex::getInstance()->prepare("SELECT * FROM PROPOSER WHERE idVente= ? AND idProduit = ?");
            $req->execute(array($idVente, $idProduit));
            $req->setFetchMode(PDO::FETCH_CLASS, 'ProduitDTO');
            $produit = $req->fetch();
            $_SESSION['idVente'] = $idVente;
            return $produit;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public static function getAllVente($idProducteur) {
        try {
            // Partie produit
            $req = DBConnex::getInstance()->prepare("SELECT * FROM PROPOSER INNER JOIN PRODUITS AS P ON PROPOSER.idProduit = P.idProduit INNER JOIN UTILISATEURS AS U ON U.idUtilisateur = P.idUtilisateur where P.idUtilisateur = ?");
            $req->execute(array($idProducteur));
            $produit = $req->fetchAll();
            return $produit;
        }
        catch(Exception $e) {
            die($e->getMessage());
        }
    }



}