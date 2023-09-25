<?php 
require_once "./models/UserModel.php"; 
class UserController{

    public function register(){
        require_once "./views/user/register.php"; 
    }

    public function login(){
        require_once "./views/user/login.php"; 
    }

    public function logout(){
        if(isset($_SESSION['user'])){
         unset($_SESSION['user']);
        }
         header("Location: ".base_url);   
    }

    public function loginUser(){
        if(isset($_POST)){
            
            $password = $_POST['password']; 
            $email = $_POST['email']; 

            $user = new UserModel(); 
            $user->setPassword($password); 
            $user->setEmail($email); 
            $login = $user->login(); 

            

            if(is_object($login)){
                $_SESSION['user'] = $login; 
            }else{
                $_SESSION['error'] = "Datos de ingreso no válidos";    
            }
        }else{
            $_SESSION['error'] = "Datos de ingreso no válidos"; 
        }

        require_once "./views/user/login.php"; 

    }

    public function validateRegister(){
        if(isset($_POST)){
            $nombre = $_POST['nombre']; 
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email']; 
            $password = $_POST['password']; 

            $verification = Helpers::emailDuplicate($email); 

            if($verification){
                $_SESSION['error'] = "El correo ya está en uso";
                header("location: " .base_url."User/register"); 
                die(); 
            }
            
            if($nombre && $apellidos && $email && $password){
                $user = new UserModel(); 
                $user->setNombre($nombre); 
                $user->setApellidos($apellidos); 
                $user->setEmail($email); 
                $user->setPassword($password); 

                $save = $user->saveRegister(); 

               

                if($save){
                    $_SESSION['succes'] = "Usuario registrado conéxito"; 
                }
            }else{
                $_SESSION['error'] = "Error de ingreso de regístro"; 
            }
        }else{
            $_SESSION['error'] = "Error de ingreso de datos"; 
        }

        header("location: ".base_url."User/register"); 
    }
}