<?php 

namespace src\utils;

class Request {

    public function getPath() {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        return($position === false) ? $path : substr($path, 0, $position);
    }

    public function method() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public static function getFormName() {
       return $_GET['form_name'] ?? $_POST['form_name'] ?? false;
    }

    public function isGet() {
        return $this->method() === 'get';
    }

    public function isPost() {
        return $this->method() === 'post';
    }

    public function getBody() {
        $body = [];

        if($this->isGet()) {
            foreach($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->isPost()) {
            foreach($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

    
}