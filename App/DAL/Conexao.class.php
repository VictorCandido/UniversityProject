<?php
class Conexao {
    function conectar(){
        try{
            $pdo = new PDO("mysql:host=localhost;dbname=crud", "root", "");
            return $pdo;
        }catch(PDOException $e){
            echo $e->getMessage();
        }        
    }
}
