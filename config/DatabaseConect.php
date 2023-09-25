<?php 

class DatabaseConect{

    public static function Conect(){
        $conection = new mysqli("localhost", "root" , "root" , "notas"); 
        $conection->query("SET NAMES 'utf8'");

        if($conection->connect_error){
            die("Database Conect Error: ". $conection->connect_error); 
        }

        return $conection; 
    }

}