<?php
?>

<!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->

<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6><a href="/admin/new-product" style="margin-left: 75%; cursor: pointer;"><span class="btn btn-primary">New Product</span></a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
   
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Cover Image</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Product Price</th>
            <th>Date Added</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>S/N</th>
            <th>Cover Image</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Product Price</th>
            <th>Date Added</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
            <img src="" alt="">

        <div class="error" id="allcat-error" style="width: 100%; line-height: 6px; display: none;"></div>

        <?php if(!$response->getResponseContent()): ?>
            <?php echo '<td colspan ="8"><p style="text-align: center;"><strong>NO ITEM TO DISPLAY</strong></p></td>'; ?>
        <?php endif;?>

        <?php if($response->getResponseContent()): ?>
          <?php $count = 0; ?>

          <?php foreach($response->getResponseContent() as $key => $value):?>
            <?php $count = $count +1; ?>
            <?php echo '<tr>'; 
                echo "<td>{$count}</td>";
                
                echo "<td style='width:10%;'><img src='../". $value['prod_image_main']."' alt='product Image' style='width: 100%;'></td>";
                echo "<td>{$value['prod_title']}</td>";
                echo "<td>{$value['prod_desc']}</td>";
                echo "<td>{$value['prod_price']}</td>";
                echo "<td>{$value['date_added']}</td>";
                echo ($value['prod_status'] == 0) ? "<td><button class='btn btn-secondary fpublish' style='margin-right: 5px; margin-bottom: 5px; background-color:white;  color: black;'data-prod_id='{$value['prod_id']}' data-action = 'unpublish' '>Publish</button></td>" : "<td><button class='btn btn-secondary fpublish' style='margin-right: 5px; margin-bottom: 5px; background-color:white; color: black;'data-prod_id='{$value['prod_id']}' data-action = 'publish''>Unpublish</button></td>"; 
                echo "<td><a href='/admin/new-product?action=Save&prod_id={$value['prod_id']}'><button class='btn btn-secondary' style='margin-right: 5px; margin-bottom: 5px; background-color:#243a6e;'>Edit</button></a>";
               
               echo "<button class='btn btn-secondary pdelete-btn' style='margin-right: 5px; margin-bottom: 5px; background-color:red;'data-prod_id='{$value['prod_id']}'>Delete</button></td>";
            ?>
          <?php endforeach;?>
        <?php endif;?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
            <!-- /.container-fluid -->
