<?php
use LDAP\Result;

class Helpers{

    public static function unsetSession($name){
        if(isset($_SESSION[$name])){
            unset($_SESSION[$name]); 
        }
    }

    public static function emailDuplicate($email){ 
        $result = false;
        $sql = "SELECT * FROM users WHERE email = '$email'"; 
        $query = DatabaseConect::Conect()->query($sql); 

        if($query->num_rows>=1){
            $result = true; 
        }

        return $result; 
    }

    public static function isUser(){
        if(isset($_SESSION['user'])){
            
            return true;

        }else{
            header("Loaction: ".base_url); 
        }
    }

    public static function showAllCategories(){
    
        $sql = DatabaseConect::Conect()->query("SELECT * FROM categories ORDER BY id DESC"); 

        return $sql; 
    }

    public static function getCategoryById($id){

        $query = DatabaseConect::Conect()->query("SELECT * FROM categories WHERE id = '$id'"); 

        return $query->fetch_object(); 

    }

public static function getNotasById($id_note , $id_user){
    $sql = "SELECT * FROM notes WHERE id = '$id_note'"; 

    $query = DatabaseConect::Conect()->query($sql); 

    return $query->fetch_object(); 
}

}