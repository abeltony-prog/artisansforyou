<!DOCTYPE html>
<html lang="en">
<?php include("../Database/Admin_logins.php")  ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="icon" href="../assets/icon/icon.png" type="image/x-icon">

  <title>Add Category - artisan For you</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
</head>
<?php
if (Login::isLoggedIn()) {
  ?>
<body>
  <?php
    $admin_user = DB::query('SELECT * FROM admin_user WHERE id=:id', array(':id'=>Login::isLoggedIn()));
    foreach ($admin_user as $user) {
    ?>
  <!-- container section start -->
  <section id="container" class="">

    <?php include('layout.php'); ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="icon_pin"></i> Add Artisan Category</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                <li><i class="icon_pin"></i>Add Category</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Add Category
                </header>
                <?php
                if (isset($_POST['add'])) {
                  $category = $_POST['category'];
                  DB::query('INSERT INTO categories VALUES(\'\',:category)', array(':category'=>$category));
                  echo "<span class='alert alert-success'>City added Success Fully</span>";
                }
                 ?>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Artisan type</label>
                      <div class="col-sm-10">
                        <input type="text" name="category" class="form-control" value="" placeholder="Plumber">
                      </div>
                    </div>
                    <input type="submit" name="" class="btn btn-default pull-right" value="Reset">
                    <button type="submit" name="add"class="btn btn-success pull-right">Add</button>
                  </form>
                </div>
              </section>
            </div>
          </div>
      </section>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->
  <!-- javascripts -->

    <script src="js/jquery.slimscroll.min.js"></script>

</body>
<?php
}
}else{
  echo "<script>window.open('login.php', '_self')</script>";
}
 ?>
</html>
