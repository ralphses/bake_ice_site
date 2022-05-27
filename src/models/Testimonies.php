<?php 

namespace src\models;

use src\utils\Database;
use src\utils\Model;

class Testimonies extends Model {

    public string $content;
    public string $image;
    public string $customer_name;
    

    public function labels(): array {
        return self::$labels['testimonies'];
    }

    public function rules(): array {
        return [
            'customer_name' => [self::RULE_REQUIRED],
            'content' => [self::RULE_REQUIRED],
            'image' => [self::RULE_REQUIRED]
        ];
    }

    public function saveTestimony() {
        $sql = 'INSERT INTO testimonials (content, image) VALUES (:content, :image);';
        $f = get_object_vars($this);
        unset($f['errors']);
        return Database::$database->executeQuery($sql, $f)[0];
    }

    public static function getAllTestimonies() {
        $sql = "SELECT * FROM testimonials ORDER BY content ASC";
        return Database::$database->executeQuery($sql)[1];
    }

    public static function approveTestimony($test_id) {
        $sql = "UPDATE testimonials SET status = 0 WHERE test_id = :test_id;";
        return Database::$database->executeQuery($sql, ['test_id' => $test_id])[0];
    }
}