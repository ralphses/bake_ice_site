 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->

<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6><a href="/admin/new-category" style="margin-left: 75%; cursor: pointer;"><span class="btn btn-primary">New Category</span></a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
   
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th>S/N</th>
            <th>Category Name</th>
            <th>Description</th>
            <th>Total Products</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>S/N</th>
            <th>Category Name</th>
            <th>Description</th>
            <th>Total Products</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>

        <div class="error" id="allcat-error" style="width: 100%; line-height: 6px; display: none;"></div>

        <?php if(!$response->getResponseContent()): ?>
            <?php echo '<td colspan ="3"><p style="text-align: center;"><strong>NO ITEM TO DISPLAY</strong></p></td>'; ?>
            <?php endif;?>

        <?php if($response->getResponseContent()): ?>
          <?php $count = 0; ?>

          <?php foreach($response->getResponseContent() as $key => $value):?>
            <?php $count = $count +1; ?>
            <?php echo '<tr>'; 
                echo "<td>{$count}</td>";
                echo "<td>{$response->getResponseContent()[$key]['cat_name']}</td>";
                echo "<td>{$response->getResponseContent()[$key]['cat_desc']}</td>";
                echo "<td>{$response->getResponseContent()[$key]['total_product']}</td>";
                echo "<td><a href='/admin/new-category?action=Save&cat_id={$response->getResponseContent()[$key]['cat_id']}'><button class='btn btn-secondary' style='margin-right: 5px; margin-bottom: 5px; background-color:#243a6e;'>Edit</button></a>";
               
               echo "<button class='btn btn-secondary fdelete-cat-btn' style='margin-right: 5px; margin-bottom: 5px; background-color:red;'data-id='{$response->getResponseContent()[$key]['cat_id']}'>Delete</button></td>";
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
