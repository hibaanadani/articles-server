<?php 

// This block is used to extract the route name from the URL
//----------------------------------------------------------
// Define your base directory 
$base_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove the base directory from the request if present
if (strpos($request, $base_dir) === 0) {
    $request = substr($request, strlen($base_dir));
}

// Ensure the request is at least '/'
if ($request == '') {
    $request = '/';
}

//Examples: 
//http://localhost/getArticles -------> $request = "getArticles"
//http://localhost/ -------> $request = "/" (why? because of the if)

// This block is used to extract the route name from the URL
//----------------------------------------------------------

require_once (__DIR__ . "/../routes/api.php")

?>