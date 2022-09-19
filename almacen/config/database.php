<?php


class Database {

    private $hostname = "localhost";
    private $database = "almacen";
    private $username = "root";
    private $password = "mysql";
    private $chatset = "utf8";

    function conectar(){

        try {
            $conexion = "mysql:host=".$this->hostname.";dbname=".$this->database.";charset=".$this->chatset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $pdo = new PDO($conexion, $this-> username, $this-> password, $options); 
            
            return $pdo;

        }catch(PDOEXCEPTION $e){
            echo 'Error de conexion: '.$e->getMessage();
            exit;
        }

    }

}
