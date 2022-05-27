<h4>Get the best of our <?php

use src\models\Product;

if($current_feature != 'about') {}

$catProducts = [
    'anniversary' => Product::getProductByCategory(136),
    'wedding' => Product::getProductByCategory(137) ?? false,
    'birthday' => Product::getProductByCategory(135) ?? false,
    'all' => $response->getResponseContent() ?? false
];

// var_dump($catProducts[$current_feature]);

// $link = 'category';
if($current_feature === 'wedding'){ echo "<strong>Wedding</strong>"; $link = '137';}
if($current_feature === 'anniversary') { echo "<strong>Anniversary</strong>";$link = '136';}
if($current_feature === 'birthday') { echo "<strong>Birthday</strong>"; $link = '135';}
if($current_feature === 'all') echo "<strong>All Cake categories</strong>"; $link = 0;
?> cakes</h4>
<div class="featured_banner_section mb-100">
        <div class="container-fluid">
            <div class="row featured_banner_inner slick__activation" data-slick='{
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "arrows": true,
                "dots": false,
                "autoplay": false,
                "speed": 300,
                "infinite": true ,  
                "responsive":[ 
                  {"breakpoint":768, "settings": { "slidesToShow": 2 } }, 
                  {"breakpoint":500, "settings": { "slidesToShow": 1 } }  
                 ]                                                  
            }'>

            <?php 
            // $thisCatProd = Product::getProductByCategory(136);

                if($catProducts[$current_feature]) {
                    foreach($catProducts[$current_feature] as $key => $value) {
                        // var_dump($value);
                        echo "<div class='col-lg-4'>";
                        echo ' <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">';
                        echo ' <div class="featured_banner_thumb">';
                        if($current_feature === 'all') {
                            echo "<a href= '/category'><img src='../". $value['prod_image_main']."' alt='product Image'></a>";
                           
                        }    
                        else {
                            echo "<a href='/category?cat_id={$link}'><img src='../". $value['prod_image_main']."' alt='product Image'></a>";
                        }    
                        echo ' </div>';
                        echo ' </div>';
                        echo ' </div>';
                    }
                }
            ?> 
             <!-- <div class="col-lg-4">
                    <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <div class="featured_banner_thumb">
                            <?php echo "<a href='/category?cat_id={$link}'><img src='../". $value['prod_image_main']."' alt='product Image'></a>"; ?>
                            
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <!-- codelist.cc
                themelock.com
-->


<!-- <div class="featured_banner_section mb-100">
        <div class="container-fluid">
            <div class="row featured_banner_inner slick__activation" data-slick='{
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "arrows": true,
                "dots": false,
                "autoplay": false,
                "speed": 300,
                "infinite": true ,  
                "responsive":[ 
                  {"breakpoint":768, "settings": { "slidesToShow": 2 } }, 
                  {"breakpoint":500, "settings": { "slidesToShow": 1 } }  
                 ]                                                     
            }'>
                <div class="col-lg-4">
                    <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <div class="featured_banner_thumb">
                            <a href="shop-right-sidebar.php"><img src="assets/cakes/edited cakes/feature1.png" alt=""></a>
                        </div>
                        <div class="featured_banner_text d-flex justify-content-between align-items-center">
                            <h3><a href="shop-right-sidebar.php">Pastry</a></h3>
                            <span>(39)</span>
                        </div>
                    </div>
                </div>
                -->