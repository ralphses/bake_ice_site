    
 <?php 
    // echo '<pre>';
    // var_dump($response->getResponseContent());
    // echo '</pre>';
    // exit;
?>
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-100" data-bgimg="assets/img/bg/hero-bg22222.png">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1><?php echo $response->getResponseContent()['type'];?></h1>
                        <ul>
                            <li><a href="/index">Home </a></li>
                            <li> //<?php echo $response->getResponseContent()['type'];?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->

    <!-- product page section start -->
    <div class="product_page_section mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2">
                    <div class="product_sidebar product_widget">
                      
                        <div class="widget__list category wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                            <h3>category</h3>
                            <div class="widget_category">
                                <ul>
                                    <li><a href="/category">All <span>(65)</span></a></li>
                                    <li><a href="/category?cat_id=137">Wedding Cakes<span>(15)</span></a></li>
                                    <li><a href="/category?cat_id=136">Anniversary Cakes<span>(10)</span></a></li>
                                    <li><a href="/category?cat_id=135">Birthday Cakes<span>(22)</span></a></li>
                                    <li><a href="/category?cat_id=139">Others<span>(15)</span></a></li>
                                    <li><a href="/category?cat_id=138">Doughnuts<span>(10)</span></a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="widget__list wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                            <div class="widget_banner">
                                <img src="assets/img/others/product-sidaber-banner.png" alt="">
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div class="col-lg-9 order-1">
                    <div class="product_page_wrapper">
                        <!--shop toolbar area start-->
                        <div class="product_sidebar_header mb-60 d-flex justify-content-between align-items-center">
                            <!--  -->
                                <div class="product__toolbar__btn">
                                    <ul class="nav" role="tablist">
                                        <li class="nav-item">
                                            <a class="active" data-bs-toggle="tab" href="#grid" role="tab"
                                                aria-controls="grid" aria-selected="true"><i class="ion-grid"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-bs-toggle="tab" href="#list" aria-controls="list" role="tab"
                                                aria-selected="false"><i class="ion-ios-list"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--shop toolbar area end-->

                        <!--shop gallery start-->
                        <div class="product_page_gallery">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="grid">
                                    <div class="row grid__product">
                                        
                                      
                                        <?php 
                                        if($response->getResponseContent()['products']) {
                                            foreach($response->getResponseContent()['products'] as $key => $value) {

                                                echo '<div class="col-lg-4 col-md-4 col-sm-6">';
                                                echo ' <article class="single_product wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">';
                                                echo '<figure>';
                                                echo '<div class="product_thumb">';
                                                echo " <a href='/product?prod_id={$value['prod_id']}'><img src='../". $value['prod_image_main']."' alt='product Image'></a>";
                                                echo '<figcaption class="product_content text-center">';
                                                echo "<h4><a href='/product?prod_id={$value['prod_id']}'>{$value['prod_title']}</a></h4>";
                                                echo '<div class="price_box">';
                                                echo "<span class='current_price'>N{$value['prod_price']}.00</span>";
                                                echo "</div>";
                                                echo '</figcaption>';
                                                echo '</figure>';
                                                echo '</article>';
                                                echo '</div>';

                                            }
                                        }
                                        else {
                                            echo '<h1>No Product found for this Category</h1>';
                                        }
                                        
                                        ?>


                                       
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list">
                                    <div class="list__product">

                                    <?php 
                                        if($response->getResponseContent()['products']) {
                                            foreach($response->getResponseContent()['products'] as $key => $value) {
                                                echo '<article class="product_list_items border-bottom">';
                                                echo '<figure class="product_list_flex d-flex align-items-center">';
                                                echo '<div class="product_thumb">';
                                                echo "<a href='/product?prod_id={$value['prod_id']}'><img src='../". $value['prod_image_main']."' alt='product Image'></a>";
                                                echo '</div>';
                                                echo '<figcaption class="product_list_content">';
                                                echo "<a href='/product?prod_id={$value['prod_id']}'>{$value['prod_title']}</a>";
                                                echo '<div class="product__ratting">';
                                                echo '<ul class="d-flex">
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                      </ul>';
                                                echo '<div class="price_box">';
                                                echo "<span class='current_price'>{$value['prod_price']}</span>";
                                                echo '</div>';
                                                echo '<div class="product__desc">';
                                                echo "<p>{$value['prod_desc']}</p>";
                                                echo '</figcaption>';
                                                echo '</figure>';
                                                echo '</article>';
                                                
                                            }
                                        }
                                        else {
                                            echo '<h1>No Product found for this Category</h1>';
                                        }
                                    ?>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination poduct_pagination">
                            <ul>
                                <li class="current"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#"><i class="ion-chevron-right"></i></a></li>
                            </ul>
                        </div>
                        <!--shop gallery end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product page section end -->
