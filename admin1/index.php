 <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Dashboard - Artisans For You</title>
</head>
<?php include("include/admin_logins.php")  ?>
<body>
  <?php
  if (Login::isLoggedIn()) {
      $admin_user = DB::query('SELECT * FROM admin_user WHERE id=:id', array(':id'=>Login::isLoggedIn()));
      foreach ($admin_user as $user) {
      ?>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
          <?php
          include('top.php');
           ?>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
              <?php
              include('side.php');
               ?>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Artisans For You Dashboard</h2>
                                <p class="pageheader-text">Online WebApp</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Artisans For You Dashboard</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Cities And States</h5>
                                        <?php
                                          $cityCount = DB::query('SELECT COUNT(id) AS Totalcities FROM location');
                                          foreach ($cityCount as $statecount) {
                                            ?>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><i class="fa fa-map"></i> </h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span><?php echo $statecount['Totalcities']; ?></span>
                                        </div>
                                        <?php
                                      }
                                     ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Artisans</h5>
                                        <?php
                                          $artisanCount = DB::query('SELECT COUNT(id) AS Totalartisan FROM artisans');
                                          foreach ($artisanCount as $artcount) {
                                            ?>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><i class="fa fa-users"></i></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span><?php echo $artcount['Totalartisan']; ?></span>
                                        </div>
                                        <?php
                                      }
                                     ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Users</h5>
                                        <?php
                                          $userCount = DB::query('SELECT COUNT(id) AS Totalusers FROM users');
                                          foreach ($userCount as $ucount) {
                                            ?>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><i class="fa fa-eye"></i></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span><?php echo $ucount['Totalusers']; ?></span>
                                        </div>
                                        <?php
                                      }
                                     ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Categories</h5>
                                        <?php
                                          $categoryCount = DB::query('SELECT COUNT(id) AS Totalcategory FROM Categories');
                                          foreach ($categoryCount as $catecount) {
                                            ?>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><i class="fa fa-cog"></i> </h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                            <span><?php echo $catecount['Totalcategory']; ?></span>
                                        </div>
                                        <?php
                                      }
                                     ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- ============================================================== -->

                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-8 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Recent Added Artisans</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Image</th>
                                                        <th class="border-0">Artisan Name</th>
                                                        <th class="border-0">Artisan Number</th>
                                                        <th class="border-0">Artisan Email</th>
                                                        <th class="border-0">State and City</th>
                                                        <th class="border-0">Category</th>
                                                        <th class="border-0">Gender</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="m-r-10"><img src="assets/images/product-pic.jpg" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>Product #1 </td>
                                                        <td>id000001 </td>
                                                        <td>20</td>
                                                        <td>$80.00</td>
                                                        <td>27-08-2018 01:22:12</td>
                                                        <td>Patricia J. King </td>
                                                        <!--<td><span class="badge-dot badge-brand mr-1"></span>InTransit </td>-->
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->


                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- customer acquistion  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="card">
                                  <h5 class="card-header">Artisans Locations</h5>
                                  <div class="card-body p-0">
                                      <div class="table-responsive">
                                          <table class="table no-wrap p-table">
                                              <thead class="bg-light">
                                                  <tr class="border-0">
                                                      <th class="border-0">City / State</th>
                                                      <th class="border-0">Num Artisans</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                  $allstates = DB::query('SELECT * FROM location');
                                                  foreach ($allstates as $state) {
                                                    ?>
                                                  <tr>
                                                      <td><?php echo $state['state']." & ". $state['city']?></td>
                                                      <?php
                                                        $usersCount = DB::query('SELECT COUNT(id) AS Total FROM artisan_location WHERE location_id=:locationid ', array(':locationid'=>$state['id']));
                                                        foreach ($usersCount as $count) {
                                                          ?>
                                                      <td><?php echo $count['Total']; ?></td>
                                                      <?php
                                                    }
                                                   ?>
                                                  </tr>
                                                  <?php
                                                }
                                               ?>
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>

                            </div>
                            <!-- ============================================================== -->
                            <!-- end customer acquistion  -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
    <?php
    }
    }else{
      echo "<script>window.open('login.php', '_self')</script>";
    }
     ?>
</body>

</html>
