<?php 
    require("../connection/connection.php");
    $query = "CREATE TABLE article_category(
    article_id INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY (article_id, category_id),
);
?>