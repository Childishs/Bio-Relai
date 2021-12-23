<?php

class CommandeDAO{

    public static function getOneProducteurCommande(string $idVente, string $idProducteur){
        try{
            $req = DBConnex::getInstance()->prepare("SELECT * FROM COMMANDES AS C NATURAL JOIN PROPOSER AS P NATURAL JOIN PRODUITS AS PR WHERE C.idVente = ? and PR.idUtilisateur=?");
            $req->execute(array($idVente,$idProducteur));
            $req->setFetchMode(PDO::FETCH_CLASS, 'CommandeDTO');
            $commande = $req->fetch();
            return $commande;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public static function getAllProducteurCommande($idProducteur)
    {
        try{
            $req = DBConnex::getInstance()->prepare("SELECT C.* FROM COMMANDES AS C NATURAL JOIN PROPOSER AS P NATURAL JOIN PRODUITS AS PR WHERE PR.IdUtilisateur = ? ");
            $req->execute(array($idProducteur));
            $all =$req->fetchAll(PDO::FETCH_CLASS, 'CommandeDTO');
            return $all;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public static function getAllProducteurAVenir($idProducteur){
        try{
            $req = DBConnex::getInstance()->prepare("SELECT C.* FROM COMMANDES AS C NATURAL JOIN PROPOSER AS P NATURAL JOIN PRODUITS AS PR WHERE PR.IdUtilisateur = ? AND idVente=(SELECT MAX(idVente) FROM PROPOSER)");
            $req->execute(array($idProducteur));
            $req->setFetchMode(PDO::FETCH_CLASS, 'CommandeDTO');
            $all =$req->fetchAll(PDO::FETCH_CLASS, 'CommandeDTO');
            return $all;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public static function getOneProducteurPassee(string $idVente, string $idProducteur){
        try{
            $req = DBConnex::getInstance()->prepare("SELECT C.* FROM COMMANDES AS C NATURAL JOIN PROPOSER AS P NATURAL JOIN PRODUITS AS PR WHERE C.idVente = ? and PR.idUtilisateur=? AND dateCommande = ()");
            $req->execute(array($idVente,$idProducteur));
            $req->setFetchMode(PDO::FETCH_CLASS, 'ProduitDTO');
            $produit = $req->fetch();
            return $produit;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public static function getAllProducteurPassee($idProducteur){
        try{
            $req = DBConnex::getInstance()->prepare("SELECT C.* FROM COMMANDES AS C NATURAL JOIN PROPOSER AS P NATURAL JOIN PRODUITS AS PR WHERE PR.IdUtilisateur = ? ");
            $req->execute(array($idProducteur));
            $all =$req->fetchAll(PDO::FETCH_CLASS, 'CommandeDTO');
            return $all;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }



}