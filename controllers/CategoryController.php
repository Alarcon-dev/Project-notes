<?php 
require_once "./models/CategoryModel.php"; 

class CategoryController{

    public function index(){
        require_once "./views/category/indexCategory.php"; 
    }

    public function createCategory(){
        Helpers::isUser(); 
        require_once "./views/category/createCategory.php";
    }

    public function delete(){
        if(isset($_GET)){
            $id = $_GET['id']; 
            $category = new CategoriaModel; 
            $category->setId($id);
            $category->deleteCategory(); 

        }

        header("Location: ".base_url."Category/showAllCategories"); 
    }



    public function showAllCategories(){
        Helpers::isUser(); 
        $category = new CategoriaModel; 
        $categories = $category->getAllCategories(); 
        require_once "./views/category/seeCategories.php"; 
    }

    public function saveCategory(){
        Helpers::isUser(); 
        $user_id = $_SESSION["user"]->id; 
        
        if(isset($_POST)){
            $categoryName = isset($_POST['nombre']) ? $_POST['nombre'] : false; 

            if($categoryName && !preg_match("/[<>#]()/", $categoryName)){
                $category = new CategoriaModel; 
                $category->setUser_id_category($user_id); 
                $category->setNombre($categoryName); 
               

                if(isset($_GET['id'])){
                    $id = $_GET['id']; 
                    $category->setId($id); 
                    $update = $category->UpdateCategory(); 

                    
                    if($update){
                        $_SESSION['succes'] = "Categoría editada con éxito"; 
                    }else{
                        $_SESSION['error'] = "Error al editar categoría"; 
                    }

                    
                }else{
                    $save = $category->saveCategory(); 

                    if($save){
                        $_SESSION['succes'] = "Categoría creada con éxito"; 
                    }else{
                        $_SESSION['error'] = "Error al crear categoría"; 
                    }
                }

                if($save){
                    $_SESSION['succes'] = "Categoría creada con éxito"; 
                }else{
                    $_SESSION['error'] = "Error al crear categoría"; 
                }
            }
        }

        header("Location: ".base_url. "Category/createCategory"); 
    }
}