<!DOCTYPE html>
<html lang="en">
<?php include('Database/Artisan_logins.php') ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit | Artisans For You</title>
    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
      rel="stylesheet">
      <link rel="icon" href="assets/icon/icon.png" type="image/x-icon">

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
  <!-- //header --><br> <br><br><br><br><br><br><br>
  <div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="assets/images/<?php echo $artisan['profile'];?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $artisan['name'] ?></h4><br>
                      <form class="" action="" method="post" enctype="multipart/form-data">
                        <input class="form-control" type="file" name="file" value=""><br>
                        <input class="btn btn-outline-secondary" type="submit" name="change" value="Update Profile">
                      </form>
                      <?php
                        if (isset($_POST['change'])) {
                          $target = "assets/images/".basename($_FILES['file']['name']);
                          $file = $_FILES['file']['name'];
                          if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
                          DB::query('UPDATE artisans SET profile=:image WHERE id=:id', array(':image'=>$file,':id'=>$_GET['id']));
                          echo "<script>window.open('ArtisanProfile.php', '_self')</script>";
                        }else {
                          echo "<span class='alert alert-danger col-md-12'>Profile wasn't able to Update!!!!</span>";
                        }

                        }
                       ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <form class="col-md-8" action="" method="post">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <input class="form-control" type="text" name="name" value="<?php echo $artisan['name'] ?>">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <input class="form-control" type="email" name="email" value="<?php echo $artisan['email'] ?>">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Gender</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <select class="form-control" name="gender">
                          <option value="<?php echo $artisan['gender'] ?>"><?php echo $artisan['gender'] ?></option>
                          <option value="Female">Female</option>
                          <option value="Male">Male</option>
                        </select>
                      </div>
                    </div>

                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Mobile</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <input class="form-control" type="text" name="telephone" value="<?php echo $artisan['telephone'] ?>">
                      </div>
                    </div>
                    <hr>
                    <input class="btn btn-primary pull-right" type="submit" name="update" value="Update">
                    </div>
                </div>
              </form>
              <?php
                if (isset($_POST['update'])) {
                  $name = $_POST['name'];
                  $email = $_POST['email'];
                  $gender = $_POST['gender'];
                  $telephone = $_POST['telephone'];
                  DB::query('UPDATE artisans SET name=:name,email=:email,gender=:gender,telephone=:telephone WHERE id=:id', array(
                    ":name"=>$name,":email"=>$email,":gender"=>$gender,":telephone"=>$telephone,":id"=>$artisan['id']
                  ));
                  echo "<span class='alert alert-success col-md-12'>Profile Updated!!!!</span>";
                  echo "<script>window.open('ArtisanProfile.php', '_self')</script>";
                }
               ?>
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
