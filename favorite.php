<!DOCTYPE html>
<html lang="en">
<?php include('Database/user_Logins.php') ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Artisan For You | My Favorite</title>
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
        <div class="row">
          <?php
            $favoriteartisan = DB::query('SELECT * FROM favoriet WHERE user_id=:id', array(':id'=>Login::isLoggedIn()));
            foreach ($favoriteartisan as $favorite) {
              $artisanprofile = DB::query('SELECT * FROM artisans WHERE id=:id', array(':id'=>$favorite['artisan_id']));
              foreach ($artisanprofile as $profile) {
                ?>
                <div class="col-sm-3">
                  <div style="background-color: transparent;" class="card" style="width: 18rem;">
                    <div class="card-body">
                        <img src="assets/images/<?php echo $profile['profile'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p><strong><?php echo $profile['name'] ?></strong></p>
                          <?php
                          $category = DB::query('SELECT * FROM categories WHERE id=:id', array(':id'=>$profile['category_id']));
                          foreach ($category as $cat) {
                            ?>
                            <Span><?php echo $cat['category'] ?></Span><br>
                            <?php
                          }
                           ?>
                        </div>
                        <a href="profile.php?artisan_id=<?php echo $profile['id'] ?>" class="btn btn-outline-primary">Profile</a>
                    </div>
                  </div>
                </div>
                <?php
              }

            }
           ?>
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
