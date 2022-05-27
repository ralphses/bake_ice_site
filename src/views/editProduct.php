<?php

use src\models\Category;

$category = Category::getAllCategory();
$cat_name = Category::getOneCategory($response->getResponseContent()['cat_id'])[0]['cat_name'] ?? '';

?>
<div class="login-register-area">
        <div class="container">
            <div class="row">
             
                <div class="col-lg-6 pt-5 pt-lg-0" style="margin: auto;">
                    <form action="/admin/new-product" id="prod_form" method="POST" enctype="multipart/form-data">
                    <input type="text" name="form_name" value="new_prod_form" hidden>
                    <input type="text" name="prod_id" value="<?php echo $response->getResponseContent()['prod_id'];?>" hidden>
                        <div class="login-form">
                            <h3 class="login-title">ADD NEW CAKE PRODUCT</h3>
                            <div class="error" id="pd-error" style="width: 100%; line-height: 6px; display: none;"></div>
                            <div class="row">
                                <p class="prod_error" >Items marked cannot be left empty</p>
                            <div class="col-12">
                            
                                <label>Category<span>*</span></label>
                                <select name="cat_id" style="margin-bottom: 0px" >
                                    <option value="<?php if($cat_name != '') {echo $response->getResponseContent()['cat_id'] ?? '';}?>"><?php if($cat_name != '') {echo Category::getOneCategory($response->getResponseContent()['cat_id'])[0]['cat_name'];} else {
                                        echo  'Select Category';
                                    }?></option>
                                    <?php foreach($category as $key => $value): ?>
                                        <?php
                                            $catName = $value['cat_name'];
                                            $catID = $value['cat_id'];
                                            echo " <option value='{$catID}'>{$catName}</option>"
                                        ?>
                                    <?php endforeach;?>
                                </select>
                                <p class="prod_error prod_error1" id="cat_id"></p>
                                   
                                    <input type="text" name="new_cat_id" id="new-cat-id" placeholder="New category here">
                            </div>
                            <div class="col-12">
                                    <label>Title<span>*</span></label>
                                    <input type="text" name="prod_title" value="<?php echo $response->getResponseContent()['prod_title'] ?? '';?>" placeholder="Cake title here" style="margin-bottom: 0px" >
                                    <p class="prod_error prod_error1" id="prod_title"></p>
                                </div>
                                <div class="col-12">
                                    <label>Price<span>*</span></label>
                                    <input type="number" name="prod_price" value="<?php echo $response->getResponseContent()['prod_price'] ?? '';?>"  placeholder="cake price here..." style="margin-bottom: 0px" >
                                    <p class="prod_error prod_error1" id="prod_price"></p>
                                </div>
                                <div class="col-md-12">
                                        <label>Cake Description<span>*</span></label>
                                        <textarea name="prod_desc"  placeholder="Cake details here..." style="margin-bottom: 0px" ><?php echo $response->getResponseContent()['prod_desc'] ?? '';?></textarea>
                                        <p class="prod_error prod_error1" id="prod_desc"></p>
                                    </div>

                                <div class="col-md-12">
                                    <select name="prod_flavor" style="margin-bottom: 0px" >
                                        <option value="<?php echo $response->getResponseContent()['prod_flavor'] ?? 'Select flavor';?>"><?php echo $response->getResponseContent()['prod_flavor'] ?? 'Select flavor';?></option>
                                        <option value="Orange">Orange</option>
                                        <option value="Vanila">Vanila</option>
                                        <option value="Chocolate">Chocolate</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <p class="prod_error prod_error1" id="prod_flavor"></p>
                                    <input type="text" name="new_prod_flavor" id="new_prod_flavor" placeholder="New flavour">
                                    
                                </div>
                                <div class="col-md-12">
                                    <select name="prod_steps" id="prod_steps">
                                        <?php if($response->getResponseContent()['prod_steps'] != ''): ?>
                                        <option value="<?php echo $response->getResponseContent()['prod_steps'] ?? '0'?>"><?php echo $response->getResponseContent()['prod_steps'] ?? 'Select number of steps'?></option>
                                        <?php endif; ?>
                                        
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                                    <div class="col-md-12">
                                        <label>Preferred dominant colour<span>*</span></label>
                                        <input type="text" name="prod_color" value = "<?php echo $response->getResponseContent()['prod_color'] ?? '';?>"  placeholder="Colour name" style="margin-bottom: 10px" >
                                        <p class="prod_error prod_error1" id="prod_color"></p>
                                    </div>
                                <div class="col-md-12">
                                    <select name="prod_status" >
                                        <option value="<?php echo $response->getResponseContent()['prod_status'] ?>"><?php echo ($response->getResponseContent()['prod_status'] != 0) ? 'Ready for sale': 'Product Status'; ?></option>
                                        <option value="1">Ready for sale</option>
                                        <option value="0">Review stage</option>
                                    </select>
                                    <p class="prod_error prod_error1" id="prod_status"></p>
                                </div>
                                <div class="col-md-12">
                                <label for="featured">Is this a featured product?</label>
                                    <select name="featured" >
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <p class="prod_error prod_error1" id="prod_status"></p>
                                </div>       
                              
                                <div class="col-12">
                                    <label>Select Cover image<span>*</span></label>
                                    <input type="file" name="prod_image_main" style="margin-bottom: 0px" >
                                    <p class="prod_error prod_error1" id="prod_image_main"></p>   
                                    <div id="cover_img">
                                    <?php echo "<img src='../". $response->getResponseContent()['prod_image_main']."' alt='product Image' style='width: 60%;'></td>";?>
                                    </div>                                
                                </div>

                                <div class="col-12">
                                    <label>Select other images</label>
                                    <input type="file" name="other_image[]" id="other_image" multiple >                                   
                                </div>  

                                <div style="padding: 10px 0px;">
                                    <div class="col-12">
                                        <button class="btn custom-btn md-size product_submit" id="product_submit" name="product_submit" data-prod_id='<?php echo $response->getResponseContent()['prod_id'];?>'>Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

