  

  
<?php

use src\models\User;
$id = $_SESSION['user_id'] ?? false;
$user = $id ? User::getUserById($_SESSION['user_id']) : false;

?>
  <!-- Begin Page Content -->
   <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Welcome <strong><?php echo $user[0]['user_name'] ?? 'Profile'; ?></strong></h1>
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
              </div>
              <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Content Row -->
<div class="dropdown mb-4">
  <button class="btn btn-primary dropdown-toggle selected" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Today's Order Summary</button>
  <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=2days">Yesterday - Today</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=3days">2 days ago - Today</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=7days">A week ago - Today</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=2week">2 weeks ago - Today</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=1month">A month ago - Today</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=3month">3 months ago - Today</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=6month">6 months ago - Today</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=1year">A year ago - Today</button>
      <button class="dropdown-item sort-link" id="pick-date" data-link="/admin/get-order">Pick a Date</button>
     
    </div>
  </div>

  <div class="dropdown mb-4 dateFilter" style="display: none;">
    <form action="/sort-with-date" class="checkForm" name="checkForm" method="POST">
      <input type="date" name="from" style="border: transparent"> 
      <input type="date" name="to" style="border: transparent">
      <input type="submit" name="check" id="" value="check" class="btn btn-secondary checkBtn">
    </form>
  </div>

  <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                  <hr>
                  Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file.
                </div>
              </div>
<div class="row">
              
</div>



<!-- Content Row -->
<div class="row">


  <!-- Content Column -->
  <div class="col-lg-6 mb-4">


  </div>

  <!-- <div class="col-lg-6 mb-4"> -->

    <!-- Illustrations -->
    <!-- <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
      </div>
      <div class="card-body">
        <div class="text-center">
          <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
        </div>
        <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
        <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
      </div>
    </div> -->

    <!-- Approach -->
    <!-- <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
      </div>
      <div class="card-body">
        <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
        <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
      </div>
    </div> -->

  <!-- </div> -->
</div>

</div>
<!-- /.container-fluid -->









<!-- <div class="dropdown mb-4">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Today's Order Summary</button>
  <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=Yesterday">Yesterday</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=2days">2 days ago</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=1week">A week ago</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=2week">2 weeks ago</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=1month">A month ago</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=3months">3 months ago</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=6months">6 months ago</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order?time=1year">A year ago</button>
      <button class="dropdown-item sort-link" data-link="/admin/get-order">Pick a Date</button>
     
    </div>
  </div> -->