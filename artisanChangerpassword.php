<!doctype html>
<html lang="en">
<?php include('Database/DB.php') ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="signinAssets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="signinAssets/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="signinAssets/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="signinAssets/css/style.css">
    <title>Forgot Password | Artisan For you</title>
  </head>
  <style media="screen">
    body{
      overflow-y: hidden;
    }
  </style>
  <body>
  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-1" style="background-image: url('signinAssets/images/bg_3.png');"></div>
    <div class="contents order-2 order-md-1">
      <div class="container">
        <div class="row  justify-content-center">
          <div class="col-md-6 py-5">
            <?php
              if (isset($_POST['reset'])) {
                $password = $_POST['password'];
                $newpassword = $_POST['repassword'];
                if ($password == $newpassword) {
                  DB::query('UPDATE artisans SET password=:password WHERE id=:id', array(':password'=>password_hash($newpassword, PASSWORD_BCRYPT),':id'=>$_GET['artisan']));
                  header('Location:UserLogin.php');
                }else {
                  ?>
                  <p><span style="color:red">Passwords don't match!!</span></p>
                  <?php
                }
              }
             ?>
            <b><h3>Password Reset</h3></b>
            <form action="" method="post">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group first">
                    <label for="">New Password</label>
                    <input type="password" name="password" class="form-control" placeholder="New password" id="password">
                  </div>
                  <div class="form-group first">
                  <label for="">Re_enter the Password</label>
                  <input type="password" name="repassword" class="form-control" placeholder="Re_enter Password" id="password">
                </div>
              </div>
                </div>
              <input type="submit" class="btn btn-primary" name="reset" value="Next">
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="signinAssets/js/jquery-3.3.1.min.js"></script>
    <script src="signinAssets/js/popper.min.js"></script>
    <script src="signinAssets/js/bootstrap.min.js"></script>
    <script src="signinAssets/js/main.js"></script>
  </body>
</html>
