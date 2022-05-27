<?php

namespace src\controllers;

use src\models\User;
use src\utils\Application;
use src\utils\Controller;
use src\utils\Request;
use src\utils\Response;

class AdminController extends Controller{
    
    public Response $response;

    public function __construct() {

        $this->response = new Response();
        $this->setLayout('adminlayout');
    }    

    public function index(Request $request) {
        Application::checkLoggedIn();
        $user_id = $_SESSION['user_id'];
       
        $user = User::getUserById($user_id)[0]; 

        $this->response->setResponseContent($user);

       return $this->render('admin', ['response' => $this->response->getResponseContent()]);
    }

   

    
}