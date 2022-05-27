<?php 

namespace src\utils;


class Application {

    public static string $ROOT_PATH;
    public static Application $app;

    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Database $database;

    public function __construct($rootpath) {

        self::$app = $this;
        self::$ROOT_PATH = $rootpath;

        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->database = new Database();

    }

    public function run() {
         echo $this->router->resolve();
    }

    public function setController($controller) {
        $this->controller = $controller;
    }
    public function getController() {
        return $this->controller;
    }

    public function getRouter() {
        return $this->router;
    }  
    
    public static function checkLoggedIn() {
        if(!$_SESSION['logged_in'] and !$_SESSION['user_id']) {
            header('Location: /admin/login');
            exit;
        }
    }

}