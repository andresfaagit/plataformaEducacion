<?php 
    //dirección a BDs y conexiones
    class ConnectDB {

        public function openConnection(){
            $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABSE) or die("Connect failed: %s\n". $connection -> error);
            return $connection;
        }

        public function closeConnection($connection){
            $connection -> close();
        }

        public function __destruct(){

        }
    }  
?>