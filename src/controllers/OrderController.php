<?php 

namespace src\controllers;

use DateTime;
use src\utils\Controller;
use src\utils\Response;
use src\utils\Request;
use src\models\Category;
use src\models\Customer;
use src\models\CustomerProduct;
use src\models\Product;
use src\models\Order;
use src\utils\Application;

class OrderController extends Controller {

    public Response $response;

    public function __construct() {
        $this->response = new Response();
        
    }

    public function sortOrder(Request $request) {

        if($request->isPost()) {
            header('Location: /');
            exit;
        }
        else {
            $currentDateTime = date('Y-m-d H:i:s');
            
            $time = $request->getBody()['time'] ?? false;

            if($time) {
                $thisdata = $this->getData($time, $currentDateTime);
                echo json_encode($thisdata);
            }   
        }
    }

    public function getData($time, $currentDateTime) {
        $data = [];
        $prevTime = date('Y-m-d', strtotime("-{$time}"));
        switch($time) {
            case 'today' : {
                return $this->getFormattedData($currentDateTime, $prevTime);
            }
            case '2days' : {
                for($i = 1; $i <=2; $i++) {
                    $prevT = date('Y-m-d', strtotime("+{$i} day", strtotime($prevTime)));
                    $day = date('D', strtotime(date($prevT)));

                    $data[$day] = $this->getFormattedData($prevT)['count'];
                }
                break;
            }
            case '3days' : {
                for($i = 1; $i <=3; $i++) {
                    $prevT = date('Y-m-d', strtotime("+{$i} day", strtotime($prevTime)));
                    $day = date('D', strtotime(date($prevT)));

                    $data[$day] = $this->getFormattedData($prevT)['count'];
                }
                // var_dump($data);
                break;
            }
            case '7days' : {
                for($i = 1; $i <=7; $i++) {
                    $prevT = date('Y-m-d', strtotime("+{$i} day", strtotime($prevTime)));
                    $day = date('D', strtotime(date($prevT)));

                    $data[$day] = $this->getFormattedData($prevT)['count'];
                }
                // var_dump($data);
                break;
            }

            case '2week' : {
                $dataN = 0;
                $de = true;
                $dataN = 0;
                for($j = 1; $j <= 2; $j++) {
                    for($i = 1; $i <=7; $i++) {
                        $prevT = date('Y-m-d', strtotime("+{$i} day", strtotime($prevTime)));
                        $dataN += $this->getFormattedData($prevT)['count'];
                        if($prevT === date('Y-m-d', strtotime($currentDateTime))) {
                            $de = false;
                            break;
                        }
                        if(!$de) {
                            break;
                        }
                    }
                    $prevTime = $prevT;
                    $data["Week$j"] = $dataN;
                    $dataN =0;
                }
                // var_dump($data);
                break;
            }

            case '1month' : {
                // echo $prevTime;
                $de = true;
                $dataN = 0;
                for($j = 1; $j <= 5; $j++) {
                    for($i = 1; $i <=7; $i++) {
                        $prevT = date('Y-m-d', strtotime("+{$i} day", strtotime($prevTime)));
                        $dataN += $this->getFormattedData($prevT)['count'];
                        if($prevT === date('Y-m-d', strtotime($currentDateTime))) {
                            $de = false;
                            break;
                        }
                        if(!$de) {
                            break;
                        }
                    }
                    $prevTime = $prevT;
                    $data["Week$j"] = $dataN;
                    $dataN =0;
                }
                // var_dump($data);
                break;
            }
            case '3month' : {
                $de = true;
                $dataN = 0;
                for($j = 1; $j <= 3; $j++) {
                    for($i = 1; $i <=31; $i++) {
                        $prevT = date('Y-m-d', strtotime("+{$i} day", strtotime($prevTime)));
                        $dataN += $this->getFormattedData($prevT)['count'];
                        if($prevT === date('Y-m-d', strtotime($currentDateTime) )) {
                            $de = false;
                            break;
                        }
                        if(!$de) {
                            break;
                        }
                    }
                    $prevTime = $prevT;
                    $data[date('M-Y', strtotime($prevT))] = $dataN;
                    $dataN =0;
                }
                // var_dump($data);
                break;
            }
            case '6month' : {
                $de = true;
                $dataN = 0;
                for($j = 1; $j <= 6; $j++) {
                    for($i = 1; $i <=31; $i++) {
                        $prevT = date('Y-m-d', strtotime("+{$i} day", strtotime($prevTime)));
                        $dataN += $this->getFormattedData($prevT)['count'];
                        if($prevT === date('Y-m-d', strtotime($currentDateTime) )) {
                            $de = false;
                            break;
                        }
                        if(!$de) {
                            break;
                        }
                    }
                    $prevTime = $prevT;
                    $data[date('M-Y', strtotime($prevT))] = $dataN;
                    $dataN =0;
                }
                // var_dump($data);
                break;
            }

            case '1year' : {
                $de = true;
                $dataN = 0;
                for($j = 1; $j <= 12; $j++) {
                    for($i = 1; $i <=31; $i++) {
                        $prevT = date('Y-m-d', strtotime("+{$i} day", strtotime($prevTime)));
                        $dataN += $this->getFormattedData($prevT)['count'];
                        if($prevT === date('Y-m-d', strtotime($currentDateTime) )) {
                            $de = false;
                            break;
                        }
                        if(!$de) {
                            break;
                        }
                    }
                    $prevTime = $prevT;
                    $data[date('M-Y', strtotime($prevT))] = $dataN;
                    $dataN =0;
                }
                // var_dump($data);
                break;
            }
        }
        return $data;
    }

