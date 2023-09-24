<?php 
require_once "./models/NoteModel.php";
class NoteController{

    public function createNote(){
        require_once "./views/note/create.php";     
    }

    public function myNotes(){
        Helpers::isUser(); 
        $note = new NoteModel; 
        $notas = $note->getAllNotes();
        require_once "./views/note/myNotes.php";
    }


    public function saveNotes(){
        Helpers::isUser(); 

        if(isset($_POST)){
            $user_id = $_SESSION['user']->id; 
            $category_id = isset($_POST['categoria']) ? $_POST['categoria'] : false; 
            $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : false; 
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false; 


            if($user_id && $category_id && $titulo && $descripcion){
                $note = new NoteModel; 
                $note->setUser_id($user_id); 
                $note->setCategory_id($category_id); 
                $note->setTitulo($titulo); 
                $note->setDescripcion($descripcion); 
                
                if(isset($_get['id'])){

                }else{
                    $save = $note->saveNote(); 

                    if($save){
                        $_SESSION['succes'] = "Nota creada"; 
                    }else{
                        $_SESSION['error'] = "Error al crear nota"; 
                    }
                }

                header("Location: ".base_url."Note/createNote"); 
            }

    
        }
    }
}