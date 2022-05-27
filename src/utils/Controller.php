<?php

namespace src\utils;

use src\models\Product;
use src\models\Category;
use src\models\Customer;
use src\models\CustomerProduct;
use src\models\Gallery;
use src\models\Order;
use src\models\User;

class Controller {

    public string $layout = 'mainlayout';
    public array $errors = [];

    public array $allForms = [
        'new_cat_form' => Category::class, 
        'new_prod_form' => Product::class,
        'new_customer' => Customer::class,
        'order' => Order::class,
        'customer-product' => CustomerProduct::class,
        'gallery' => Gallery::class,
        'user' => User::class
    ]; 

    protected array $days = [
        'Mon' => 0,
        'Tue' => 0,
        'Wed' => 0,
        'Thu' => 0,
        'Fri' => 0,
        'Sat' => 0,
        'Sun' => 0
    ];

    protected array $weeks = [];
    protected array $monthsNum = [
        '1' => 0,
        '2' => 0,
        '3' => 0,
        '4' => 0,
        '5' => 0,
        '6' => 0,
        '7' => 0,
        '8' => 0,
        '9' => 0,
        '10' => 0,
        '11' => 0,
        '12' => 0
    ];

    protected array $months = [
        '1' => 'Jan',
        '2' => 'Feb',
        '3' => 'Mar',
        '4' => 'Apr',
        '5' => 'May',
        '6' => 'Jun',
        '7' => 'Jul',
        '8' => 'Aug',
        '9' => 'Sep',
        '10' => 'Oct',
        '11' => 'Nov',
        '12' => 'Dec'
    ];

    protected array $newMonthsNum = [
        'Jan' => 0,
        'Feb' => 0,
        'Mar' => 0,
        'Apr' => 0,
        'May' => 0,
        'Jun' => 0,
        'Jul' => 0,
        'Aug' => 0,
        'Sep' => 0,
        'Oct' => 0,
        'Nov' => 0,
        'Dec' => 0
    ];
    


    public function __construct() {
        Application::$app->setController($this);
    }

    protected function getWeeks() {
        $weeks = [];
        for($i = 1; $i < 53; $i++) {
            $weeks[$i] = 0;
        }
        return $weeks;
    }


    public function setLayout($layout) {
        $this->layout = $layout;
    }

    public function render($path, $params = []) {
        return Application::$app->router->renderView($path, $params);
    }

    public static function getImagePath($imageName) {
       $folder = self::getFolderName();

        if(!is_dir('assets/img/images')) {
            mkdir('assets/img/images');
        }
        return 'assets/img/images'.'/'.$folder.'/'.$imageName;
    }


    public static function getFolderName($imageLength = 11) {
        $chars = '1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
        $folder = '';

        for($i = 0; $i < $imageLength; $i++) {
            $index = rand(0, strlen($chars) - 1);
            $folder .= $chars[$index]; 
        }
        return $folder;
    }
}