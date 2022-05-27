<?php

namespace src\models;

use src\utils\Model;
use src\utils\Database;

class Product extends Model{

    public string $prod_id;
    public string $cat_id;
    public string $prod_title;    
    public string $prod_price;
    public string $prod_desc;
    public string $prod_image_main ="";
    public string $prod_image_other ="";
    public string $prod_flavor;
    public int $prod_steps;
    public string $prod_color;
    public int $prod_status;
    public int $featured;
    public string $date_added;
   
    public string $new_cat_id;
    public string $new_prod_flavor;

    public function __construct() {
        $this->date_added = date('Y-m-d');
    }

    public function rules() : array {
        return [
            'cat_id' => [self::RULE_REQUIRED],
            'prod_title' => [self::RULE_REQUIRED],
            'prod_price' => [self::RULE_REQUIRED],
            'prod_desc' => [self::RULE_REQUIRED],
            'prod_image_main' => [self::RULE_REQUIRED],
            'prod_flavor' => [self::RULE_REQUIRED],
            'prod_color' => [self::RULE_REQUIRED]
        ]; 
    }

    public function labels() : array {
        return self::$labels['product'];
    }

    public function getProduct() {
        $sql = 'SELECT * FROM product WHERE prod_title = :prod_title';
        return Database::$database->executeQuery($sql, ['prod_title' => $this->prod_title])[0];
    }

    public function updateProduct($prod_id, $values) {

        $sqlQuery = "UPDATE product SET ";
        foreach($values as $key => $value) {
            $sqlQuery .= "`".$key."` "."="." :".$key.",";
        }
        $sqlQuery = substr_replace($sqlQuery, "", strlen($sqlQuery) - 1)." WHERE prod_id = '{$prod_id}'".";";

        Database::$database->executeQueryMulti($sqlQuery, $values);
    }

    public static function getProductImages($prod_id) {
        $sql = "SELECT prod_image_main, prod_image_other FROM product WHERE prod_id = {$prod_id}";
        return Database::$database->executeQuery($sql);
    }

    public function saveToDatabase() {
        $sql = "INSERT INTO `product`
        (cat_id, prod_title, prod_price, prod_desc, prod_image_main, prod_image_other, prod_flavor, prod_steps, prod_color, prod_status, featured, date_added) 
        VALUES (:cat_id, :prod_title, :prod_price, :prod_desc, :prod_image_main, :prod_image_other, :prod_flavor, :prod_steps, :prod_color, :prod_status, :featured, :date_added);";
        $f = $this->trimModel();
        return Database::$database->executeQuery($sql, $f)[0];
              
    }

    public static function getAllProduct() {
        $sql = 'SELECT * FROM product WHERE prod_id != 81 ORDER BY prod_title ASC';
        return Database::$database->executeQuery($sql)[1];
    }

    public static function getProductByCategory($cat_id) {
        $sql = "SELECT * FROM product WHERE cat_id = :cat_id AND prod_title != 'customer product' ORDER BY prod_title ASC ";
        return Database::$database->executeQuery($sql, ['cat_id' => $cat_id])[1];
    }

    public static function getProductByID($prod_id) {
        $sql = 'SELECT * FROM product WHERE prod_id = :prod_id';
        return Database::$database->executeQuery($sql, ['prod_id' => $prod_id])[1];
    }

    public static function getRecentItems() {
        $current_date = date('Y-m-d');
    
    }

    public static function deleteProduct($prod_id) {
        $sql = "DELETE FROM `product` WHERE prod_id = {$prod_id};";
        return Database::$database->executeQuery($sql);
    }

    public static function editProductStatus($prod_id, $action) {
        $action == "publish" ? $sql = "UPDATE product SET prod_status = 0 WHERE prod_id = :prod_id" : $sql = "UPDATE product SET prod_status = 1 WHERE prod_id = :prod_id";
        return Database::$database->executeQuery($sql, ['prod_id'=>$prod_id])[0];
    }

    public static function getFeaturedProducts() {
        $sql = 'SELECT * FROM product WHERE cat_id = 1 ORDER BY prod_title ASC ';
        return Database::$database->executeQuery($sql)[1];
    }

    

}