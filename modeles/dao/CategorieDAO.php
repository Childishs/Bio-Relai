<?php 

class CategorieDAO {

/**
     * Permet de récupérer une cat avec son id
     * 
     * @param int $id - id pour troouver une catégorie 
     * @return CategorieDTO|null - S'il trouve la cat ou non
     */
    public static function getOne(int $id) : ?CategorieDTO {
        try {
            $req = DBConnex::getInstance()->prepare('SELECT * FROM CATEGORIES WHERE idCategorie = ?');
            $req->execute(array($id));
            $req->setFetchMode(PDO::FETCH_CLASS, 'CategorieDTO');
            $cat = $req->fetch();
            return $cat;
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Permet de récupérer toutes les catégories 
     * 
     * @return CategorieDTO[]|null - Array d'objet ou null s'il n'y a rien
     */
    public static function getAll() : ?array {
        try {
            $req = DBConnex::getInstance()->prepare('SELECT * FROM CATEGORIES');
            $req->execute();
            $all =$req->fetchAll(PDO::FETCH_CLASS, 'CategorieDTO');
            return $all;

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }


}
