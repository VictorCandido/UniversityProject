<?php
class Conexao {
    function conectar(){
        try{
            // $pdo = new PDO("mysql:host=localhost;dbname=projeto", "root", "");
            $pdo = new PDO("mysql:host=sql188.main-hosting.eu;dbname=u887833101_bdhos", "u887833101_canvi", "mysql1023");
            return $pdo;
        }catch(PDOException $e){
            echo $e->getMessage();
        }        
    }
}
