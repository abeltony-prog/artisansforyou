<!DOCTYPE html>
<html lang="en">
<?php include("../Database/Admin_logins.php")  ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  <title>Dashboard - Artisan For you</title>

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
  <!-- container section start -->
  <?php
    $admin_user = DB::query('SELECT * FROM admin_user WHERE id=:id', array(':id'=>Login::isLoggedIn()));
    foreach ($admin_user as $user) {
    ?>
  <section id="container" class="">

<?php include('layout.php') ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">

            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <?php
              $artisanCategory = DB::query('SELECT * FROM categories WHERE id=:id', array(':id'=>$_GET['category_id']));
              foreach ($artisanCategory as $key) {
                ?>
                <li><i class="fa fa-users"></i><?php echo $key['category'] ?></li>
                <?php
              }
               ?>
            </ol>
            <form class="page-header" action="" method="get">
              <div class="form-group col-md-9">
                <select class="form-control" name="">
                  <option value="">Select State & City</option>
                  <?php
                    $allstates = DB::query('SELECT * FROM location');
                    foreach ($allstates as $all) {
                      ?>
                      <option value="<?php echo $all['id'] ?>"><?php echo $all['state'].' & '.$all['city'] ?></option>
                      <?php
                    }
                   ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <button class="btn btn-primary" type="submit" name="artisancity"><i class="fa fa-search"></i><span>Search</span> </button>
              </div>
            </form>
          </div>
        </div>
        <!--/.row-->
        <!-- Today status end -->
        <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-users red"></i><strong>Artisans List</strong></h2>
                <div class="panel-actions">
                  <a href="index.php#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.php#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.php#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body">
                <table class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                      <th>states</th>
                      <th>Artisan</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $allstates = DB::query('SELECT * FROM location');
                      foreach ($allstates as $state) {
                        ?>
                        <tr>
                          <td><?php echo $state['state'] ?></td>
                          <?php
                            $usersCount = DB::query('SELECT COUNT(id) AS Total FROM artisan_location WHERE location_id=:locationid ', array(':locationid'=>$state['id']));
                            foreach ($usersCount as $count) {
                              ?>
                               <td><?php echo $count['Total']; ?></td>
                              <?php
                            }
                           ?>

                          <td>
                            <a class="btn btn-outline-primary" href="#">View</a>
                          </td>
                        </tr>
                        <?php
                      }
                     ?>
                  </tbody>
                </table>
              </div>

            </div>

          </div>
          <!--/col-->

        </div>
        <!-- statics end -->
      </section>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.php(el.php() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>
<?php
}
}else{
  echo "<script>window.open('login.php', '_self')</script>";
}
 ?>
</html>