    public function getWithDate(Request $request) {
        $start = $request->getBody()['from'];
        $end = $request->getBody()['to'];
        $error = [];

        if($start == "") {
            $error[] = 'Start date is required';
        }

        if($end == "") {
            $error[] = 'End date is required';
        }

        else if(($start > $end)) {
            $error[] = 'Invalid date range';
        }

        if(!empty($error)) {
            $this->response->setResponseContent($error);

            echo json_encode(['status' => false, 'response' => $this->response->getResponseContent()]);
            exit;
        } 

    //    $period = 'W';

       if($this->checkPeriod($start, $end, 'D')[0]) {
        $period = 'D';
    }
       
       else if($this->checkPeriod($start, $end, 'W')[0]) {
           $period = 'W';
       }
        else if($this->checkPeriod($start, $end, 'M')[0]) {
           $period = 'M';
       }

       else if($this->checkPeriod($start, $end, 'Y')[0]) {
           $period = 'Y';
        }

        if($period == 'D') {
            $this->data[] = $this->getFormattedData($start)['data'];
            echo json_encode($this->data[count($this->data) - 1]);
            exit;
        }

        if($period == 'W') {
            do{
                $format = date('Y-m-', strtotime($start)).'%';
                $this->data[] = Order::getRealBoundedOrders($format, $start, $end);
                $start = date('Y-m-d', strtotime("+1day", strtotime($start)));
                
            } while(!($start > $end));
            echo json_encode($this->data[count($this->data) - 2]);
            exit;
        }
        
        if($period == 'M') {
            do{
                $format = date('Y-m-', strtotime($start)).'%';
                $this->data[] = Order::getRealBoundedOrders($format, $start, $end);
                $start = date('Y-m-d', strtotime("+1day", strtotime($start)));
                
            } while(!($start > $end));
            echo json_encode($this->data[count($this->data) - 2]);
            exit;
        }

        else {
            $this->response->setResponseContent(['Not available']);

            echo json_encode(['status' => false, 'response' => $this->response->getResponseContent()]);
            exit;
        }
        


        // $data = Order::getRealBoundedOrders($start, $end);

        // if($period == 'W') {
        //     $thisCount = 0;
        //     for($i = 0; $i < count($data); $i++) {
                
        //     }
        // }
             


        // var_dump($data);
    }

