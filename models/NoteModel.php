<?php 

class NoteModel{
    protected     $id; 
    protected     $user_id; 
    protected     $category_id; 
    protected     $titulo; 
    protected     $descripcion; 
    protected     $db; 

    public function __construct(){
        $this->db = DatabaseConect::Conect();   
    }

  
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    
    public function getUser_id()
    {
        return $this->user_id;
    }

    
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

   
    public function getCategory_id()
    {
        return $this->category_id;
    }

   
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }
    
    
    public function getTitulo()
    {
        return $this->titulo;
    }

   
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }
   
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function showNoteByCategory(){

        $sql = "SELECT * FROM notes WHERE category_id = {$this->getCategory_id()} ORDER BY id DESC"; 

        $query = $this->db->query($sql); 

        

        return $query; 
        
    }

    public function getAllNotesById(){
        $sql = "SELECT * FROM notes WHERE user_id_notes = {$this->getUser_id()} ORDER BY id DESC"; 
       
        $query = $this->db->query($sql); 

        
        return $query; 
    }

    public function deleteNote(){
        $sql = "DELETE FROM notes WHERE id = {$this->getId()}"; 

        $query = $this->db->query($sql); 

        return $sql; 
    }

    public function updateNote(){
        $sql = "UPDATE notes SET category_id = {$this->getCategory_id()} , titulo = '{$this->getTitulo()}' , descripcion = '{$this->getDescripcion()}'"
              . " WHERE id = {$this->getId()}"; 
       
        $query = $this->db->query($sql); 
        

        return $query; 
    }

    public function saveNote(){
        $sql = "INSERT INTO notes VALUES(NULL,{$this->getUser_id()},{$this->getCategory_id()},'{$this->getTitulo()}'" 
             . " ,'{$this->getDescripcion()}' , CURDATE())"; 

    
        $query = $this->db->query($sql); 
       

        return $query; 
    }

  

  
}