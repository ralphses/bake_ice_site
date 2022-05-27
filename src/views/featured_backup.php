<h4>Get the best of our <?php 
$link = 'category';
if($current_feature === 'wedding'){ echo "<strong>Wedding</strong>"; $link = 'weddingcat';}
if($current_feature === 'anniversary') { echo "<strong>Anniversary</strong>";$link = 'anniversarycat';}
if($current_feature === 'birthday') { echo "<strong>Birthday</strong>"; $link = 'birthdaycat.php';}
if($current_feature === 'all') echo "<strong>All Cake categories</strong>";
?> cakes</h4>
<div class="featured_banner_section mb-100" style="margin-bottom: 1%;">
        <div class="container-fluid">
            <div class="row featured_banner_inner slick__activation" data-slick='{
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "arrows": true,
                "dots": false,
                "autoplay": true,
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
                            <a href= "category"><img src="assets/cakes/edited cakes/feature1.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                        <div class="featured_banner_thumb">
                            <a href= "category"><img src="assets/cakes/edited cakes/feature2.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                        <div class="featured_banner_thumb">
                            <a href= "category"><img src="assets/cakes/edited cakes/feature3.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                        <div class="featured_banner_thumb">
                            <a href= "category"><img src="assets/cakes/edited cakes/feature4.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                        <div class="featured_banner_thumb">
                            <a href= "category"><img src="assets/cakes/edited cakes/feature2.png" alt=""></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>