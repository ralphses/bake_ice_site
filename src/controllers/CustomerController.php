<?php

namespace src\controllers;

use src\utils\Controller;
use src\utils\Request;
use src\utils\Response;
use src\models\Customer;


class CustomerController extends Controller {

    public Response $response;

    public function __construct() {
        $this->response = new Response();      
    }

    public function saveNewCustomer(Request $request) {

        if($request->isGet()) {
            header('Location: /');
        }
        if($request->isPost()) {
            $customer = new $this->allForms['new_customer']();
            $customer->loadData($request->getBody());

            if(!$customer->validate()) {              
                $this->response->setResponseContent($customer->errors);
                echo json_encode(['status' => false, 'response' => $this->response->getResponseContent()]);
            }
            else {
                $thisResponse = [];
             
                if(!Customer::getCustomerByEmail($request->getBody()['cust_email'])) {
                    $customer->saveCustomer();

                    $thisResponse['customer_id'] = Customer::getCustomerByEmail($request->getBody()['cust_email'])[0]['customer_id'];

                    // echo '<pre>'; var_dump($custId); echo '</pre>'; exit;

                    //Prepare response to set up order page
                    $this->response->setResponseContent($thisResponse);
                    echo json_encode(['status' => true, 'response' => $this->response->getResponseContent()]);
                }
                
                else {
                    // ["{$request->getBody()['cust_email']} already exist!"]
                    $thisResponse['customer_id'] = Customer::getCustomerByEmail($request->getBody()['cust_email'])[0]['customer_id'];

                    $this->response->setResponseContent($thisResponse);
                    echo json_encode(['status' => true, 'response' => $this->response->getResponseContent()]);
                    
                }
            }
        }
    }

    public function customer(Request $request) {
        
    }

}