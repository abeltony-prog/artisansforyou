<!DOCTYPE html>
<html lang="en">
<?php include('Database/Artisan_logins.php') ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/icon/icon.png" type="image/x-icon">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Artisans For You | Profile</title>
    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
      rel="stylesheet">
    <!-- google fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
  <?php
  if (Login::isLoggedIn()) {
    $artisan_user = DB::query('SELECT * FROM artisans WHERE id=:id', array(':id'=>Login::isLoggedIn()));
    foreach ($artisan_user as $artisan) {
    ?>
  <!--header-->
  <header id="site-header" class="fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg stroke">
        <h1><a class="navbar-brand mr-lg-5" href="index.php">
          <img style="border-radius: 120px;width: 50px;height: 50px;" src="assets/images/<?php echo $artisan['profile'] ?>" alt="">
          </a></h1>
        <!-- if logo is image enable this
      <a class="navbar-brand" href="#index.php">
          <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
      </a> -->
        <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
          data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
          <span class="navbar-toggler-icon fa icon-close fa-times"></span>
          </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ArtisanProfile.php">My Profile</a>
            </li>
          </ul>
          <span style="margin-right: 10%;"><strong><?php echo $artisan['name'] ?></strong> </span>
        </div>
        <form class="d-lg-block d-none" action="" method="post">
          <button class="btn btn-secondary" type="submit" name="logout"><span><i class="fa fa-sign-out"></i>Logout</span></button>
        </form>
        <?php
if (!Login::isLoggedIn()) {
die("<script>window.open('ArtisanLogin.php', '_self')</script>");
}
if (isset($_POST['logout'])) {
DB::query('DELETE FROM artisan_login WHERE artisan_id =:id', array(':id'=>Login::isLoggedIn()));
echo "<script>window.open('ArtisanLogin.php', '_self')</script>";
if (isset($_COOKIE['SNID'])) {
DB::query('DELETE FROM artisan_login WHERE tokens =:token', array(':token'=>sha1($_COOKIE['SNID'])));
echo "<script>window.open('ArtisanLogin.php', '_self')</script>";
}
setcookie('SNID', '1' , time()-3600);
setcookie('SNID_', '1' , time()-3600);
}
?>
        <!-- toggle switch for light and dark theme -->
        <div class="mobile-position">
          <nav class="navigation">
            <div class="theme-switch-wrapper">
              <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox">
                <div class="mode-container">
                  <i class="gg-sun"></i>
                  <i class="gg-moon"></i>
                </div>
              </label>
            </div>
          </nav>
        </div>
        <!-- //toggle switch for light and dark theme -->
      </nav>
    </div>
  </header>
  <!-- //header --><br> <br><br><br><br><br><br><br>
  <div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="assets/images/<?php echo $artisan['profile'] ?>" alt="<?php echo $artisan['profile'] ?>" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $artisan['name'] ?>
                        <?php
                        $ratingvalidation = DB::query('SELECT * FROM rating WHERE artisan_id=:artid', array(':artid'=>$artisan['id']));
                        foreach ($ratingvalidation as $valid) {
                          if ($valid['star'] >= 80) {
                            echo "<img width='30' src='assets/rate/silver.png' alt=''>";
                          }elseif ($valid['star'] >=60) {
                            echo "<img width='30' src='assets/rate/gold.png' alt=''>";
                          }elseif ($valid['star'] >=50){
                            echo "<img width='30' src='assets/rate/bronze.png' alt=''>";
                          }
                        }
                         ?>
                      </h4> <br>
                      <a class="btn btn-outline-secondary" href="Changelocation.php?id=<?php echo $artisan['id']; ?>"><span> <i class="fa fa-map"></i> Update My Location</span></a>
                      <a href="edit.php?id=<?php echo $artisan['id'] ?>" class="btn btn-outline-success">Edit Profile</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $artisan['name'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $artisan['email'] ?>
                    </div>
                  </div>
                  <hr>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $artisan['gender'] ?>
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $artisan['telephone'] ?>
                    </div>
                  </div>
                  <hr>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
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
    <?php
    }
    }else{
      echo "<script>window.open('ArtisanLogin.php', '_self')</script>";
    }
     ?>
</body>
</html>
