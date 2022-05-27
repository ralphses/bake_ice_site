<?php
echo '<pre>';
// var_dump($response);
echo '</pre>';
?>

<div class="login-register-area" id="order_form-area">
        <div class="container">
            <div class="row">
             
                <div class="col-lg-6 pt-5 pt-lg-0" style="margin: auto;">
                    <form action="/order" id="order_form" method="POST">
                        <div class="login-form" style="margin-bottom: 30px;">

                        <div class="success-order" id="order_message" style="width: 100%; line-height: 6px; display: none;">
                            <p style="text-align: center;" id="message">This is a message from the order you just placed</p>
                        </div>
                           
                        <h3 class="login-title">ORDER DETAILS</h3>

                            <div class="nice-select order-category" tabindex="0">
                                <span class="current">Select Category</span>
                                <select name="cat_id" id="order-category" class="order-category">
                                    <option value="<?php echo $response['current-category'][0]['cat_id'] ?? '';?>" class="option selected focus"><?php echo $response['current-category'][0]['cat_name'] ?? 'Select Category';?></option>
                                   
                                    <?php
                                        foreach($response['category-list'] as $key => $value) {
                                            if($value['cat_name'] != 'Others') {
                                                echo "<option value='{$value['cat_id']}' class='option'>{$value['cat_name']}</option>";
                                            }
                                            
                                        }
                                    ?>

                                     <option class="others" value="">Others</option>
                                </select>
                               
                                <div class="col-12">
                                    <span class="current">Other Category</span>
                                    <input name="new_cat_name" id="new_cat_name_form" type="text" placeholder="Please specify other category here" style="margin-top: 10px;" readonly>
                                    <p class="order_error" id="cat_name"></p>
                                </div>

                            </div>

                            <div class="nice-select" tabindex="0">
                                <span class="current">Select Product</span>
                                <select name="prod_id" id="prod_select" class="prod_select">
                                    <option value="<?php echo $response['product'][0]['prod_id'] ?? '' ?>" class='option'><?php echo $response['product'][0]['prod_title'] ?? 'Select product' ?></option>";
                                   
                                </select>
                                <div class="col-12">
                                    <span class="current">Other product title</span>
                                    <input type="text" name="new_prod_id" placeholder="Please specify other product title here" style="margin-top: 10px;">
                                    <p class="order_error" id="new_prod_id"></p>
                                </div>
                            </div>
                                    
                            <div class="col-12">
                                <span class="current">Quantity</span>
                                <input type="number" style="margin-top: 10px;" value="<?php echo $response['quantity'] ?? 1; ?>" name="quantity">
                            </div>
                                    
                                <div class="col-md-12">
                                
                                    <label>Product flavour</label>
                                    <input type="text" name="prod_flavor" id="prod_flavor" placeholder="New flavour" value="<?php echo $response['product'][0]['prod_flavor'] ?? ''; ?>">
                                </div>

                                <div class="col-md-12">
                                <label>Product steps</label>
                                    <input type="text" name="prod_steps" id="prod_steps" placeholder="Enter the product design steps here" value="<?php echo $response['product'][0]['prod_steps'] ?? ''; ?>">
                                </div>
                              
                                    <div class="col-md-12">
                                    <label>Dominant Colour</label>
                                        <input name="prod_color" class="prod_color" type="text" placeholder="Prefered dominant Colour (Please enter color name)" style="margin-top: 10px;" value="<?php echo $response['product'][0]['prod_color'] ?? ''; ?>">
                                        <p class="order_error" id="prod_color"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label>What's your Budget</label>
                                        <input type="number" name="budget"placeholder="Enter 0 if your budget is not yet ready">
                                        <p class="order_error"  id="budget"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Expected Delivery Date</label>
                                        <input type="date" name="exp_delivery_date" placeholder="Enter 0 if you don't have budget">
                                        <p class="order_error"  id="exp_delivery_date"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Where do we deliver your cake?</label>
                                        <textarea name="delivery_address" id="delivery_address" placeholder="please enter complete delivery address (for pickup, ignore)"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Other Details</label>
                                        <textarea name="other_details" id="delivery-address" placeholder="Enter all other details and/or requirments not captured above"></textarea>
                                    </div>

                                    <input type="text" name="customer_id" id="" value="<?php echo $response['customer_id'] ?? ''?>" hidden>
                                    
                                    <div class="col-12">
                                        <button class="btn custom-btn md-size" name="place-order" id="place-order" type="submit">Place Order</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                    </div>
                </div></div></div></div>

<