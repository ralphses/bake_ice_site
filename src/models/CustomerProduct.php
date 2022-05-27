<?php 

namespace src\models;

use src\utils\Database;
use src\utils\Model;

class CustomerProduct extends Model {

    public string $prod_title;
    public string $cat_name;
    public string $prod_flavor;
    public string $steps = '0';
    public string $color;

    public function rules(): array {
        return [
            'prod_title' => [self::RULE_REQUIRED],
            'cat_name' => [self::RULE_REQUIRED],
            'prod_flavor' => [self::RULE_REQUIRED],
            'color' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array {
        return self::$labels['customer-product'];
    }

    public function saveToDataBase() {
        $sql = 'INSERT INTO 
        customer_product (`prod_title`, `cat_name`, `prod_flavor`, `steps`, `color`) 
        VALUES (:prod_title, :cat_name, :prod_flavor, :steps, :color);';
        
        $f = get_object_vars($this);

        unset($f['errors']);
        return Database::$database->executeQuery($sql, $f)[0];
    }

    public function getLastInsertedProductId() {
        $sql = 'SELECT id FROM customer_product ORDER BY id DESC LIMIT 1';
        return Database::$database->executeQuery($sql)[1][0]['id'];
    }

    public static function getProductByID($id) {
        $sql = "SELECT * FROM customer_product WHERE id = :id;";
        return Database::$database->executeQuery($sql, ['id' => $id])[1];
    }
}