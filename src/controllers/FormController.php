<?php

namespace src\controllers;

use src\utils\Controller;
use src\utils\Request;
use src\models\Category;
use src\models\Product;

class FormController extends Controller {
    
    public function handleForm(Request $request) {

        $model = new $this->allForms[Request::getFormName()]();
        if($request->isPost()) {
            $model->loadData($request->getBody());

            
            if(!$model->validate()) {
                echo json_encode([$model->errors][0]);
            }
            else {

                if($model->getCategory() == 0 and $request->getBody()['xxxx']==''){
                    $model->saveToDatabase();
                    echo json_encode(['status' => true, 'message' => 'Category Added Successfully!']);

                }
                else {
                   
                    if($request->getBody()['xxxx']) {
                        Category::updateCategory($request->getBody()['xxxx'], ['cat_name' => $request->getBody()['cat_name'], 'cat_desc' => $request->getBody()['cat_desc']]);
                        echo json_encode(['status' => true, 'message' => 'Category Updated Successfully!']);
                    }
                    else {
                        echo json_encode(['status' => false, 'message' => 'Category name already exist']);
                    }
                    
                }               
            }
        }
       
    }

    public function deleteCategory(Request $request) {
       if($request->getBody()['id'] and Category::getOneCategory($request->getBody()['id'])) {
           Category::deleteCategory($request->getBody()['id']);
           echo json_encode(['status' => true, 'message' => 'Item Deleted Successfully!']);
       }
       else {
        echo json_encode(['status' => false, 'message' => 'Oops! Item could not be deleted!']);
       }
    }  

    public function deleteProduct(Request $request) {
        $prod = Product::getProductByID($request->getBody()['prod_id']);
        $newValue = Category::categoryTotalProduct($prod[0]['cat_id'])[0]['total_product'];
        
        //Update the category to reflect the added product
        Category::updateCategory($prod[0]['cat_id'], ['total_product' => ($newValue -1)]);

        if($request->getBody()['prod_id'] and Product::getProductByID($request->getBody()['prod_id'])) {
            Product::deleteProduct($request->getBody()['prod_id']);
            echo json_encode(['status' => true, 'message' => 'Item Deleted Successfully!']);
        }
        else {
         echo json_encode(['status' => false, 'message' => 'Oops! Item could not be deleted!']);
        }
     } 
     
     public function sendMail(Request $request) {

        if($request->isPost()) {
            $to = "email@example.com";
            $from = $request->getBody()['email']; 
            $full_name = $request->getBody()['full_name'];
            $subject = $request->getBody()['subject'];
            $msg = $request->getBody()['message'];

            $message = $full_name. ' wrote the following: '. "\n\n". $msg;
            $headers = "From:" . $from;

            if(mail($to,$subject,$message,$headers))
                echo json_encode("Mail Sent. Thank you " . $full_name . ", we will contact you shortly.");
            else
                echo "Mail Sent. Thank you " . $full_name . ", we will contact you shortly.";
        
        }
       
     }
}