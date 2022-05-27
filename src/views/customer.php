<?php
    $prod_id = $response[0];
    $qty = $response[1];
?>

<div class="login-register-area" id="customer-form-area">
        <div class="container">
            <div class="row">
             
                <div class="col-lg-6 pt-5 pt-lg-0" style="margin: auto;">
                    <form action="/new-customer" method="POST" id="customer-form">
                        <div class="login-form" style="margin-bottom: 30px;">
                            <h3 class="login-title">CUSTOMER INFORMATION</h3>
                            <div class="row">
                            <div class="col-12">
                                    <label>First Name</label>
                                    <input type="text" placeholder="Your First Name Here" name="cust_fname" >
                                    <p class="cust_error cust_error1" id="cust_fname"></p>
                                </div>
                                <div class="col-12">
                                    <label>Other Name(s)</label>
                                    <input type="text" placeholder="Other names" name="cust_other_names" >
                                    <p class="cust_error cust_error1" id="cust_other_names"></p>
                                </div>
                                <div class="col-12">
                                    <label>Email Address</label>
                                    <input type="text" placeholder="user@example.com" name="cust_email" >
                                    <p class="cust_error cust_error1" id="cust_email"></p>
                                </div>
                                <div class="col-12">
                                    <label>Phone Number</label>
                                    <input type="tel" placeholder="e.g 09012345678" name="cust_phone" >
                                    <p class="cust_error cust_error1" id="cust_phone"></p>
                                </div>
                                <div class="col-12">
                                        <button class="btn custom-btn md-size" name="customer-submit" data-prod_id ='<?php echo $prod_id; ?>' data-qty ='<?php echo $qty; ?>' id="customer-submit" style="margin-bottom: 20px;">Submit</button>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
