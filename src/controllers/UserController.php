<?php 

namespace src\controllers;

use src\models\User;
use src\utils\Controller;
use src\utils\Request;
use src\utils\Response;

class UserController extends Controller {
    
    public Response $response;

    public function __construct() {
        $this->setLayout('adminlayout');
        $this->response = new Response();
    }

    public function addUser(Request $request) {

        if(!$request->isPost()) {
            return $this->render('register');
        }

        else {

            $user = new $this->allForms['user']();

            $user->loadData($request->getBody());

            if(!$user->validate()) {
                
                echo json_encode(['status' => false, 'message' => $user->errors]);
                exit;
            }
            else if(User::getUserByEmail($request->getBody()['user_email']) < 1 and $user->saveUser()) {

                echo json_encode(['status' => true, 'message' => 'User added successfully!']);
                exit;

            }
            else {
                echo json_encode(['status' => false, 'message' => 'User with '.$request->getBody()['user_email'].' already exists!']);
                exit;

            }
            
        }
       
    }

    public function login(Request $request) {
        if(!$request->isPost()) {
            return $this->render('login');
        }

        $password = $request->getBody()['user_password'] ?? false;
        $email = $request->getBody()['user_email'] ?? false;

        if(!$password and !$email) {
            echo json_encode(['status' => false, 'message' => 'Email address or password not provided']);
            exit;
        }
        if($email and !filter_var($email, FILTER_VALIDATE_EMAIL) or !filter_var($email, FILTER_SANITIZE_EMAIL)) {
            echo json_encode(['status' => false, 'message' => 'Invalid email address']);
            exit;
        }

        if($email) {
            $user = User::getUserByEmail($email);
            if(!$user) {
                echo json_encode(['status' => false, 'message' => 'User with this email does not exist!']);
                exit;
            }
            // var_dump($user); exit;
            if(!password_verify($password, $user[0]['user_password'])) {
                echo json_encode(['status' => false, 'message' => 'Login failed! Check details']);
                exit;
            }
            else {
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user[0]['user_id'];
                header('Location: /admin');
            }

        }
    }

    public function logout() {
        $_SESSION['logged_in'] = false;
        $_SESSION['user_id'] = false;

        header('Location: /');
        exit;
    }
}