<?php 
require_once "./config/DatabaseConect.php"; 
class UserModel{

    private     $id; 
    private     $nombre; 
    private     $apellidos; 
    private     $email; 
    private     $password; 
    private     $db; 

    public function __construct(){
        $this->db = DatabaseConect::Conect(); 
    }


    public function getId()
    {
        return $this->id;
    }

   
    public function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);

        return $this;
    }

    
    public function getNombre()
    {
        return $this->nombre;
    }

    
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

     
    public function getApellidos()
    {
        return $this->apellidos;
    }
 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);

        return $this;
    }

    
    public function getEmail()
    {
        return $this->email;
    }
 
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);

        return $this;
    }

    
    public function getPassword()
    {
        return  password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT , ['cost'=>4]);
    }
 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function login(){

        $value = false;
        $email = $this->email;
        $pass = $this->password;

        $sql = "SELECT * FROM users WHERE email = '$email'";

        $query = $this->db->query($sql);

        $loginUser=false;  

        if ($query->num_rows == 1) {
            $loginUser = $query->fetch_object();
        }

        $verify = password_verify($pass,$loginUser->password);

        if($verify){
            $value = $loginUser;
        }else{
            header("Location:".base_url); 
        }

        return $value;
    }

    public function saveRegister(){
        $sql = "INSERT INTO users VALUES(NULL,'{$this->getNombre()}' , '{$this->getApellidos()}', '{$this->getEmail()}' , '{$this->getPassword()}' , CURDATE())";
    
        $query = $this->db->query($sql); 

        

        return $query; 
    }

    
    
}