<?php 
require_once "./models/NoteModel.php";
class NoteController{

    public function createNote(){
        require_once "./views/note/create.php";     
    }

    public function myNotes(){
        Helpers::isUser(); 
        $id_user = $_SESSION['user']->id; 
        $note = new NoteModel; 
        $note->setUser_id($id_user); 
        $notas = $note->getAllNotesById();
        require_once "./views/note/myNotes.php";
    }

    public function delete(){
        Helpers::isUser(); 
        if(isset($_GET['id'])){
            $note_id = $_GET['id']; 
            $note = new NoteModel; 
            $note->setId($note_id); 
            $note->deleteNote(); 
        }

        header("Location: ".base_url."Note/myNotes"); 
    }

    public function gestion(){
        require_once "./views/note/gestion.php"; 
    }


    public function getNoteByCAtegoryId(){
        Helpers::isUser(); 
        if(isset($_GET['id'])){
            $id_category = $_GET['id']; 
            $note = new NoteModel;
            $note->setCategory_id($id_category); 
            $notas = $note->showNoteByCategory();  
        }

        

        require_once "./views/note/notesByCategory.php"; 
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
                
                if(isset($_GET['id'])){
                    $note_id = $_GET['id']; 
                    $note->setId($note_id); 
                    $update = $note->updateNote(); 

                    if($update){
                        $_SESSION['succes'] = "Nota editada"; 
                    }else{
                        $_SESSION['error'] = "Error al editar nota"; 
                    }

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