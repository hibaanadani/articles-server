<?php
require_once __DIR__ . '/connections/connection.php';
DB::connection("categories")->table('tblgeneral')->insert([
$users = [
        ['id' => '1', 'category_name' => 'Action', 'articles_id' => '[2,4,5,7,10]'],
        ['id' => '2', 'category_name' => 'Romance', 'articles_id' => '[1,3,5,10]'],
        ['id' => '3', 'category_name' => 'Horror', 'articles_id' => '[6,8,9]'],
    ];
]);
    ?>