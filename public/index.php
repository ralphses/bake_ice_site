<?php
session_start();

require_once "../vendor/autoload.php";

use src\controllers\AdminController;
use src\controllers\SiteController;
use src\controllers\FormController;
use src\controllers\CategoryController;
use src\controllers\CustomerController;
use src\controllers\GalleryController;
use src\controllers\ProductController;
use src\controllers\OrderController;
use src\controllers\UserController;
use src\utils\Application;


$app = new Application(dirname(__DIR__));

$app->getRouter()->get('/', [SiteController::class, 'index']);
$app->getRouter()->get('/index', [SiteController::class, 'index']);
$app->getRouter()->post('/', [SiteController::class, 'index']);
$app->getRouter()->get('/about', [SiteController::class, 'about']);
$app->getRouter()->get('/category', [SiteController::class, 'category']);
$app->getRouter()->get('/customer', [SiteController::class, 'customer']);
$app->getRouter()->get('/faq', [SiteController::class, 'faq']);
$app->getRouter()->get('/gallary', [SiteController::class, 'gallary']);
$app->getRouter()->get('/contact', [SiteController::class, 'contact']);
$app->getRouter()->get('/product', [SiteController::class, 'product']);

$app->getRouter()->get('/admin', [AdminController::class, 'index']);

$app->getRouter()->get('/admin/all-category', [CategoryController::class, 'allCategory']);
$app->getRouter()->get('/admin/new-category', [CategoryController::class, 'newCategory']);

$app->getRouter()->get('/admin/new-product', [ProductController::class, 'addNewProduct']);
$app->getRouter()->post('/admin/new-product', [ProductController::class, 'addNewProduct']);
$app->getRouter()->post('/admin/publish', [ProductController::class, 'editProductStatus']);
$app->getRouter()->get('/admin/all-product', [ProductController::class, 'allProduct']);
$app->getRouter()->get('/get-product', [ProductController::class, 'getProductForCat']);

$app->getRouter()->post('/mail', [FormController::class, 'sendMail']);
$app->getRouter()->post('/admin/delete', [FormController::class, 'deleteCategory']);
$app->getRouter()->post('/admin/delete-product', [FormController::class, 'deleteProduct']);
$app->getRouter()->post('/formHandler', [FormController::class, 'handleForm']);

$app->getRouter()->post('/new-customer', [CustomerController::class, 'saveNewCustomer']);

$app->getRouter()->get('/order', [OrderController::class, 'order']);
$app->getRouter()->post('/order', [OrderController::class, 'order']);
$app->getRouter()->get('/order-status', [OrderController::class, 'checkOrderStatus']);
$app->getRouter()->post('/order-status', [OrderController::class, 'checkOrderStatus']);
$app->getRouter()->get('/admin/orders', [OrderController::class, 'viewOrders']);
$app->getRouter()->post('/admin/new-status', [OrderController::class, 'changeOrderStatus']);
$app->getRouter()->get('/admin/view-order', [OrderController::class, 'viewOrder']);
$app->getRouter()->get('/admin/get-order', [OrderController::class, 'sortOrder']);
$app->getRouter()->get('/sort-with-date', [OrderController::class, 'getWithDate']);
$app->getRouter()->post('/sort-with-date', [OrderController::class, 'getWithDate']);

$app->getRouter()->get('/admin/view-gallary', [GalleryController::class, 'viewGallery']);
$app->getRouter()->get('/admin/add-gallary', [GalleryController::class, 'addGallery']);
$app->getRouter()->post('/admin/add-gallary', [GalleryController::class, 'addGallery']);
$app->getRouter()->post('/admin/remove-gallary', [GalleryController::class, 'removeGallery']);

$app->getRouter()->post('/admin/add-user', [UserController::class, 'addUser']);
$app->getRouter()->get('/admin/add-user', [UserController::class, 'addUser']);
$app->getRouter()->post('/admin/login', [UserController::class, 'login']);
$app->getRouter()->get('/admin/login', [UserController::class, 'login']);
$app->getRouter()->get('/admin/logout', [UserController::class, 'logout']);

$app->run();