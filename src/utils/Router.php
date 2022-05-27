<?php

namespace src\utils;

class Router {

    public Request $request;
    public Response $response;
    public string $current_page;

    public array $routes = [];

    public function __construct(Request $request, Response $response) {

        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback) {
 
        $this->routes['post'][$path] = $callback;
        // Application::$app->controller = new $callback[0];
    }

    public function resolve() {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        $this->current_page = str_replace('/','',$path);

        if(!$callback) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }

        if(is_string($callback)) {
            return $this->renderView($callback);
        }

        if(is_array($callback)) {
        
            Application::$app->controller = new $callback[0]();
            // var_dump(Application::$app->controller); exit;
            $callback[0] = Application::$app->controller;
        }

        return call_user_func($callback, $this->request);

    }

    public function renderView($view, $params = []) {
        //Get the layout
        $layoutContent =$this->layoutContent();
        
        //Get the view
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent); 
    }

    protected function renderOnlyView($view, $params =[]) {
        foreach($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_PATH."../src/views/$view.php";
        return ob_get_clean();
    }

    public function layoutContent() {
        $layout = Application::$app->getController()->layout;
        ob_start();
        $current_page =($this->current_page !== '') ? $this->current_page : 'home';
        include_once Application::$ROOT_PATH."../src/views/layouts/$layout.php";
        return ob_get_clean();
    }

}