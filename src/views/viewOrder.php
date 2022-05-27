
<?php 

?>

<div class="card shadow mb-4">
  
  <div class="card-body" style="width: 80%; margin: auto;">
    <div class="table-responsive" id="dataTable">
   
      <table class="table d-print"  width="100%" cellspacing="0";">

        <thead>
          <tr>
            <th colspan="1"><img width="100" src="../assets/img/logo/logo.png" alt="img"></th>
            <th colspan="4"><p style="text-align: left; font-size: 40px;">Bake and Ice Bakery Limited</p></th>
          </tr>
          <tr>
            <th colspan="5"><p style="text-align: center; font-size: 25px; color: #243a6e;">Customer Order details</p></th>
          </tr>
        </thead>
 
        <tbody>
        <div class="success-order" id="allcat-error" style="width: 100%; line-height: 6px; display: none;"></div>
        <tr style="background-color: lightgray;">
            <td colspan="2"><h3>Product Details</h3></td>
            <td colspan="3"><h3>Order Logistics</h3></td>
        </tr>

        <tr>
          <td colspan="3">
            <tr>
              <td colspan="1">Category</td>
              <td colspan="1"><P><?php echo $response['cat_name'] ?></P></td>

              <td colspan="3" rowspan="19" style="background-color: lightgrey;">
                <h4><p>Customer Details</p></h4>
                  <div class="row">
                      <div class="col-md-4">
                          <p>Name & Phone:</p>
                      </div>
                      <div class="col-md-7">
                        <P><?php echo $response['customer'] ?></P>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-4">
                          <p>Budget:</p>
                      </div>
                      <div class="col-md-7">
                        <P><?php echo $response['budget'] ?></P>
                      </div>
                  </div>

                  <h4 style="margin-top: 35px;"><p>Shipping Details</p></h4>
                  <div class="row">
                      <div class="col-md-4">
                          <p>Delivery Address</p>
                      </div>
                      <div class="col-md-7">
                        <P><?php echo $response['delivery_address'] ?></P>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-4">
                          <p>Expected Delivery Date</p>
                      </div>
                      <div class="col-md-7">
                        <P><?php echo $response['exp_delivery_date'] ?></P>
                      </div>
                  </div>

                  <h4 style="margin-top: 35px;"><p>Payment Details</p></h4>
                  <div class="row">
                      <div class="col-md-4">
                          <p>Method</p>
                      </div>
                      <div class="col-md-7">
                        <P>Payment on delivery</P>
                      </div>
                  </div>

              </td>
            </tr>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <tr>
              <td colspan="1">Product name:</td>
              <td colspan="1"><P><?php echo $response['prod_title'] ?></P></td>              
            </tr>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <tr>
              <td colspan="1">Quantity:</td>
              <td colspan="1"><P><?php echo $response['quantity'] ?></P></td>              
            </tr>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <tr>
              <td colspan="1">Product Flavour:</td>
              <td colspan="1"><P><?php echo $response['prod_flavor'] ?></P></td>              
            </tr>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <tr>
              <td colspan="1">Product Design Steps:</td>
              <td colspan="1"><P><?php echo $response['steps'] ?></P></td>              
            </tr>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <tr>
              <td colspan="1">Product Dominant Colour:</td>
              <td colspan="1"> <P><?php echo $response['color'] ?></P></td>              
            </tr>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <tr>
              <td colspan="1">Date initiated:</td>
              <td colspan="1"> <P><?php echo $response['date_initiated'] ?></P></td>              
            </tr>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <tr>
              <td colspan="1">Order No:</td>
              <td colspan="1"><P><?php echo $response['order_no'] ?></P></td>              
            </tr>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <tr>
              <td colspan="1">Order status:</td>
              <td colspan="1"><P><?php echo $response['order_status'] ?></P></td>              
            </tr>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <tr>
              <td colspan="1">Other Information</td>
              <td colspan="1"><P><?php echo $response['other_details'] ?></P></td>              
            </tr>
          </td>
        </tr>
       
        </tbody>
      </table>
      <div style="margin-right: 20px;">
                            <button style="float: right;" class="btn btn-primary" onclick="printDiv()">Print Order</button>
                    </div>


      <div>
                            <a href="/admin/orders" ><button class="btn btn-primary">Back to Orders</button></a>
                    </div>

                   
    </div>
  </div>
</div>

<script>

  document.getElementById('print').addEventlistener('click', printDiv);

		function printDiv() {
			var divContents = document.getElementById("dataTable").innerHTML;
      
			var a = window.open('', '', 'height=500, width=500');
			a.document.write('<html>');
			a.document.write('<body style="margin: 30px;">');
			a.document.write(divContents);
			a.document.write('</body></html>');
			a.document.close();
			a.print();
		}
	</script>

   