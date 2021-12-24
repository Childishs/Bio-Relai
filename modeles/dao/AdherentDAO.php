<?php

/*
 * AdherentDAO :
 * - récupérer un adhérent
 * - récpérer tous les adhérents
 * - supprimer compte
 * - modifier adhérent
 */


class AdherentDAO {

    /*
     * return un array d'utilisateursDTO
     */
    public static function getAllAdherent() : Array{

        $requeteSql = "Select idUtilisateur, idAdherent , mail, mdp , statut, nomUtilisateur, prenomUtilisateur from ADHERENTS ";
        $reqPrepa = DBConnex::getInstance()->prepare($requeteSql);
        $reqPrepa->execute();

        $lesAdherents = $reqPrepa->fetchAll(PDO::FETCH_ASSOC);
        $listeAdherents =[];
        if(!empty($lesAdherents)){
        foreach ($lesAdherents as $unAdherentEnregistre) {
          $unAdherent = new AdherentDto();
          $unAdherent->hydrate($unAdherentEnregistre);
          $listeAdherents[] = $unAdherent;

        }
      }
      return $listeAdherents;

    }




    /* @param string token
     *
     * return AdherentDTO
     */
    public static function getAdherent($leIdUtilisateur) : AdherentsDTO{

      $requeteSql = "Select idUtilisateur, idAdherent, mail, mdp, statut, nomUtilisateur, prenomUtilisateur from ADHERENTS where idUtilisateur = :lId";
      $reqPrepa = DBConnex::getInstance()->prepare($requeteSql);
      $reqPrepa->bindParam(':lId' , $leIdUtilisateur);
      $reqPrepa->execute();

      $lAdherent = $reqPrepa->fetch(PDO::FETCH_ASSOC);

        $lAdherentDto = new AdherentsDTO();
        $lAdherentDto->hydrate($lAdherent);

        return $lAdherentDto;


    }



    /* @param AdherentsDTO or UtilisateurDTO
     *
     * return bool true si bien passé
     */
    public static function updateAdherent($id,$mail,$mdp,$nom,$prenom){


        $requeteSql = "UPDATE ADHERENTS SET mail =:lemail, mdp=:lemdp, nomUtilisateur=:lenom, prenomUtilisateur=:leprenom WHERE idUtilisateur =:id";
        $reqPrepa = DBConnex::getInstance()->prepare($requeteSql);
        $reqPrepa->bindParam(':id' , $id);
        $reqPrepa->bindParam(':lemail' , $mail);
        $reqPrepa->bindParam(':lemdp' , $mdp);
        $reqPrepa->bindParam(':lenom' , $nom);
        $reqPrepa->bindParam(':leprenom' , $prenom);
        $reqPrepa->execute();

        return $reqPrepa->execute();
    }

    static function updateUtilisateur($id,$mail,$mdp,$nom,$prenom)
    {
        //************* REQUETE POUR MODIFIER LE MDP DANS UTILISATEUR ***********************/
        $requeteSql = "UPDATE UTILISATEURS SET mail =:lemail, mdp=:lemdp, nomUtilisateur=:lenom, prenomUtilisateur=:leprenom WHERE idUtilisateur =:id";
        $reqPrepa = DBConnex::getInstance()->prepare($requeteSql);
        $reqPrepa->bindParam(':id' , $id);
        $reqPrepa->bindParam(':lemail' , $mail);
        $reqPrepa->bindParam(':lemdp' , $mdp);
        $reqPrepa->bindParam(':lenom' , $nom);
        $reqPrepa->bindParam(':leprenom' , $prenom);

        return $reqPrepa->execute();

    }

    /* @param string token
     *
     * return bool
     */
    public static function deleteAdherent($leIdUtilisateur){

      $requeteSql = "Delete from ADHERENTS where idUtilisateur = :id";
      $reqPrepa = DBConnex::getInstance()->prepare($requeteSql);
      $reqPrepa->bindParam(':id' , $leIdUtilisateur);
      
      return $reqPrepa->execute();

    }

    public static function deleteUtilisateur($leIdUtilisateur){

      $requeteSql = "DELETE FROM `UTILISATEURS` WHERE `UTILISATEURS`.`idUtilisateur` = :id";
      
      $reqPrepa = DBConnex::getInstance()->prepare($requeteSql);
      $reqPrepa->bindParam(':id' , $leIdUtilisateur);
      return $reqPrepa->execute();

    }


}