    public function checkPeriod($start, $end = '', $period) {
        return [(date("$period", strtotime(date($start))) == date("$period", strtotime(date($end)))),  date("$period", strtotime(date($end)))];
    }
    public function getFormattedData($prevTime) {

        $thisTime = date('Y-m-d', strtotime($prevTime));
        $format = $thisTime.'%' ;

        $data = Order::getBoundedOrders($format);
        return ['count' => count($data), 'data' => $data ];
    }

    public function viewOrders(Request $request) {
        Application::checkLoggedIn();
        $this->setLayout('adminlayout');

        $allOrders = Order::getAllOrders();
        $customerOrder = Order::getAllCustomerOrders();

        $allOrders = array_merge($allOrders, $customerOrder);
        
        // echo '<pre>'; var_dump($customer_name); echo '</pre>'; exit;
        $this->response->setResponseContent($allOrders);

        return $this->render('allOrders', ['response' => $this->response->getResponseContent()]);
    }

    public function viewOrder(Request $request) {

        if(!$request->isGet() or !$request->getBody()['order_id']) {
            header('Location: /admin');
            exit;
        }
        else {
            $this->setLayout('adminlayout');

            $finalOrder = [];

            $thisOrder = Order::getOrderById($request->getBody()['order_id'])[0];
            $product = Product::getProductByID($thisOrder['prod_id']) ?? CustomerProduct::getProductByID($thisOrder['cust_prod']) ?? false;

            //Get the category of this order
            if($thisOrder['cust_prod']) {
                $cust_prod = CustomerProduct::getProductByID($thisOrder['cust_prod'])[0];
                unset($cust_prod['id']);

                $finalOrder = array_merge($cust_prod);
                // echo '<pre>'; var_dump($finalOrder); echo '</pre>';;
               
            }
            else {

                $finalOrder['cat_name'] = Category::getOneCategory($product[0]['cat_id'])[0]['cat_name'];
                $finalOrder['prod_title'] = $product[0]['prod_title']; 
                $finalOrder['steps'] = $product[0]['prod_steps'];
                $finalOrder['prod_flavor'] = $product[0]['prod_flavor'];
                $finalOrder['color'] = $product[0]['prod_color'];

                // echo '<pre>'; var_dump($finalOrder); echo '</pre>';;

            }

            $finalOrder = self::setUpOrder($finalOrder, $thisOrder);

            $this->response->setResponseContent($finalOrder);
            return $this->render('viewOrder', ['response' => $this->response->getResponseContent()]);
        }
    }

    public static function setUpOrder($finalOrder, $thisOrder) {

        $finalOrder['quantity'] = $thisOrder['quantity'];
        $finalOrder['budget'] = $thisOrder['budget'];
        $finalOrder['delivery_address'] = ($thisOrder['delivery_address'] != '') ? $thisOrder['delivery_address'] : 'Pick-up option selected';
        // $finalOrder['date_initiated'] = $thisOrder['date_initiated'];
        $finalOrder['exp_delivery_date'] = $thisOrder['exp_delivery_date'];
        $finalOrder['other_details'] = $thisOrder['other_details'];
        $finalOrder['order_no'] = $thisOrder['order_no'];
        $finalOrder['order_status'] = self::getOrderStatus($thisOrder);
        
        $customer = Customer::getCustomerByID($thisOrder['customer_id']);
        $finalOrder['customer'] = $customer[0]['cust_fname']. " ".$customer[0]['cust_other_names']. "({$customer[0]['cust_phone']})";

        return $finalOrder;
    }

    public static function getOrderStatus($order) {

        switch($order['order_status']) {
            case 0: 
                return 'Initial Stage';
                break;
            case 1:
                return 'In progress';
                break;
            case 2:
                return 'Completed';
                break;
            case 3:
                return 'Delivered';
                break;
            default:
                return 'Unknown Status';

        }

    }

