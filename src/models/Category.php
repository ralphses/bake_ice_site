<?php 

namespace src\models;

use src\utils\Database;
use src\utils\Model;

class Category extends Model {

    public string $cat_desc;
    public string $cat_name;

    public static array $catProducts = [];

    public function rules() : array {
        return [
            'cat_name' => [self::RULE_REQUIRED],
            'cat_desc' => [self::RULE_REQUIRED]
        ]; 
    }

    public function labels() : array {
        return self::$labels['category'];
    }

    public static function getCategoryKeys() {
        $sql = 'SELECT cat_id FROM category;';
        return Database::$database->executeQuery($sql)[1];
    }

    public function getCategory() {
        $sql = 'SELECT * FROM category WHERE cat_name = :cat_name';
        return Database::$database->executeQuery($sql, ['cat_name' => $this->cat_name])[0];
    }

    public static function getAllCategory($cat_id = '', $cat_name = '') {
        if($cat_id !='' and $cat_name != '') {
            $sql = "SELECT {$cat_id}, {$cat_name} FROM category  ORDER BY cat_name ASC";
        }
        else {
            $sql = "SELECT * FROM category WHERE cat_name != 'Others' ORDER BY cat_name ASC;";
        }
       
        return Database::$database->executeQuery($sql)[1];
    }

    public static function getOneCategory($cat_id) {
        $sql = 'SELECT * FROM category WHERE cat_id = :cat_id;';
        return Database::$database->executeQuery($sql, ['cat_id' => $cat_id])[1];
    }

    public static function categoryTotalProduct($cat_id) {
        $sql = 'SELECT total_product FROM category WHERE cat_id = :cat_id;';
        return Database::$database->executeQuery($sql, ['cat_id' => $cat_id])[1];
    }

    public static function deleteCategory($cat_id) {
        $sql = 'DELETE FROM `category` WHERE `category`.`cat_id` = :cat_id;';
        return Database::$database->executeQuery($sql, ['cat_id' => $cat_id])[1];
    }

    public function saveToDatabase() {
        $sql = "INSERT INTO category (cat_name, cat_desc) VALUES (:cat_name, :cat_desc);";
        $f = get_object_vars($this);
        
        unset($f['form_name']);
        unset($f['errors']);
        // var_dump($f);

        return Database::$database->executeQuery($sql, $f);
    }

    public static function updateCategory($cat_id, $values) {
        $sqlQuery = "UPDATE category SET ";
        foreach($values as $key => $value) {
            $sqlQuery .= "`".$key."` "."="." :".$key.",";
        }
        $sqlQuery = substr_replace($sqlQuery, "", strlen($sqlQuery) - 1)." WHERE cat_id = '{$cat_id}'".";";
        Database::$database->executeQueryMulti($sqlQuery, $values);
    }

}