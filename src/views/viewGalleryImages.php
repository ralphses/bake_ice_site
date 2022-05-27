
<?php
    //  echo '<pre>'; var_dump( $response); echo '</pre>'; exit ;

?>

<!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->

<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6><a href="/admin/add-gallary" style="margin-left: 70%; cursor: pointer;"><span class="btn btn-primary">New Gallery Image</span></a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
   
      <table class="table table-bordered  d-print" id="dataTable" width="100%" cellspacing="0">
 
     
        <tbody>
        <div class="success-order" id="allcat-error" style="width: 100%; line-height: 6px; display: none;"></div>

        <?php 
            $counter = 0;
            echo '<tr>';
            if(!$response) {
              echo '<td><p style="text-align: center;">NO GALLERY IMAGES FOUND</p></td>';
            }
            foreach($response as $res) {
                if($counter > 3) {
                    echo '</tr>';
                    echo '<tr>';
                    $counter = 0;
                }
                echo '<td style="width: 20%;">';
                echo '<div class="product_thumb">';
                echo "<img src='../".$res['image']."' class='all_img'>";
                // echo "<a href='/admin/remove-gallary?id={$res['id']}'><button class='btn btn-danger' style='width: 100%; margin-top: 3px;'>Delete</button></a>";
                echo "<button data-id='{$res['id']}' class='btn btn-danger gallery_del' style='width: 100%; margin-top: 3px;'>Remove</button>";
                echo "</div>";

                $counter += 1;
            }
            echo '</tr>';
        
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
         