<?php

abstract class BDD 
{
   private static $instance = null; 
   public static function getConnexion()
   {
        if(self::$instance === null){
            $chemin_db =  __DIR__ . '/../data/soundwave.sqlite'; 
            $dsn = 'sqlite:' . $chemin_db; 

            self::$instance = new PDO($dsn); 
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
            self::$instance->exec('PRAGMA foreign_keys = ON'); 
        }
        return self::$instance; 
   }
}


?>