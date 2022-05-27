<?php 

namespace src\models;

use src\utils\Database;
use src\utils\Model;

class Gallery extends Model {
    public string $name = 'Gallery image';
    public string $image;

    public function rules() : array {
        return [
            'image' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array {
        return self::$labels['gallery'];
    }

    public static function getAllGalleryImages() {
        $sql = "SELECT * FROM gallery;";
        return Database::$database->executeQuery($sql)[1];
    }

    public function saveGallery() {
        $sql = 'INSERT INTO gallery (name, image) VALUES (:name, :image);';
        $f = get_object_vars($this);
        unset($f['errors']);

        return Database::$database->executeQuery($sql, $f)[1];
    }

    public static function getGalleryById($id) {
        $sql = "SELECT * FROM gallery WHERE id = :id;";
        return Database::$database->executeQuery($sql, ['id' => $id])[1];

    }

    public static function deleteGallery($id) {
        $sql = "DELETE FROM gallery WHERE id = :id;";
        return Database::$database->executeQuery($sql, ['id' => $id])[0];

    }
}