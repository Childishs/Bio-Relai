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
            $req = DBConnex::getInstance()->prepare('INSERT INTO PRODUITS (nomProduit,descriptionProduit,photoProduit,idCategorie,idUtilisateur,idProducteur) VALUES (?,?,?,?,?,?)');
            $req->execute(array($newProduit->getNomProduit(), $newProduit->getDescriptionProduit(), $newProduit->getPhotoProduit(), $newProduit->getIdProducteur()));
            if (empty($_SESSION['user'])) {
                $_SESSION['produit'] = ['nom' => $newProduit->getNomProduit(), 'description' => $newProduit->getNomProduit(), 'photo' => $newProduit->getPhotoProduit(), 'categorie' => $newProduit->getIdCategorie(), 'producteur' => $newProduit->getIdProducteur()];
            }
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public static function modifierProduit(ProduitDTO $produit){
        try {
            $req = DBConnex::getInstance()->prepare("UPDATE PRODUITS SET nomProduit = ?,descriptionProduit = ?,photoProduit = ?,idCategorie = ? WHERE idProduit = ?");
            $req->execute(array($produit->getNomProduit(), $produit->getDescriptionProduit(), $produit->getPhotoProduit(), $produit->getIdCategorie(), $produit->getIdProduit()));
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
    public static function creerProduitVente(ProduitDTO $produit, $idVente,$unite,$quantite,$prix){
        try{
            $req= DBConnex::getInstance()->prepare ("INSERT INTO PROPOSER (idVente,idProduit,unite,quantite,prix) VALUES (?,?,?,?)");
            $req->execute(array($idVente,$produit->getIdProduit(),$unite,$quantite,$prix));
            $req->setFetchMode(PDO::FETCH_CLASS, 'ProduitDTO');
            $produit = $req->fetch();
            return $produit;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }


    //modifier produit à la vente
    public static function modifProduitVente(ProduitDTO $produit, $idVente,$unite,$quantite,$prix){
        try{
            $req= DBConnex::getInstance()->prepare ("INSERT INTO PROPOSER (idVente,idProduit,unite,quantite,prix) VALUES (?,?,?,?)");
            $req->execute(array($produit->getIdProduit(),$idVente, $unite, $quantite, $prix));
            $req->setFetchMode(PDO::FETCH_CLASS, 'ProduitDTO');
            $produit = $req->fetch();
            return $produit;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public static function suppProduitVente(ProduitDTO $produit, $idVente){
        try{
            $req = DBConnex::getInstance()->prepare("DELETE FROM PROPOSER WHERE idProduit=? and idVente=?");
            $req->execute(array($produit->getIdProduit(),$idVente));
            return true;

        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public static function getOneVente($idVente){
        try{
            $req = DBConnex::getInstance()->prepare("SELECT * FROM PROPOSER WHERE idVente= ?");
            $req->execute(array($idProduit));
            $req->setFetchMode(PDO::FETCH_CLASS, 'ProduitDTO');
            $produit = $req->fetch();
            return $produit;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }


}