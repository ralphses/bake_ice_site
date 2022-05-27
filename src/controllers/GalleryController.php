<?php 

namespace src\controllers;

use src\models\Gallery;
use src\utils\Application;
use src\utils\Controller;
use src\utils\Request;
use src\utils\Response;

class GalleryController extends Controller {
    
    public Response $response;


    public function __construct() {
        $this->setLayout('adminlayout');
        $this->response = new Response();
    }

    public function addGallery(Request $request) {

        Application::checkLoggedIn();

        if($request->isGet()) {

            return $this->render('addImageGallery');
        }
        else {

            $body = $request->getBody();

            $gallery = new $this->allForms['gallery']();

            $imageNames = $_FILES['image']['name'];
            $tmpPaths = $_FILES['image']['tmp_name'];

            if(!$tmpPaths[0]) {
                $body['image'] = false;

                $gallery->loadData($body);

                if(!$gallery->validate()) {
                    $this->response->setResponseContent($gallery->errors);
                    
                    echo json_encode(['status' => false, 'message' =>$gallery->errors['image'][0]]);
                    exit;
                }
            }
            else {

                if(!is_dir('assets/img/gallery images')) {
                    mkdir('assets/img/gallery images');
                }

                for($i = 0; $i < count($imageNames); $i++) {
                    $path = 'assets/img/gallery images/'.self::getFolderName(4).$imageNames[$i];
                    move_uploaded_file($tmpPaths[$i],  $path);
                    $body['image'] =  $path;

                    $gallery->loadData($body);

                        $gallery->saveGallery();
                        
                    }     
                    $this->response->setResponseContent(['Image uploaded successfully!']);
        
                        echo json_encode(['status' => true, 'message' => $this->response->getResponseContent()]);
                        exit;     
            }
        }

    }

    
    public function viewGallery(Request $request) {

        Application::checkLoggedIn();

        $this->response->setResponseContent(Gallery::getAllGalleryImages());
        return $this->render('viewGalleryImages', ['response' => $this->response->getResponseContent()]);
    
    }

    public function removeGallery(Request $request) {

        $id = $_GET['id'] ?? false;

        $path = Gallery::getGalleryById($id)[0]['image'];

        if(file_exists($path)){
            unlink($path);  
        }


        if($id and Gallery::getGalleryById($id) and Gallery::deleteGallery($id)) {
            echo json_encode(['status' => true, 'message' => "Image deleted successfully!"]);
            exit;
        }
        else {
            echo json_encode(['status' => false, 'message' => "Image could not be deleted!"]);
            exit;
        }


       
    }
}

