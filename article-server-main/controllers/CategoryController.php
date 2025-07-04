<?php 

require(__DIR__ . "/../models/Category.php");
require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/CategoriesService.php");
require(__DIR__ . "/../services/ResponseService.php");

class CategoryController extends BaseController{
    global $mysqli;
    public function getAllCategories(){
            if(!isset($_GET["id"])){
            $categories = Category::all($mysqli);
            $categories_array = ControlerService::articlesToArray($categories); 
            echo ResponseService::success_response($categories_array); //should comment those but not now
            return;
        }
        

        $id = $_GET["id"];
        $category = Category::find($mysqli, $id)->toArray();
        echo ResponseService::success_response($category);
        return;
    }

    public function deleteAllCategories(){
        $category = Category::deleteAll($mysqli);
        die("Deleting...");
    }

    public function deleteCategory(){
        $id = $_GET["id"];
        $category = Category::delete($mysqli, $id);
    }

    public function createCategory(){
        $data=[];
        $data["categoryname"]=$_POST["categoryname"];
        $category = Category::addNew($mysqli, $data)->toArray();
        echo ResponseService::success_response($category);
        return;
    }
     public function updateCategory(){
        $data=[];
        $data["categoryname"]=$_POST["categoryname"];
        $category = Category::update($mysqli, $data)->toArray();
        echo ResponseService::success_response($category);
        return;
    }

    public function getCategoryByArticle(){
            $category = Category::getCategoryByArticleId($mysqli,$_GET["id"]);
            $categories_array = ArticleService::articlesToArray($category); 
            echo ResponseService::success_response($categories_array);
            return;
        }
}

//To-Do:

//1- Try/Catch in controllers ONLY!!! 
//2- Find a way to remove the hard coded response code (from ResponseService.php)
//3- Include the routes file (api.php) in the (index.php) -- In other words, seperate the routing from the index (which is the engine)
//4- Create a BaseController and clean some imports 