<?php

namespace src\controllers;

use src\models\Category;
use src\models\Gallery;
use src\models\Product;
use src\utils\Controller;
use src\utils\Request;
use src\utils\Response;

class SiteController extends Controller{

    public Response $response;

    public function __construct() {
        $this->response = new Response();
    }

    public function index(Request $request) {

        $allProducts = Product::getAllProduct();
        $this->response->setResponseContent($allProducts);

        return $this->render('index', ['response' => $this->response]);
    }

    public function about() {

        $allProducts = Product::getAllProduct();
        $this->response->setResponseContent($allProducts);

        return $this->render('about', ['response' => $this->response]);
    }

    public function category(Request $request) {
        $cat_id = $request->getBody()['cat_id'] ?? false;
     
        if($cat_id) {

            $products = Product::getProductByCategory($request->getBody()['cat_id']) ?? false;
            $cat_name = Category::getOneCategory($request->getBody()['cat_id'])[0]['cat_name'] ?? false;
            $response = ['type' => $cat_name, 'products' => $products] ?? false;
            $this->response->setResponseContent($response);
            return $this->render('category', ['response' => $this->response]);
        }
        else {
            $products = Product::getAllProduct();
            $response = ['type' => 'All Products', 'products' => $products];
            $this->response->setResponseContent($response);
          
            return $this->render('category', ['response' => $this->response]);
        }
    }

    public function customer(Request $request) {
      
        $prod_id = $request->getBody()['prod_id'] ?? false;
        $prod_qty = $request->getBody()['prod_qty'] ?? false;

        $this->response->setResponseContent([$prod_id, $prod_qty]);
        return $this->render('customer', ['response' => $this->response->getResponseContent()]);
    }
    public function gallary(Request $request) {

        $galleryImages = Gallery::getAllGalleryImages();
        return $this->render('gallary', ['status' => true, 'response' => $galleryImages]);
    }

    public function product(Request $request) {

        $prod_id = $request->getBody()['prod_id'] ?? false;

        if($prod_id) {
            $product =Product::getProductByID($prod_id);
            $this->response->setResponseContent($product);

            return $this->render('product', ['response' => $this->response]);
        }
        else {
            header("Location: /category");
        }       
    }

    public function admin() {
        return $this->render('admin');
    }

    public function contact() {
        return $this->render('contact');
    }

    public function faq() {
        return $this->render('faq');
    }
}