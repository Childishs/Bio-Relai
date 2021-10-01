<?php

class DBConnex extends PDO{
    
    private static $instance;
    
    public static function getInstance(){
        if ( !self::$instance ){
            self::$instance = new DBConnex();
        }
        return self::$instance;
    }
    
    private function __construct(){
        try {
            parent::__construct(Param::$hostBD ,Param::$logBD, Param::$mdp);
        } catch (Exception $e) {
            echo $e->getMessage();
            die("Impossible de se connecter. " );
        }
    }
    

}