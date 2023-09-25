<?php 

class CategoriaModel{
    public   $id; 
    public   $user_id_category; 
    public   $nombre; 
    public   $db; 

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

    public function getUser_id_category()
    {
        return $this->user_id_category;
    }

    
    public function setUser_id_category($user_id_category)
    {
        $this->user_id_category = $this->db->real_escape_string($user_id_category);

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

    public function deleteCategory(){
        $sql = "DELETE FROM categories WHERE id = {$this->getId()}"; 

        $query = $this->db->query($sql); 

        return $query; 
    }

    public function UpdateCategory(){
        $sql = "UPDATE categories SET nombre = '{$this->getNombre()}' WHERE id = {$this->getId()}"; 

        $query = $this->db->query($sql); 

        return $query; 
    }

    public function getAllCategories(){
        $sql = $this->db->query("SELECT * FROM categories ORDER BY id DESC"); 

        return $sql; 
    }

    public  function saveCategory(){
        $sql = "INSERT INTO categories VALUES(NULL, {$this->getUser_id_category()}, '{$this->getNombre()}', CURDATE())"; 

        $query = $this->db->query($sql); 

        return $query; 
    }
}