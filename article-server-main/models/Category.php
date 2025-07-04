<?php
require_once("Model.php");

class Category extends Model{

    private int $id; 
    private int $article_id; 
    private string $category_name; 
    
    protected static string $table = "categories";

    public function __construct(array $data){
        $this->id = $data["id"];
        $this->article_id = $data["article_id"];
        $this->category_name = $data["category_name"];
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getArticle_id(): int {
        return $this->article_id;
    }

    public function setArticle_id(int $article_id){
        $this->article_id = $article_id;
    }

        public function getCategoryName(): string {
        return $this->category_name;
    }

    public function setCategoryName(string $category_name){
        $this->category_name = $category_name;
    }

     public function toArray(){
        return [$this->id, $this->article_id, $this->category_name];
    }
    public static function getCategoryByArticleId(mysqli $mysqli, int $articleId) {
        $sql = sprintf(
            "SELECT c.id, c.category_name FROM %s c JOIN article_categories ac ON c.id = ac.category_id WHERE ac.article_id = ?;",
            static::$table);
     
        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        $data = $query->get_result()->fetch_assoc();
        return $data ? new static($data) : null;
    }
}