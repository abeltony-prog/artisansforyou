<!DOCTYPE html>
<html lang="en">
<?php include('Database/user_Logins.php') ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Artisan For You| My profile Edit</title>
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
                        <img src="assets/images/<?php echo $user['profile'] ?>" alt="Admin" class="rounded-circle" width="150">
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
                          <a href="locationChange.php" class="btn btn-outline-secondary"><i class="fa fa-pin"></i> Change My Location</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <form class="" action="" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Choose Profile Image</h6>
                          </div>
                          <div class="col-sm-6 text-secondary">
                            <input class="form-control" type="file" name="file" value="">
                          </div>
                          <div class="col-sm-3 text-secondary">
                            <input class="btn btn-outline-secondary pull-right" type="submit" name="change" value="Change">
                          </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['change'])) {
                      $target = "assets/images/".basename($_FILES['file']['name']);
                      $file = $_FILES['file']['name'];
                      if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
                          DB::query('UPDATE users SET profile=:profile WHERE id=:id', array(':id'=>$user['id'],':profile'=>$file));
                          echo "<script>window.open('Myprofile.php', '_self')</script>";
                      }
                    }
                     ?>
<hr>
                    <form class="" action="" method="post">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <input class="form-control" type="text" name="name" value="<?php echo $user['username'] ?>">
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <input class="form-control" type="text" name="email" value="<?php echo $user['email'] ?>">
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Gender</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <input class="form-control" type="text" name="gender" value="<?php echo $user['gender'] ?>" disabled>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Mobile</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <input class="form-control" type="text" name="mobile" value="<?php echo $user['mobile'] ?>">
                          </div>
                        </div>

                      </div>
                      <a class="btn btn-outline-secondary pull-right" href="Myprofile.php">Go Back</a>
                      <input class="btn btn-primary pull-right" type="submit" name="update" value="Update">
                    </form>
                    <?php
                      if (isset($_POST['update'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $telephone = $_POST['mobile'];
                        DB::query('UPDATE users SET username=:name,email=:email,mobile=:telephone WHERE id=:id', array(
                          ":name"=>$name,":email"=>$email,":telephone"=>$telephone,":id"=>$user['id']
                        ));
                        echo "<span class='alert alert-success col-md-12'>Profile Updated!!!!</span>";
                        echo "<script>window.open('Myprofile.php', '_self')</script>";
                      }
                     ?>

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
