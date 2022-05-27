<div class="login-register-area" id="customer-form-area">
        <div class="container">
            <div class="row">
             
                <div class="col-lg-6 pt-5 pt-lg-0" style="margin: auto;">
                    <form action="/admin/login" method="POST" id="user-form">
                        <div class="login-form" style="margin-bottom: 30px;">
                            <h3 class="login-title">USER LOGIN</h3>
                            <div class="row">
                           
                                <div class="col-12">
                                    <label>Email Address</label>
                                    <input type="text" placeholder="user@example.com" name="user_email" >
                                    <p class="cust_error cust_error1" id="user_email"></p>
                                </div>

                                <div class="col-12">
                                    <label>Password</label>
                                    <input type="password" name="user_password" >
                                    <p class="cust_error cust_error1" id="user_password"></p>
                                </div>

                                <div class="col-12">
                                        <button class="btn custom-btn md-size"  id="user-submit" style="margin-bottom: 20px;">Login</button>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
