<?php

namespace src\models;

use DateTime;
use src\utils\Controller;
use src\utils\Database;
use src\utils\Model;

class Order extends Model {

    public string $prod_id = '81';
    public string $customer_id;
    public string $cust_prod;
    public int $quantity;
    public string $budget;
    public string $delivery_address;
    // public string $date_initiated;
    public string $exp_delivery_date;
    public int $order_status;
    public string $order_no;

    // public string $cat_id;
    public string $prod_color;

    public function __construct() {
        // $this->date_initiated = date('Y-d-m');
    }


    public function rules() : array {
        return [
            'prod_id' => [self::RULE_REQUIRED],
            'budget' => [self::RULE_REQUIRED],
            'exp_delivery_date' => [self::RULE_REQUIRED],
            'prod_color' => [self::RULE_REQUIRED]
        ];
    }

    public function labels() : array {
        return self::$labels['order'];
    }

    public function saveOrder($dec = true) {
        if($dec) {
            $sql = "INSERT INTO product_order
            (`prod_id`, `customer_id`,`quantity`, `budget`, `delivery_address`, `exp_delivery_date`, `order_no`) 
            VALUES (:prod_id, :customer_id, :quantity, :budget, :delivery_address, :exp_delivery_date, :order_no);";
        }
        else {
            $sql = "INSERT INTO product_order
            (`prod_id`, `customer_id`, `cust_prod`, `quantity`, `budget`, `delivery_address`, `exp_delivery_date`, `order_no`) 
            VALUES (:prod_id, :customer_id, :cust_prod, :quantity, :budget, :delivery_address, :exp_delivery_date, :order_no);";
        }

        
        
        $f = get_object_vars($this);

        unset($f['errors']);
        unset($f['prod_color']);
        
        return Database::$database->executeQuery($sql, $f)[0];
    }

    public function getOrderNo($customer_id){
        $date = new DateTime();
        return "ORD".$customer_id.strtoupper(Controller::getFolderName(4)).str_replace('-','', strval(date('Y-m-d')));
    }

    public static function getBoundedOrders($format) {
        // echo $format; exit;
        $sql = "SELECT count(order_no) AS total_order, date_initiated 
                FROM product_order 
                WHERE  date_initiated LIKE '$format' 
                GROUP BY date_initiated 
                ORDER BY order_id ASC;";

        return Database::$database->executeQuery($sql)[1];
    }

    public static function getRealBoundedOrders($format, $start, $end) {
        $sql = "SELECT count(order_no) AS total_order, date_initiated 
                FROM product_order 
                WHERE  date_initiated LIKE '$format' AND
                date_initiated BETWEEN '$start' AND '$end'
                GROUP BY date_initiated 
                ORDER BY order_id ASC;";

return Database::$database->executeQuery($sql)[1];
    }

    public static function getAllOrders() {
        $sql = 'SELECT order_id, prod_id, customer_id, quantity, delivery_address, order_status FROM product_order WHERE cust_prod IS NULL;';
        return Database::$database->executeQuery($sql)[1];
    }

    public static function getAllCustomerOrders() {
        $sql = 'SELECT order_id, prod_id, customer_id, quantity, delivery_address, order_status FROM product_order WHERE cust_prod IS NOT NULL;';
        return Database::$database->executeQuery($sql)[1];
    }

    public static function getOrderById($order_id) {
        $sql = "SELECT * FROM product_order WHERE order_id = :order_id;";
        return Database::$database->executeQuery($sql, ['order_id' => $order_id])[1];
    }

    public static function updateOrderStatus($order_id, $order_status) {
        $sql = "UPDATE product_order SET order_status = :order_status WHERE order_id = :order_id;";
        return Database::$database->executeQuery($sql, ['order_id' => $order_id, 'order_status' => $order_status])[0];
    }
}

