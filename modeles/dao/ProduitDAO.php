<?php

class ProduitDAO{
    /**
     * @param string $idProduit
     * @return mixed|void
     */
    public function getOne(string $idProduit){
        try{
            $req = DBConnex::getInstance()->prepare("SELECT * FROM PRODUIT");
            $req->execute(array($idProduit));
            $req->setFetchMode(PDO::FETCH_CLASS, 'ProduitDTO');
            $produit = $req->fetch();
            return $produit;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }


    public static function getAll() : ?array {
        try {
            $req = DBConnex::getInstance()->prepare('SELECT * FROM PRODUIT');
            $req->execute();
            $all =$req->fetchAll(PDO::FETCH_CLASS, 'ProduitDTO');
            return $all;

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function creerProduit(ProduitDTO $newProduit)
    {
        try {
            $req = DBConnex::getInstance()->prepare('INSERT INTO PRODUIT (nomProduit,descriptionProduit,photoProduit,idCategorie,idUtilisateur,idProducteur) VALUES (?,?,?,?,?,?)');
            $req->execute(array($newProduit->getNomProduit(), $newProduit->getDescriptionProduit(), $newProduit->getPhotoProduit(), $newProduit->getIdProducteur()));
            if (empty($_SESSION['user'])) {
                $_SESSION['produit'] = ['nom' => $newProduit->getNomProduit(), 'description' => $newProduit->getNomProduit(), 'photo' => $newProduit->getPhotoProduit(), 'categorie' => $newProduit->getIdCategorie(), 'producteur' => $newProduit->getIdProducteur()];
            }
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function modifierProduit(ProduitDTO $produit){
        try {
            $req = DBConnex::getInstance()->prepare("UPDATE PRODUIT SET nomProduit = ?,descriptionProduit = ?,photoProduit = ?,idCategorie = ? WHERE idCategorie = ?");
            $req->execute(array($produit->getNomProduit(), $produit->getDescriptionProduit(), $produit->getPhotoProduit(), $produit->getIdCategorie(), $produit->getIdProduit()));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function supprimerProduit(ProduitDTO $produit){
        try{
            $req = DBConnex::getInstance()->prepare("DELETE FROM PRODUIT WHERE idProduit=?");
            $req->execute(array($produit->getIdProduit()));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}