<?php


// Class BDD, on l'étendra sur nos répository pour qu'il accèdent à la connexion directement avec superrr

class Db 
{

    // Singleton
    private function __construct() {}

    /**
     * On construit la connexion avec une méthode de connexion et des variables interachangable pour la suite
     *
     * @return \PDO
     */
    public static function CONNECT() : \PDO
    {
        try {
            $db = new \PDO("mysql:host=".Param::$hostBD.";dbname=".Param::$nomBD.", ".Param::$logBD.", ".Param::$mdp."");
            return $db;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }


}
