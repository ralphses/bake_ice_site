<?php

namespace src\controllers;

use src\utils\Request;
use src\utils\Response;
use src\utils\Controller;
use src\models\Category;
use src\models\Product;
use src\utils\Application;

class ProductController extends Controller {

    public function __construct() {
        $this->setLayout('adminlayout');
        $this->response = new Response();
    }  

    /**
     * For adding viewing new Product page as well as adding new Product record
     * to the database
     */
    public function addNewProduct(Request $request) {

        Application::checkLoggedIn();

        $prod_id = $request->getBody()['prod_id'] ?? '';
    
        //Used for Editing a product
        if($request->isGet() and $prod_id != '') {
            $product = Product::getProductByID($prod_id);

            $this->response->setResponseContent($product[0]);
       
            $allImg['cover images'] = ProductController::getCoverImages($product[0]['prod_image_other']);
           

            $this->response->addSomething($allImg);
            return $this->render('editProduct', ['response' => $this->response]);
            
        }


        //Used for only viewing the form
        if($request->isGet()) {
            $allCategory = Category::getAllCategory();
            $this->response->setResponseContent($allCategory);
    
            return $this->render('addProduct', ['response' => $this->response]);
        }

        //For form submission
        if($request->isPost()) {

            $prod_id = $request->getBody()['prod_id'] ?? '';

            //Create this Product Model
            $model = new $this->allForms[Request::getFormName()]();
            $model->prod_image_main =' ';
            
            //load data from the request into the object
            $model->loadData($request->getBody());
            // var_dump($_FILES); exit;
            if($prod_id) {
                if($_FILES['prod_image_main']['name'] != ""){
                    $model->prod_image_main = $_FILES['prod_image_main']['name'];
                }
                if($_FILES['other_image']['name'][0] != ""){
                    $imageResults = $this->getImagePaths();

                    $finalOtherImagePath = $imageResults['finalOtherImagePath'];
                    $model->prod_image_other = $finalOtherImagePath ?? '';
                }
                else {
                    $model->prod_image_main = Product::getProductImages($prod_id)[1][0]['prod_image_main'];
                    $model->prod_image_other = Product::getProductImages($prod_id)[1][0]['prod_image_other'];
                }
                
            }

            else if($_FILES['prod_image_main']['name'] === '' and !$prod_id) {
                $model->errors['prod_image_main'][] = 'Cover Image is required';
            }

            //Check Whether all required input fields are valid and provided
            if(!$model->validate()) {

                $thisResponse = [];
                foreach($model->errors as $key => $value) {
                    $thisResponse[] = $value;
                }
                $this->response->setResponseContent($model->errors);
                echo json_encode(['status' => false, 'response' => $this->response->getResponseContent()]);
            }

            else {
                //Get Product id if present

                //Check whether this new product exists and Save to Database
                if ($model->getProduct() === 0 and $prod_id === '') {

                    $imageResults = $this->getImagePaths();

                    $mainImagePath =  $imageResults['mainImagePath'];;
                    $finalOtherImagePath = $imageResults['finalOtherImagePath'];

                    $model->prod_image_main =  $mainImagePath;
                    $model->prod_image_other = $finalOtherImagePath ?? '';
                   

                    if($model->saveToDatabase()) {

                        //Set response message
                        $this->response->setResponseContent(['Product Added Successfully!']);

                        //Update the category to reflect the added product
                        $newValue = Category::categoryTotalProduct($model->cat_id)[0]['total_product'] +1;
                        Category::updateCategory($model->cat_id, ['total_product' => $newValue]);
    
                        //Send response to the client
                        echo json_encode(['status' => true, 'response' => $this->response->getResponseContent()]);
                        
                    }
                        
                }
                /**
                 * For updating a particular product with prod_id defined
                 */
                else if(!($prod_id == "")) {

                    $model->updateProduct($request->getBody()['prod_id'], $model->trimModel());
             
                    $this->response->setResponseContent(['Product Updated Successfully!']);
                    echo json_encode(['status' => true, 'response' => $this->response->getResponseContent()]);
                }
                /**
                 * Product already exists
                 */
                else {
                    $this->response->setResponseContent(["Product with the title {$model->prod_title} already exists"]);
                    echo json_encode(['status' => true, 'response' => $this->response->getResponseContent()]);
                }
            }
        
        }
    }
    public function getProductForCat(Request $request){
        $cat_id = $request->getBody()['cat_id'];
        
        $this->response->setResponseContent(Product::getProductByCategory($cat_id));
        echo json_encode(['status' => true, 'response' => $this->response->getResponseContent()]);
    }

    public function editProductStatus(Request $request) {

        if(Product::editProductStatus($request->getBody()['prod_id'], $request->getBody()['action']) > 0){
            $this->response->setResponseContent(["Operation Successful!"]);
            echo json_encode(['status' => true, 'message' => $this->response->getResponseContent()]);
        }

    }

  
    public function getImagePaths() {

        $mainImagePath = '';
        $finalOtherImagePath = '';

        $img = $_FILES['prod_image_main'];
            
            if($img and $img['tmp_name']) {
                $mainImagePath = self::getImagePath($img['name']);

                if(!is_dir($mainImagePath)) {
                    mkdir(dirname($mainImagePath));
                }
                move_uploaded_file($img['tmp_name'], $mainImagePath);
            }

            $otherImg = $_FILES['other_image'] ?? false;
          
            if($otherImg and $otherImg['tmp_name'][0]) {

                //An array of image paths as keys and tmp_name as values
                $allOtherImages = [];
                $allOtherImages = array_combine(array_values($otherImg['name']), array_values($otherImg['tmp_name']));

                $allOtherImageNames = array_keys($allOtherImages); 
                $allOtherTempImagePaths = array_values($allOtherImages); 

                //Create unique file paths for each image
                for ($i = 0; $i < count($allOtherImageNames); $i++) {

                    $allOtherImageNames[$i] = self::getImagePath($allOtherImageNames[$i]);
                    mkdir(dirname($allOtherImageNames[$i]));
                    move_uploaded_file($allOtherTempImagePaths[$i], $allOtherImageNames[$i]);
                }

                $finalOtherImagePath = implode('|', $allOtherImageNames);
            }
            return ['mainImagePath' => $mainImagePath, 'finalOtherImagePath' => $finalOtherImagePath];
           
    }

    /**
     * View all products in this category
     */
    public function allProduct(Request $request) {
        Application::checkLoggedIn();
        $allProduct = Product::getAllProduct();
        $this->response->setResponseContent($allProduct);

        return $this->render('allProduct', ['response' => $this->response]);
    }


    public static function getCoverImages($allImages) {
        $imgs = [];
        if(strpos($allImages, '|')) {
            $imgs = explode('|', $allImages);
            return $imgs;
        }
        $imgs[] = $allImages;
        return $imgs;
    }
}

