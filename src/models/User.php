<?php 

namespace src\models;

use src\utils\Database;
use src\utils\Model;

class User extends Model{

    public string $user_name;
    public string $user_email;
    public string $user_password;
    public string $user_confirm_password;
    public int $user_role = 0;
    public int $user_status = 0;

    public function rules(): array {
        return [
            'user_name' => [self::RULE_REQUIRED],
            'user_email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'user_password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
            'user_confirm_password' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'user_password']]
        ];
    }

    public function labels(): array {
        return self::$labels['user'];
        
    }

    public static function getUserByEmail($user_email) {

        $sql = "SELECT * FROM user WHERE user_email = :user_email;";
        return Database::$database->executeQuery($sql, ['user_email' => $user_email])[1];

    } 

    public function saveUser() {
        $sql = 'INSERT INTO `user`(`user_name`, `user_email`, `user_password`, `user_role`, `user_status`) 
                VALUES (:user_name, :user_email, :user_password, :user_role, :user_status);';

        $f = get_object_vars($this);
        unset($f['errors']);
        unset($f['user_confirm_password']);
        $f['user_password'] = password_hash($f['user_password'], PASSWORD_DEFAULT);
        
        return Database::$database->executeQuery($sql, $f)[0];
    }

    public static function getUserById($user_id) {
        $sql = "SELECT * FROM user WHERE user_id = :user_id;";
        return Database::$database->executeQuery($sql, ['user_id' => $user_id])[1];
    }


}