<?php 
abstract class Model{

    protected static string $table;
    protected static string $primary_key = "id";

    public static function find(mysqli $mysqli, int $id){
        $sql = sprintf("Select * from %s WHERE %s = ?", 
                        static::$table, 
                        static::$primary_key);
        
        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
    }

    public static function all(mysqli $mysqli){
        $sql = sprintf("Select * from %s", static::$table);
        
        $query = $mysqli->prepare($sql);
        $query->execute();

        $data = $query->get_result();

        $objects = [];
        while($row = $data->fetch_assoc()){
            $objects[] = new static($row); //creating an object of type "static" / "parent" and adding the object to the array
        }

        return $objects; //we are returning an array of objects!!!!!!!!
    }

    public static function deleteAll(mysqli $mysqli){
        $sql = sprintf("Drop table %s", static ::$table);
    }

    public static function delete(mysqli $mysqli, int $id){
        $sql = sprintf("Delete from table %s WHERE %s = ?", static ::$table, static::$primary_key);

        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;

    }

    public static function addNew(mysqli $mysqli, $data){
           //from $data create a string of ?s ex: name and age 2 => ? ,? 
        // $placeholder= ""
        $columns = implode(', ', array_keys($data));//this equals name..
        $placeholders = implode(', ', array_fill(0, count($data), '?')); //this equlas value
        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s) ",
                        static::$table,
                        $columns,
                        $placeholders);

        $query = $mysqli->prepare($sql);
        //for each data in $data, in need to see if int or string. why? because we need a string like issi(this is going to be the first parameter of bind_param) 
        //need to destruct $data 
        $types = '';
        $values = [];
        foreach ($data as $value) {
            if (is_int($value)) {
                $types .= 'i';
            } elseif (is_float($value)) {
                $types .= 'd';
            } else {
                
                $types .= 's';
        }
       $values[] = $value;
    }
        $query->bind_param($types,...$values);
        $query->execute();
        //  withoutbindparam   $query->execute($columns,$placeholders);
        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;

    }


    public function update(mysqli $mysqli, int $id, array $data){
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $sql = sprintf("UPDATE %s SET %s =  %s WHERE %s =? ",
                        static::$table,
                        $columns, 
                        $placeholders,
                        static::$primary_key);

        $query = $mysqli->prepare($sql);
        $types = '';
        $values = [];
        foreach ($data as $value) {
            if (is_int($value)) {
                $types .= 'i';
            } elseif (is_float($value)) {
                $types .= 'd';
            } else {
                
                $types .= 's';
        }
       $values[] = $value;
    }
        $query->bind_param($types,...$values);
        $query->execute();
        $data = $query->get_result();

    }

    
    //you have to continue with the same mindset
    //Find a solution for sending the $mysqli everytime... 
    //Implement the following: 
    //1- update() -> non-static function 
    //2- create() -> static function
    //3- delete() -> static function 
}



?>