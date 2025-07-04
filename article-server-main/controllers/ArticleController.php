<?php 

require(__DIR__ . "/../models/Article.php");
require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/ArticleService.php");
require(__DIR__ . "/../services/ResponseService.php");

class ArticleController{
    global $mysqli;
    public function getArticle(){
        global $mysqli;

        if(!isset($_GET["id"])){
            $articles = Article::all($mysqli);
            $articles_array = ArticleService::articlesToArray($articles); 
            echo ResponseService::success_response($articles_array);
            return;
        }
    }
    public function getAllArticles(){
        $id = $_GET["id"];
        $article = Article::find($mysqli, $id)->toArray();
        echo ResponseService::success_response($article);
        return;
    }

    public function deleteAllArticles(){
        $article = Article::deleteAll($mysqli);
        die("Deleting...");
    }

    public function deleteArticle(){
        $id = $_GET["id"];
        $article = Article::delete($mysqli, $id);
    }

    public function createArticle(){
        $data=[];
        $data["name"]=$_POST["articlename"];
        $data["author"]=$_POST["articlenauthor"];
        $data["description"]=$_POST["articledescription"];
        $article = Article::addNew($mysqli, $data)->toArray();
        echo ResponseService::success_response($article);
        return;
    }
     public function updateArticle(){
        $data=[];
        $data["name"]=$_POST["articlename"];
        $data["author"]=$_POST["articlenauthor"];
        $data["description"]=$_POST["articledescription"];
        $article = Article::update($mysqli, $data)->toArray();
        echo ResponseService::success_response($article);
        return;
    }
    public function getArticleByCategory(){
            $articles = Article::getArticlesByCategoryId($mysqli,$_GET["id"]);
            $articles_array = ArticleService::articlesToArray($articles); 
            echo ResponseService::success_response($articles_array);
            return;
        }
    
}

//To-Do:

//1- Try/Catch in controllers ONLY!!! 
//2- Find a way to remove the hard coded response code (from ResponseService.php)
//3- Include the routes file (api.php) in the (index.php) -- In other words, seperate the routing from the index (which is the engine)
//4- Create a BaseController and clean some imports 