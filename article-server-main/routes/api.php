<?php
//Routing starts here (Mapping between the request and the controller & method names)
//It's an key-value array where the value is an key-value array
//----------------------------------------------------------
$apis = [
    '/articles'         => ['controllers' => 'ArticleController', 'method' => 'getAllArticles'],
    '/delete_articles'         => ['controllers' => 'ArticleController', 'method' => 'deleteAllArticles'],
    '/create_article'         => ['controllers' => 'ArticleController', 'method' => 'createArticles'],
    '/update_article'         => ['controllers' => 'ArticleController', 'method' => 'updateArticles'],

    '/categories'         => ['controllers' => 'CategoriesController', 'method' => 'getAllCategoriess'],
    '/delete_categories'         => ['controllers' => 'CategoriesController', 'method' => 'deleteAllCategries'],
    '/create_categorie'         => ['controllers' => 'CategoriesController', 'method' => 'createCategries'],
    '/update_categorie'         => ['controllers' => 'CategoriesController', 'method' => 'updateCategries'],


    '/login'         => ['controllers' => 'AuthController', 'method' => 'login'],
    '/register'         => ['controllers' => 'AuthController', 'method' => 'register'],

];

//----------------------------------------------------------

//Routing Logic here 
//This is a dynamic logic, that works on any array... 
//----------------------------------------------------------
if (isset($apis[$request])) {
    $controller_name = $apis[$request]['controller']; //if $request == /articles, then the $controller_name will be "ArticleController" 
    $method = $apis[$request]['method'];
    require_once "controllers/{$controller_name}.php";

    $controller = new $controller_name();
    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        echo "Error: Method {$method} not found in {$controller_name}.";
    }
} else {
    echo "404 Not Found";
}
?>