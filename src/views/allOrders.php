
<?php

use src\controllers\OrderController;
use src\models\Product;
use src\models\Customer;


?>

<!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->

<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6><a href="/customer" style="margin-left: 75%; cursor: pointer;"><span class="btn btn-primary">New Order</span></a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
   
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>S/N</th>
            <th>Order</th>
            <th>Customer</th>
            <th>Delivery address</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>S/N</th>
            <th>Order</th>
            <th>Customer</th>
            <th>Delivery address</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
        <div class="success-order" id="order-error" style="width: 100%; line-height: 6px; display: none;"></div>

          <?php 

              $count = 0;
              foreach($response as $key => $value) {
                $count = $count + 1;
                echo '<tr>';
                echo "<td>{$count}</td>";

                $prod_name = Product::getProductByID($value['prod_id'])[0]['prod_title'];
                echo "<td>{$prod_name} ({$value['quantity']}pcs)</td>";
                
                $customer_name = Customer::getCustomerByID($value['customer_id'])[0]['cust_fname']." ". Customer::getCustomerByID($value['customer_id'])[0]['cust_other_names'];
                echo "<td>{$customer_name}</td>";
                if($value['delivery_address'] != '') echo "<td>{$value['delivery_address']}</td>"; else echo "<td>Pick-up option selected</td>";

                $status = OrderController::getOrderStatus($value);
                echo "<td>{$status}</td>";
                
                echo "<td><button class='btn btn-secondary next_status' style='margin-right: 10px' data-order_id='{$value['order_id']}'>Next status</button><a href='/admin/view-order?order_id={$value['order_id']}'><button class='btn btn-secondary'>View</button></a></td>";
                echo '</tr>';
              }          
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
            <!-- /.container-fluid -->
