<?php 
    // echo '<pre>';
    // var_dump($response->getResponseContent());
    // echo '</pre>';
    // exit;
?>

    <!--slide banner section start-->
    
    <div class="hero_banner_section hero_banner2 d-flex align-items-center mb-60"
        data-bgimg="assets/img/bg/hero-bg2.png">
        <div class="container">
            <div class="hero_banner_inner">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero_content hero_content2">
                            <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s" > <span> 50% Off</span> Up To
                                Sale</h3>
                            <h1 class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s" style="color: red;">We Bake
                                With <br>
                                Pasion.</h1>
                            <a class="btn btn-link wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s"
                                href="/category">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--slider area end-->

    <!-- featured banner section start -->
    <div class="gallary-title">
        <?php $current_feature = 'wedding'; ?>
        <?php require "featured.php"; ?>
    </div>
    <!-- featured banner section end -->

    <!-- product section start -->
    <div class="product_section mb-80 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
        <div class="container">
            <div class="product_header">
                <div class="section_title text-center">
                    <h2>New Products</h2>
                </div>
                <div class="product_tab_button">
                    <ul class="nav justify-content-center" role="tablist" id="nav-tab">
                        <li>
                            <a class="active" data-toggle="tab" href="#features" role="tab" aria-controls="features"
                                aria-selected="false">Our Features </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#seller" role="tab" aria-controls="seller" aria-selected="false">
                                Best Sellers </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#sales" role="tab" aria-controls="sales"
                                aria-selected="false">New Items </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content product_container">
                <div class="tab-pane fade show active" id="features" role="tabpanel">
                    <div class="product_gallery">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/new1.png"
                                                    alt=""></a>
                                            <!-- <!--  --> -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Birthday Cake</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N322.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/new2.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Naija Themed Cake</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N324.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/new3.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Cake for children.</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N328.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/new4.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Special Birthday</a>
                                            </h4>
                                            <div class="price_box">
                                                <span class="current_price">N332.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/new5.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Family Special</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N335.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/new6.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">For One Year</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N338.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/new7.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Castle Special</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N328.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/new8.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Baby's special</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N322.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="seller" role="tabpanel">
                    <div class="product_gallery">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/seller9.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Sweet Mother</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N335.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/seller2.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Birthday Collection.</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N338.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/seller3.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Year Old.</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N328.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/seller4.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Music Lovers</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N322.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/seller5.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Traditional wedding cake</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N322.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/seller6.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Chelsea FC Themed cake</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N324.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/seller7.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Delicious Birthday Cake</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N328.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/seller8.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">For the boys special.</a>
                                            </h4>
                                            <div class="price_box">
                                                <span class="current_price">N332.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="sales" role="tabpanel">
                    <div class="product_gallery">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/fe1.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">For the Blues</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N328.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/fe2.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Traditional</a>
                                            </h4>
                                            <div class="price_box">
                                                <span class="current_price">N332.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/fe3.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Wedding Special</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N335.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/fe4.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Baby's special</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N322.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/fe5.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Cake for Christmas</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N324.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/fe6.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Birthday Cake</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N338.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/fe7.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Flower cake</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N328.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="/product"><img src="assets/cakes/edited cakes/fe8.png"
                                                    alt=""></a>
                                            <!--  -->
                                        </div>
                                        <figcaption class="product_content text-center">
                                            <h4><a href="/product">Igbankwu Cake</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">N322.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product section end -->

    <div class="gallary-title">
        <?php $current_feature = 'anniversary'; ?>
        <?php require "featured.php"; ?>
    </div>

     <!-- product section start -->
     <?php require "bestproduct.php"; ?>
    <!-- product section end -->

    <!-- banner fullwidth section start -->
    <div class="deals_banner_section padding-l-r-92 mb-105 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
        <div class="deals_banner_bg" data-bgimg="assets/img/bg/banner-fullwidth2.png">
            <div class="container">
                <div class="deals_banner_inner">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6 col-md-6 offset-md-6">
                            <div class="banner_discount_text deals_banner_text ">
                                <h3><span>30% </span> Sale Off</h3>
                                <h2>Deal of the day</h2>
                                <p>Get <strong>10% Discount</strong> on your orders for today. Hurry!</p>
                                <div class="timer__area">
                                    <div data-countdown="2023/10/11"></div>
                                </div>
                                <a class="btn btn-link" href="category.php">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="add_discount">
                        <img src="assets/img/others/add-discount.png" alt="">
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- banner fullwidth section end -->

    <div class="gallary-title">
        <?php $current_feature = 'birthday'; ?>
        <?php require "featured.php"; ?>
    </div>

    <!-- blog section start -->
    <div class="blog_section mb-90">
        <div class="container">
            <div class="section_title text-center wow fadeInUp mb-50" data-wow-delay="0.1s" data-wow-duration="1.1s">
                <h2>Latest Blog</h2>
                <p>Here, you learn oabout the latest gist. visit our blogging sections to learn more!</p>
            </div>
            <div class="row blog_inner slick__activation" data-slick='{
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "arrows": false,
                "dots": false,
                "autoplay": true,
                "speed": 300,
                "infinite": true ,  
                "responsive":[  
                  {"breakpoint":992, "settings": { "slidesToShow": 2 } },  
                  {"breakpoint":576, "settings": { "slidesToShow": 1 } }  
                 ]                                                     
            }'>
                <div class="col-lg-4">
                    <div class="single_blog wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <div class="blog_thumb">
                            <a href="blog-fullwidth.php"><img src="assets/img/blog/blog1.png" alt=""></a>
                        </div>
                        <div class="blog_content">
                            <div class="blog_arrow_btn">
                                <a href="blog-fullwidth.php"><i class="ion-arrow-right-c"></i></a>
                            </div>
                            <span>Brakery</span>
                            <h3><a href="blog-fullwidth.php">We are constructing a new bakery!</a></h3>
                            <div class="blog__meta d-flex align-items-center">
                                <div class="blog__meta__thumb">
                                    <img src="assets/img/others/meta-img1.png" alt="">
                                </div>
                                <div class="blog__meta__text">
                                    <ul class="d-flex">
                                        <!-- <li>By: Admin</li> -->
                                        <li><i class="icofont-calendar"></i> 22 Aug, 2021</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_blog wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                        <div class="blog_thumb">
                            <a href="blog-fullwidth.php"><img src="assets/img/blog/blog2.png" alt=""></a>
                        </div>
                        <div class="blog_content">
                            <div class="blog_arrow_btn">
                                <a href="blog-fullwidth.php"><i class="ion-arrow-right-c"></i></a>
                            </div>
                            <span class="color2">Content Improvement</span>
                            <h3><a href="blog-fullwidth.php">The company has employed newest strategies to improve quality</a>
                            </h3>
                            <div class="blog__meta d-flex align-items-center">
                                <div class="blog__meta__thumb">
                                    <img src="assets/img/others/meta-img2.png" alt="">
                                </div>
                                <div class="blog__meta__text">
                                    <ul class="d-flex">
                                        <!-- <li>By: Admin</li> -->
                                        <li><i class="icofont-calendar"></i> 22 Aug, 2021</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_blog wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                        <div class="blog_thumb">
                            <a href="blog-fullwidth.php"><img src="assets/img/blog/blog3.png" alt=""></a>
                        </div>
                        <div class="blog_content">
                            <div class="blog_arrow_btn">
                                <a href="blog-fullwidth.php"><i class="ion-arrow-right-c"></i></a>
                            </div>
                            <span class="color3">More staff</span>
                            <h3><a href="blog-fullwidth.php"> New staff includes dispatch riders...</a></h3>
                            <div class="blog__meta d-flex align-items-center">
                                <div class="blog__meta__thumb">
                                    <img src="assets/img/others/meta-img3.png" alt="">
                                </div>
                                <div class="blog__meta__text">
                                    <ul class="d-flex">
                                        <!-- <li>By: Admin</li> -->
                                        <li><i class="icofont-calendar"></i> 22 Aug, 2021</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_blog wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <div class="blog_thumb">
                            <a href="blog-fullwidth.php"><img src="assets/img/blog/blog1.png" alt=""></a>
                        </div>
                        <div class="blog_content">
                            <div class="blog_arrow_btn">
                                <a href="blog-fullwidth.php"><i class="ion-arrow-right-c"></i></a>
                            </div>
                            <span>Brakery</span>
                            <h3><a href="blog-fullwidth.php">There are many of Lorem
                                    Ipsum.</a></h3>
                            <div class="blog__meta d-flex align-items-center">
                                <div class="blog__meta__thumb">
                                    <img src="assets/img/others/meta-img1.png" alt="">
                                </div>
                                <div class="blog__meta__text">
                                    <ul class="d-flex">
                                        <li>By: Admin</li>
                                        <li><i class="icofont-calendar"></i> 22 Aug, 2021</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog section end -->
    
  