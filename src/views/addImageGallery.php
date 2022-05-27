
 <!-- Page Heading -->

 <div class="card-header py-3 d-flex">
    <a href="/admin/view-gallary" style="margin-left: 5%; cursor: pointer;"><span class="btn btn-primary">Back to Gallary Images</span></a>
  </div>
 <h1 class="h3 mb-4 text-gray-800" style="text-align: center;">New Gallary Image</h1>
<div class="login-register-area">
                <div class="container">
                    <div class="row"  style="margin-bottom: 30px;">
                    
                        <div class="col-lg-6 pt-5 pt-lg-0" style="margin: auto;">
                            <form id="gallery-form" action="/admin/add-gallary" enctype="multipart/form-data" method="POST">
                           
                                <div class="login-form">
                                    <!-- Error Handler -->
                                    <div class="error" id="allcat-error" style="width: 100%; line-height: 6px; display: none;"></div>

    
                                    <div class="row">
                                        <p style="font-size: small; font-weight: 500; font-style: normal; color: red;">Items marked cannot be left empty</p>
                                    <div class="col-12">
                                        
                                        <div class="col-12">
                                            <label>Image Caption</label>
                                            <input type="text" placeholder="Image caption here..." name="name" id="name" value="">
                                            
                                        </div>
                                        
                                        <div class="col-md-12">
                                                <label>Category description<span>*</span></label>
                                               <input type="file" name="image[]" id="image" multiple>
                                              
                                            </div>
                                        
                                        <div style="padding: 10px 0px;">
                                        
                                            <div class="col-12">
                                                <button class="btn custom-btn md-size gallery_submit" id="gallery_submit" style="background-color:#243a6e; padding: 0; color: #fff;" >Save Image</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div> </div></div></div></div></div>

 
   