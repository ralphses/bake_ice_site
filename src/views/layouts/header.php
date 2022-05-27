<div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="/index">Home</a>
                                </li>
                                <li ><a href="/about">About</a></li>
                                <li><a href="/category">Category</a></li>
                               
                                <li>
                                    <a href="/customer">Order Now</a>
                                </li>

                                <li>
                                    <a href="/order-status">Order Status</a>
                                </li>
                                
                                
                                        <li>
                                            <a href="/faq">FAQ</a>
                                        </li>
                            
                                </li>
                                <li class="menu-item-has-children"><a href="/gallary">Gallary</a>
                                   
                                </li>
                                <li class="menu-item-has-children"><a href="/contact">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--offcanvas menu area end-->

    <!--header area start-->
    <header class="header_section">
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header_top_inner d-flex justify-content-between">
                            <div class="welcome_text">
                                <p>The perfect baking shop in your neigbourhood, get Free Shipping for selected products</p>
                            </div>
                            <div class="header_top_sidebar d-flex align-items-center">
                                <ul class="d-flex">
                                    <li><i class="icofont-phone"></i> <a href="tel:+00123456789">+00 123 456 789</a>
                                    </li>
                                    <li><i class="icofont-envelope"></i> <a
                                            href="mailto:demo@example.com">demo@example.com</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main_header d-flex justify-content-between align-items-center">
                        <div class="header_logo">
                            <a class="sticky_none" href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <!--main menu start-->
                        <?php if($current_page !== 'admin'): ?>
                        <div class="main_menu d-none d-lg-block">
                            <nav>
                                <ul class="d-flex">
                            
                                    <li><a class="<?php if ($current_page=="home") {echo "active"; }?>" href="/">Home</a>
                                        <!-- <ul class="bucker-dropdown">
                                            <li><a href="index.php">Home 01</a></li>
                                            <li><a href="index-2.php">Home 02</a></li>
                                        </ul> -->
                                    </li>
                                    <li><a class="<?php if ($current_page=="about") {echo "active"; }?>" href="/about">About</a></li>
                                    <!-- <li><a class="<?php if ($current_page=="home") {echo "active"; }?> href="faq.php">FAQ</a> -->
                                        
                                    </li>
                                     <li>
                                       <a class="<?php if ($current_page=="category") {echo "active"; }?>" href="/category">Category</a>
                                      </li>
                                   
                                    <li><a class="<?php if ($current_page=="order") {echo "active"; }?>" href="/customer">Order Now</a>
                                        </li>
                                        
                                    <!-- <li><a class="<?php if ($current_page=="order status") {echo "active"; }?>" href="/order-status">Order Status</a>
                                        </li> -->
                                        <li>
                                    <!-- <a href="">Order Status</a> -->
                                </li>
                                    <li><a class="<?php if ($current_page=="faq") {echo "active"; }?>" href ="/faq">FAQ</a></li>
                                    <li><a class="<?php if ($current_page=="gallary") {echo "active"; }?>" href ="/gallary">Gallary</a></li>
                                    <li><a class="<?php if ($current_page=="contact") {echo "active"; }?>" href="/contact">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <?php endif;?>
                        <!--main menu end-->
                        <div class="header_account">
                            <!-- <ul class="d-flex">
                                <li class="header_search"><a href="javascript:void(0)"><i class="pe-7s-search"></i></a>
                                </li>
                                <li class="header_wishlist"><a href="wishlist.php"><i class="pe-7s-like"></i></a></li>
                                <li class="shopping_cart"><a href="javascript:void(0)"><i class="pe-7s-shopbag"></i></a>
                                    <span class="item_count">2</span>
                                </li>
                            </ul> -->
                            <div class="canvas_open">
                                <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--mini cart-->
    <div class="mini_cart">
        <div class="cart_gallery">
            <div class="cart_close">
                <div class="cart_text">
                    <h3>cart</h3>
                </div>
                <div class="mini_cart_close">
                    <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                </div>
            </div>
            <div class="cart_item">
                <div class="cart_img">
                    <a href="product.php"><img src="assets/img/product/product1.png" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="product.php">Primis In Faucibus</a>
                    <p>1 x <span> $65.00 </span></p>
                </div>
                <div class="cart_remove">
                    <a href="#"><i class="ion-android-close"></i></a>
                </div>
            </div>
            <div class="cart_item">
                <div class="cart_img">
                    <a href="product.php"><img src="assets/img/product/product2.png" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="product.php">Letraset Sheets</a>
                    <p>1 x <span> $60.00 </span></p>
                </div>
                <div class="cart_remove">
                    <a href="#"><i class="ion-android-close"></i></a>
                </div>
            </div>
        </div>
        <div class="mini_cart_table">
            <div class="cart_table_border">
                <div class="cart_total">
                    <span>Sub total:</span>
                    <span class="price">$125.00</span>
                </div>
                <div class="cart_total mt-10">
                    <span>total:</span>
                    <span class="price">$125.00</span>
                </div>
            </div>
        </div>
        <div class="mini_cart_footer">
            <div class="cart_button">
                <a href="cart.php">View cart</a>
            </div>
            <div class="cart_button">
                <a href="checkout.php"><i class="fa fa-sign-in"></i> Checkout</a>
            </div>
        </div>
    </div>
    <!--mini cart end-->

    <!-- page search box -->
    <div class="page_search_box">
        <div class="search_close">
            <i class="ion-close-round"></i>
        </div>
        <form class="border-bottom" action="#">
            <input class="border-0" placeholder="Search products..." type="text">
            <button type="submit"><span class="pe-7s-search"></span></button>
        </form>
    </div>