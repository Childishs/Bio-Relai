<?php 

class  VentesDAO {

    /**
     * Permet de récupérer toutes les ventes 
     * 
     * @return VentesDTO[]|null - Array d'obket ventes ou null 
     */
    public static function getAll() : ?array {
        try {
            $req = DBConnex::getInstance()->prepare('SELECT * FROM VENTES');
            $req->execute();
            $all = $req->fetchAll(PDO::FETCH_CLASS, 'VentesDTO');
            return $all;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Permet de récupérer une vente avec son id
     * 
     * @param $id 
     * @return VentesDTO|null - objetdto ou nul 
     */
    public static function getOne(int $id) : ?VentesDTO{
        try {
            $req = DBConnex::getInstance()->prepare('SELECT * FROM VENTES WHERE idVente = ?');
            $req->execute(array($id));
            $req->setFetchMode(PDO::FETCH_CLASS, 'VentesDTO');
            $one = $req->fetch();
            return $one;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Permet de mettre à jour une vente dans la base de données 
     * 
     * @param VentesDTO $vente 
     * @return boolean 
     */
    public static function update(VentesDTO $vente) : bool {
        try {
            $req = DBConnex::getInstance()->prepare('UPDATE VENTES SET dateVente = ?, dateDebutProd = ?, dateFinProd = ?, dateFinCli = ?, EtatProd = ?, EtatAchat = ? WHERE idVente = ?');
            $req->execute(array($vente->getDateVente(), $vente->getDateDebutProd(), $vente->getDateFinProd(), $vente->getDateFinCli(), $vente->getEtatProd(), $vente->getEtatAchat(), $vente->getId()));
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Permet de créer une instance dans la base de donneés 
     * 
     * @param VentesDTO $vente 
     * @return boolean 
     */
    public static function create(VentesDTO $vente) : bool {
        try {
            $req = DBConnex::getInstance()->prepare('INSERT INTO VENTES (dateVente, dateDebutProd, dateFinProd, dateFinCli, EtatProd, EtatAchat) VALUES (?,?,?,?,?,?)');
            /*
            $vente->setDateVente($vente->getDateVente()->format('Y-m-d H:i:s'));
            $vente->setDateDebutProd($vente->getDateDebutProd()->format('Y-m-d H:i:s'));
            $vente->setDateFinProd($vente->getDateFinProd()->format('Y-m-d H:i:s'));
            $vente->setDateFinCli($vente->getDateFinCli()->format('Y-m-d H:i:s'));
            */
            $req->execute(array($vente->getDateVente(), $vente->getDateDebutProd(), $vente->getDateFinProd(), $vente->getDateFinCli(),$vente->getEtatProd(), $vente->getEtatAchat()));
            return true;
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Permet de supprimer une vente 
     * 
     * @param int $id 
     * @return bool 
     */
    public static function delete(int $id) : bool {
        try {
            $req = DBConnex::getInstance()->prepare('DELETE FROM VENTES WHERE idVente = ?');
            $req->execute(array($id));
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


}