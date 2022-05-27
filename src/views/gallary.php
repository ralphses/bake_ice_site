<?php 
// echo '<pre>'; var_dump( $response); echo '</pre>'; exit ;
?>
    <div class="gallary-title">
        <h4>Photo Speaking!</h4>
    </div>

    <div class="product_page_gallery" style="padding: 3%;">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="grid">
                <div class="row grid__product">
                                        
                    <?php 
                        foreach($response as $res) {
                            
                            echo '<div class="col-xl-3 col-md-4 col-sm-6">
                                    <article class="single_product wow fadeInUp" data-wow-delay="0.2s"data-wow-duration="1.2s">
                                    <figure>
                                    <div class="product_thumb">';
                            echo "<img src='{$res['image']}'class='all_img' data-bs-toggle='modal' data-bs-target='#modal_box'>";
                            echo "</div>
                                    </figure>
                                    </article>
                                    </div>";
                        }
                    ?>
                           
                </div>
            </div>
        </div>
    </div>


<section>
      <!-- modal area start-->
      <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"  style="border: none;">
            <div class="modal-content" id="mod" style="max-height: 600px;">
                <button id="close" type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-android-close"></i></span>
                </button>
                
            </div>
        </div>
    </div>
    <!-- modal area end-->
</section>

<script>
    let img = document.querySelectorAll('.all_img');
    let content = document.getElementById('mod');
    let close = document.getElementById('close');
    let container = document.getElementById('modal_box');

   [...img].forEach((e) => {
        e.addEventListener('click', () => {
        let newImage = e.cloneNode(true);
        newImage.classList.add('newImage'); 
        newImage.style.background = 'transparent';     
        content.appendChild(newImage);
    }  );  
    })

    container.addEventListener('click', () => content.removeChild(content.children[1]));
</script>

