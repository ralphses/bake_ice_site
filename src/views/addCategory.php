
 <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="text-align: center;">New Category</h1>
<div class="login-register-area">
                <div class="container">
                    <div class="row"  style="margin-bottom: 30px;">
                    
                        <div class="col-lg-6 pt-5 pt-lg-0" style="margin: auto;">
                            <form action="/formHandler" id="d_form" method="POST" name="cat">
                            <input type="text" name="form_name" value="new_cat_form" hidden>
                            <input type="text" name="xxxx" value="<?php echo $response->getResponseContent()[0][0][0]['cat_id']??''?>" hidden>
                                <div class="login-form">
                                    <!-- Error Handler -->
                                    <div class="error" id="allcat-error" style="width: 100%; line-height: 6px; display: none;"></div>

                                    <h3 class="login-title">ADD CATEGORY</h3>
                                    <div class="row">
                                        <p style="font-size: small; font-weight: 500; font-style: normal; color: red;">Items marked cannot be left empty</p>
                                    <div class="col-12">
                                        
                                        <div class="col-12">
                                            <label>New Category<span>*</span></label>
                                            <input type="text" placeholder="Category name..." name="cat_name" id="cat_name" value="<?php echo $response->getResponseContent()[0][0][0]['cat_name']??'';?>" required>
                                            
                                        </div>
                                        
                                        <div class="col-md-12">
                                                <label>Category description<span>*</span></label>
                                                <textarea name="cat_desc" id="cat_desc" placeholder="Describe this category" required><?php echo $response->getResponseContent()[0][0][0]['cat_desc']??'';?></textarea>
                                            </div>
                                        
                                        <div style="padding: 10px 0px;">
                                        
                                            <div class="col-12">
                                                <button class="btn custom-btn md-size new_submit" id="new_submit" name="new_cat_submit" type="submit" style="background-color:#243a6e; padding: 0; color: #fff;" value="<?php echo $response->getResponseContent()[1]??'Add';?>"><?php echo ($response->getResponseContent()[1] != '') ? $response->getResponseContent()[1] :'Add';?></button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div> </div></div></div></div></div>

 
   