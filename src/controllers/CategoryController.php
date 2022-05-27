<?php

namespace src\controllers;

use src\models\Category;
use src\utils\Controller;
use src\utils\Request;
use src\utils\Response;
use src\utils\Application;

class CategoryController extends Controller {

    private Response $response;

    public function __construct() {
        $this->setLayout('adminlayout');
        $this->response = new Response();
    }  

    public function newCategory(Request $request) {
        Application::checkLoggedIn();
        $this->response->setResponseContent([[Category::getOneCategory($request->getBody()['cat_id']??'')], $request->getBody()['action']??'']);
        return $this->render('addCategory', ['response' => $this->response]);
    }

    public function allCategory(Request $request) { 
        Application::checkLoggedIn();
        $allCategory = Category::getAllCategory();
        $this->response->setResponseContent($allCategory);

        return $this->render('allCategory',['response' => $this->response]);
    }


}
     
     