    public function changeOrderStatus(Request $request) {

        if(!$request->isPost()) {
            header('Location: /admin');
            exit;
        }
        else {
            $order_id = $request->getBody()['order_id'];

            $thisOrder = Order::getOrderById($order_id) ?? false;

            if($thisOrder and $thisOrder[0]['order_status'] < 3 and Order::updateOrderStatus($order_id, $thisOrder[0]['order_status'] + 1)) {
                $this->response->setResponseContent(['Status Changed successfully!']);

                echo json_encode(['status' => true, 'response' => $this->response->getResponseContent()]);
                exit;
            }
            else {
                $this->response->setResponseContent(['Product already delivered!']);

                echo json_encode(['status' => false, 'response' => $this->response->getResponseContent()]);
                exit;   
            }

        }      
    }

    public function order(Request $request) {

        $thisResponse = [];

        if($request->isPost()) {

            //Create new order object
            $order = new $this->allForms['order']();

            //Get the input form from the user
            $body = $request->getBody();

            $cat_id = $body['cat_id'] ?? false;
            $new_prod_id = $body['new_prod_id'] ?? false;
            $dec = true;

            //Check whether order product is system defined
            if($body['cat_id'] and $body['prod_id'] and !$new_prod_id) {

                unset($body['new_cat_name']);
                unset($body['new_prod_id']);
                unset($body['prod_flavor']);
                unset($body['prod_steps']);
                unset($body['place-order']);
                unset($body['cat_id']);

                $order->loadData($body);
            }

            if($new_prod_id) {

                $cat_name = ($cat_id) ? Category::getOneCategory($cat_id)[0]['cat_name'] : $body['new_cat_name'];
    
                $dec = false;
                unset($body['prod_id']);
                

                //Get inputs for customer defined product
                $customer_product_body = [

                    'prod_title' => $new_prod_id,
                    'cat_name' => $cat_name,
                    'prod_flavor' => $body['prod_flavor'],
                    'color' => $body['prod_color'],
                    'steps' => $body['prod_steps']
                ];

                //Create a new Customer defined product object
                $customer_product = new $this->allForms['customer-product']();

                //Initialize the fields of the of the object
                $customer_product->loadData($customer_product_body);
                
                //Validate the user inputed values
                if(!$customer_product->validate()) {

                    //Set error messages as response content
                    $this->response->setResponseContent($customer_product->errors);
                    echo json_encode(['status' => false, 'response' => $this->response->getResponseContent()]);
                    exit;
                }
                else {
                    //Store to database
                    $customer_product->saveToDataBase();

                    //Get the ID of the just stored record and use it as a reference in the order table
                    $body['cust_prod'] = $customer_product->getLastInsertedProductId();
                }

                //Initialize the order fields
                $order->loadData($body);
            }

            else if(!$cat_id) {

                $order->errors['new_prod_id'] = 'Please specify a product title';
                
                $this->response->setResponseContent($order->errors);
                echo json_encode(['status' => false, 'response' => $this->response->getResponseContent()]);
                exit;
            }

            if(!$order->validate()) {

                $this->response->setResponseContent($order->errors);
                echo json_encode(['status' => false, 'response' => $this->response->getResponseContent()]);
                exit;
             }

             else {
                 $order->order_no = $order->getOrderNo($request->getBody()['customer_id']);
                 $order->saveOrder($dec);

                 $this->response->setResponseContent(['response' => 'Order placed successfully!']);
                 echo json_encode(['status' => true, $this->response->getResponseContent()]);
                 exit;
             }
           
        }

        if($request->isGet()) {

            $prod_id = $request->getBody()['prod_id'] ?? false;
            $customer_id = $request->getBody()['customer_id'] ?? false;

            if($customer_id) {
                $thisResponse['customer_id'] = $customer_id;
            }

            $thisResponse['category-list'] = Category::getAllCategory('cat_id', 'cat_name');
            
            if($prod_id) {
                $product = Product::getProductByID($prod_id);

                $thisResponse['product'] = $product;
                $thisResponse['quantity'] = $request->getBody()['prod_qty'];
                $thisResponse['current-category'] =  Category::getOneCategory($product[0]['cat_id']);
            }

            $this->response->setResponseContent($thisResponse);
            return $this->render('order', ['response' => $this->response->getResponseContent()]);
                
        }
    }

    public function checkOrderStatus() {
        
        return $this->render('orderStatus');
    }


}
      