<?php

use src\controllers\ProductController;
use src\models\Product;

$product = $response->getResponseContent()[0];
$images = ProductController::getCoverImages($product['prod_image_other']);
$relatedProducts = Product::getProductByCategory($product['cat_id']);

?>
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-100" data-bgimg="assets/img/bg/hero-bg222.png">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1><?php echo $product['prod_title'];?></h1>
                        <ul>
                            <li><a href="/">Home </a></li>
                            <li> // <a href="/product">product</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->

    <!-- single product section start-->
    <div class="single_product_section mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single_product_gallery">
                        <div class="product_gallery_inner d-flex">
                            <div class="product_gallery_main_img">
                         
                                <?php 
                                    foreach($images as $image) {
                                        echo '<div class="gallery_img_list">';
                                        echo "<img src='{$image}' alt='tab-thumb'></a>";
                                        echo '</div>';
                                    }
                                ?>
                                
                            </div>
                            <div class="product_gallery_btn_img">
                             
                                <?php 
                                    foreach($images as $image) {
                                        echo '<a class="gallery_btn_img_list" href="javascript:void(0)">';
                                        echo "<img src='{$image}' alt='tab-thumb'></a>";
                                        echo $image;
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_details_sidebar">
                        <h2 class="product__title"><strong><?php echo $product['prod_title'] ?></strong></h2>
                        <div class="price_box">
                            <span class="current_price">N<?php echo $product['prod_price'] ?>.00</span>
                        </div>
                        <div class="quickview__info mb-0">
                            <p class="product_review d-flex align-items-center">
                                <span class="review_icon d-flex">
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                </span>
                                <span class="review__text"> (5 reviews)</span>
                            </p>
                        </div>
                        <p class="product_details_desc"><?php echo $product['prod_desc'] ?></p>
                        <div class="product_pro_button quantity d-flex align-items-center">
                            
                                <form action="/customer">
                                    <div class="pro-qty border">
                                        <input type="text" name="prod_qty" value="1" id="prod_qty">
                                        <input type="text" name="prod_id" id="" value="<?php echo $product['prod_id'];?>" hidden>
                                    </div>
                                    <button class="add_to_cart" type="submit">Order Now</button>
                                </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details section end-->

   
    <!-- product section start -->
    <div class="product_section mb-80">
        <div class="container">
            <div class="section_title text-center mb-55">
                <h2>Related Products</h2>
                <p>Check out other stuff that you may like...</p>
            </div>
            <div class="row product_slick slick_navigation slick__activation" data-slick='{
                "slidesToShow": 4,
                "slidesToScroll": 1,
                "arrows": true,
                "dots": false,
                "autoplay": false,
                "speed": 300,
                "infinite": true ,  
                "responsive":[ 
                  {"breakpoint":992, "settings": { "slidesToShow": 3 } }, 
                  {"breakpoint":768, "settings": { "slidesToShow": 2 } }, 
                  {"breakpoint":500, "settings": { "slidesToShow": 1 } }  
                 ]                                                     
            }'>

            <?php 
            foreach($relatedProducts as $prod) {
                echo    '<div class="col-lg-3">
                        <article class="single_product">
                        <figure>
                        <div class="product_thumb">';
                echo "<a href='/product?prod_id={$prod['prod_id']}'><img src='{$prod['prod_image_main']}'></a>";
                echo '</div>';
                echo '<figcaption class="product_content text-center">';
                echo "<a href='/product?prod_id={$prod['prod_id']}'>{$prod['prod_title']}</a>";
                echo '<div class="price_box">';
                echo " <span class='current_price'>N{$prod['prod_price']}.00</span>";
                echo '</div>';
                echo '  </figcaption>
                        </figure>
                        </article>
                        </div>';
            }
            ?>
            </div>
        </div>
    </div>
    <!-- product section end -->

   