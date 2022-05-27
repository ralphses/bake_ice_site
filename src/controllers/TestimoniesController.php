<?php 

namespace src\controllers;

use src\utils\Controller;
use src\utils\Response;

class TestimoniesController extends Controller {

    public Response $response;

    public function __construct() {
        $this->response = new Response();
    }

    
}