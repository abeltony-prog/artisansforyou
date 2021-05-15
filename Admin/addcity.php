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

  <title>Dashboard - artisan For you</title>

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
              <h3 class="page-header"><i class="icon_pin"></i> Add Cities</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                <li><i class="icon_pin"></i>Add City</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Add City
                </header>
                <?php
                if (isset($_POST['add'])) {
                  $state = $_POST['state'];
                  $city = $_POST['city'];
                  DB::query('INSERT INTO location VALUES(\'\',:state,:city)', array(':state'=>$state,':city'=>$city));
                  echo "<span class='alert alert-success'>City added Success Fully</span>";
                }
                 ?>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Select State</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="state" id="state">
                            <option  value="">Select State</option>
                            <option  value="Abia">Abia</option>
                            <option  value="Adamawa">Adamawa</option>
                            <option  value="Akwa">Akwa</option>
                            <option  value="Anambra">Anambra</option>
                            <option  value="Bauchi">Bauchi</option>
                            <option  value="Bayelsa">Bayelsa</option>
                            <option  value="Benue">Benue</option>
                            <option  value="Borno">Borno</option>
                            <option  value="Cross">Cross</option>
                            <option  value=Delta"">Delta</option>
                            <option  value="Ebonyi">Ebonyi</option>
                            <option  value="Edo">Edo</option>
                            <option  value="Ekiti">Ekiti</option>
                            <option  value="Enugu">Enugu</option>
                            <option  value="Federal Capital Territory">Federal Capital Territory</option>
                            <option  value="Gombe">Gombe</option>
                            <option  value="Imo">Imo</option>
                            <option  value="Jigawa">Jigawa</option>
                            <option  value="Kaduna">Kaduna</option>
                            <option  value="Kano">Kano</option>
                            <option  value="Katsina">Katsina</option>
                            <option  value="Kebbi">Kebbi</option>
                            <option  value="Kogi">Kogi</option>
                            <option  value="Kwara">Kwara</option>
                            <option  value="Lagos">Lagos</option>
                            <option  value="Nasarawa">Nasarawa</option>
                            <option  value="Niger">Niger</option>
                            <option  value="Ogun">Ogun</option>
                            <option  value="Ondo">Ondo</option>
                            <option  value="Osun">Osun</option>
                            <option  value="Oyo">Oyo</option>
                            <option  value="Plateau">Plateau</option>
                            <option  value="Rivers">Rivers</option>
                            <option  value="Sokoto">Sokoto</option>
                            <option  value="Taraba">Taraba</option>
                            <option  value="Yobe">Yobe</option>
                            <option  value="Zamfara">Zamfara</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Add City Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="city" class="form-control" value="">
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
