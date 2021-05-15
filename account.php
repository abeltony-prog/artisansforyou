<!doctype html>
<html lang="zxx">
<?php include('Database/user_Logins.php') ?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Artisan For You | List</title>
  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
    rel="stylesheet">
    <link rel="icon" href="assets/icon/icon.png" type="image/x-icon">

  <!-- google fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
  <!-- Template CSS -->
</head>
<style>
    .grid {
    position: relative;
    width: 100%;
    background: #fff;
    color: #666666;
    border-radius: 2px;
    margin-bottom: 25px;
    box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
}

.grid .grid-body {
    padding: 15px 20px 15px 20px;
    font-size: 0.9em;
    line-height: 1.9em;
}

.search table tr td.rate {
    color: #f39c12;
    line-height: 50px;
}

.search table tr:hover {
    cursor: pointer;
}

.search table tr td.image {
	width: 50px;
}

.search table tr td img {
	width: 50px;
	height: 50px;
}

.search table tr td.rate {
	color: #f39c12;
	line-height: 50px;
}

.search table tr td.price {
	font-size: 1.5em;
	line-height: 50px;
}

.search #price1,
.search #price2 {
	display: inline;
	font-weight: 600;
}
</style>
<body>
  <!--header-->
  <?php include('app_layout.php') ?>
  <!-- //header -->
  <!-- about breadcrumb --><br><br><br><br><br>
  <!-- //about breadcrumb -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container">
  <div class="row">
    <!-- BEGIN SEARCH RESULT -->
    <div class="col-md-12">
      <div class="grid search">
        <div class="grid-body">
          <div class="row">
            <!-- BEGIN FILTERS -->
            <!-- END FILTERS -->
            <!-- BEGIN RESULT -->
            <div class="col-md-12">
              <?php
                $name = DB::query('SELECT category FROM categories WHERE id=:id', array(':id'=>$_GET['category_id']))[0]['category'];
               ?>
              <h2><i class="fa fa-dashboard"></i> <?php echo $name ?></h2>
              <hr>
              <div class="padding"></div>
              <div class="row">
                <!-- BEGIN ORDER RESULT -->
                <div class="col-sm-6">
                  <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"><i class="fa fa-users"></i> </span>Artisans
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Name</a></li>
                      <li><a href="#">Date</a></li>
                      <li><a href="#">View</a></li>
                      <li><a href="#">Rating</a></li>
                    </ul>
                  </div>
                </div>
                <!-- END ORDER RESULT -->
              </div>
              <!-- BEGIN TABLE RESULT -->
              <div class="table-responsive">
                <table class="table table-hover">
                  <tbody>
                    <?php
                      $allartisans = DB::query('SELECT * FROM artisans WHERE category_id=:category_id ORDER BY id DESC', array(':category_id'=>$_GET['category_id']));
                      foreach ($allartisans as $all) {
                        $allocations = DB::query('SELECT * FROM artisan_location WHERE artisan_id=:id', array(':id'=>$all['id']));
                        foreach ($allocations as $key) {
                          $locationValid = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>Login::isLoggedIn()));
                          foreach ($locationValid as $validate) {
                            if ($key['location_id'] == $validate['location_id'] ) {
                              ?>
                                <tr>
                                    <td class="image"><img src="assets/images/<?php echo $all['profile'] ?>" alt=""></td>
                                    <td class="product"><strong><?php echo $all['name'] ?></strong><br><?php echo $all['gender'] ?></td>
                                    <td class="rate text-right">
                                      <?php
                                      $ratingvalidation = DB::query('SELECT * FROM rating WHERE artisan_id=:artid', array(':artid'=>$all['id']));
                                      foreach ($ratingvalidation as $valid) {
                                        if ($valid['star'] >= 80) {
                                          echo "<img style='width:20px;height:20px' src='assets/rate/silver.png' alt=''>";
                                        }elseif ($valid['star'] >=60) {
                                          echo "<img style='width:20px;height:20px' src='assets/rate/gold.png' alt=''>";
                                        }elseif ($valid['star'] >=50){
                                          echo "<img style='width:20px;height:20px' src='assets/rate/bronze.png' alt=''>";
                                        }
                                      }
                                       ?>
                                    </td>
                                    <td class="rate "><a class="btn btn-secondary" href="profile.php?artisan_id=<?php echo $all['id'] ?>">View Profile</a> </td>
                                </tr>
                              <?php
                            }else {
                              $locationerror = DB::query('SELECT * FROM categories WHERE id=:category_id', array(':category_id'=>$all['category_id']));
                              foreach ($locationerror as $error) {
                                echo "<span class='col-md-12 col-sm-12 alert alert-danger'><i class='fa fa-toxic'></i> Sorry!!! No <strong style='color:darkred'>".$error['category']."</strong> Found in Your Location </span>";
                              }
                            }
                          }
                        }

                      }
                     ?>
                </tbody>
              </table>
              </div>
              <!-- END TABLE RESULT -->
            </div>
            <!-- END RESULT -->
          </div>
        </div>
      </div>
    </div>
    <!-- END SEARCH RESULT -->
  </div>
  </div>

  <!-- Template JavaScript -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/theme-change.js"></script>
  <!-- stats number counter-->
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.countup.js"></script>
  <script>
    $('.counter').countUp();
  </script>
  <!-- //stats number counter -->
  <!--/MENU-JS-->
  <script>
    $(window).on("scroll", function () {
      var scroll = $(window).scrollTop();

      if (scroll >= 80) {
        $("#site-header").addClass("nav-fixed");
      } else {
        $("#site-header").removeClass("nav-fixed");
      }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
      $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
      $(window).on("resize", function () {
        if ($(window).width() > 991) {
          $("header").removeClass("active");
        }
      });
    });
  </script>
  <!--//MENU-JS-->

  <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>
