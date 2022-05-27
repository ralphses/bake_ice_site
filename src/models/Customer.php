<?php

namespace src\models;

use src\utils\Database;
use src\utils\Model;

class Customer extends Model {

    public string $cust_fname = '';
    public string $cust_other_names = '';
    public string $cust_email = '';
    public string $cust_phone = '';

    public function rules() : array {
        return [

            'cust_fname' => [self::RULE_REQUIRED],
            'cust_other_names' => [self::RULE_REQUIRED],
            'cust_email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'cust_phone' => [self::RULE_REQUIRED, [self::RULE_NUMBER, [self::RULE_MAX, 'max' => 11]]]

        ];
    }

    public function labels() : array {
        return self::$labels['customer'];
    }

    public function saveCustomer() {
        $sql = 'INSERT INTO customer (cust_fname, cust_other_names, cust_email, cust_phone) 
                VALUES (:cust_fname, :cust_other_names, :cust_email, :cust_phone);';
        $f = get_object_vars($this);
        unset($f['errors']);
        unset($f['form_name']);

        return Database::$database->executeQuery($sql, $f)[0];
    }

    public static function getCustomerByEmail($cust_email) {
        
        $sql = 'SELECT * FROM customer WHERE cust_email = :cust_email;';
        return Database::$database->executeQuery($sql, ['cust_email' => $cust_email])[1];
    }

    public static function getCustomerByID($customer_id) {
        
        $sql = 'SELECT * FROM customer WHERE customer_id = :customer_id;';
        return Database::$database->executeQuery($sql, ['customer_id' => $customer_id])[1];
    }

    public static function getAllCustomer() {
        $sql = 'SELECT * FROM customer;';
        return Database::$database->executeQuery($sql)[1];
    }

}