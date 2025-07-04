<?php
require_once __DIR__ . '/connections/connection.php';
DB::connection("articles_db")->table('categories')->insert([
$category = [
        ['id' => '1', 'category_name' => 'Technology'],
        ['id' => '2', 'category_name' => 'Sports'],
        ['id' => '3', 'category_name' => 'News'],
        ['id' => '4', 'category_name' => 'Health'],
        ['id' => '5', 'category_name' => 'Travel'],
        ['id' => '6', 'category_name' => 'Weather'],
        ['id' => '7', 'category_name' => 'Food'],
        ['id' => '8', 'category_name' => 'Fashion'],
    ];
]);
DB::connection("articles_db")->table('article_category')->insert([
$relation = [
        ['article_id' => '1,5', 'category_id' => 'Technology'],
        ['article_id' => '2,7', 'category_id' => 'Sports'],
        ['article_id' => '3,6,8', 'category_id' => 'News'],
        ['article_id' => '4,1,8', 'category_id' => 'Health'],
        ['article_id' => '5,1,3,7', 'category_id' => 'Travel'],
        ['article_id' => '6,5,4', 'category_id' => 'Weather'],
        ['article_id' => '7,6,8', 'category_id' => 'Food'],
        ['article_id' => '8,7,3', 'category_id' => 'Fashion'],
    ];
]);
    ?>