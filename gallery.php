<!doctype html>
<html lang="zxx">
<?php include('Database/Artisan_logins.php') ?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>KAM | Gallery</title>
  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
    rel="stylesheet">
  <!-- google fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
  <!-- Template CSS -->
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
          <img style="border-radius: 120px;width: 50px;height: 50px;" src="assets/images/<?php echo $artisan['profile']; ?>" alt="">
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
        <div class="d-lg-block d-none">
          <a href="#" class="btn btn-secondary"><span><i class="fa fa-sign-out"></i>Logout</span></a>
        </div>
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
  <!-- //header -->
  <!-- about breadcrumb --><br><br><br><br><br>
  <!-- //about breadcrumb -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container">
    <form class="form-group" action="" method="post" enctype="multipart/form-data" >
      <div class="row col-md-12">
        <input class="form-control col-md-6" type="file" name="file" value="">
        <input class="btn btn-secondary col-md-5 ml-3" type="submit" name="upload" value="Add">
      </div>
    </form><hr>
    <?php
    if (isset($_POST['upload'])) {
      $target = "assets/gallery/".basename($_FILES['file']['name']);
      $file = $_FILES['file']['name'];

      if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
      DB::query('INSERT INTO gallery VALUES(\'\',:artisan_id,:file)', array(':artisan_id'=>$artisan['id'],':file'=>$file
    ));
    echo "<span class='alert alert-outline-secondary col-md-12'>Photo was able to Uploaded!!!!</span>";
      echo "<script>window.open('gallery.php', '_self')</script>";
      }else {
        echo "<span class='alert alert-danger col-md-12'>Photo wasn't able to Upload!!!!</span>";
      }
    }
     ?>
    <div class="row" id="gallery" data-toggle="modal" data-target="#exampleModal">
      <?php
        $allphotoes = DB::query('SELECT * FROM gallery WHERE artisan_id=:artisanid', array(':artisanid'=>$artisan['id']));
        foreach ($allphotoes as $photoes) {
          ?>
          <div class="col-12 col-sm-6 col-lg-3 mb-2">
            <img class="w-100" src="assets/gallery/<?php echo $photoes['file'] ?>" data-target="#carouselExample" data-slide-to="0">
          </div>
          <?php
        }
       ?>
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
  <?php
  }
  }else{
    echo "<script>window.open('ArtisanLogin.php', '_self')</script>";
  }
   ?>
</body>

</html>
