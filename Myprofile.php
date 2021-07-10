<!DOCTYPE html>
<html lang="en">
<?php include('Database/user_Logins.php') ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Artisan For You| My profile</title>
    <link rel="icon" href="assets/icon/icon.png" type="image/x-icon">

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
      rel="stylesheet">
    <!-- google fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
  <!--header-->
    <?php include('app_layout.php') ?>
  <!-- //header --><br> <br><br><br><br><br><br><br>
    <div class="container">
        <div class="main-body">
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <div class="mt-3">
                          <h4> <?php echo $user['username'] ?></h4>
                          <?php
                          $location = DB::query('SELECT * FROM location WHERE id=:location_id', array(':location_id'=>$user['location_id']));
                          foreach ($location as $value) {
                            ?>
                            <p class="text-secondary mb-1"><address><?php echo $value['state']."/".$value['city'] ?></address></p>
                            <?php
                          }
                           ?>
                          <a href="userEdit.php" class="btn btn-outline-success">Edit Profile</a>
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
                          <?php echo $user['username'] ?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <?php echo $user['email'] ?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Gender</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <?php echo $user['gender'] ?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Mobile</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <?php echo $user['mobile'] ?>
                        </div>
                      </div>
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
</body>
</html>
