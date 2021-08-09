<!doctype html>
<html lang="en">
<?php include('Database/DB.php') ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
<link href="fontawesome/css/solid.css" rel="stylesheet">
<link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
<link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
  rel="stylesheet">
    <link rel="stylesheet" href="signinAssets/fonts/icomoon/style.css">
    <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
      rel="stylesheet">
    <link rel="stylesheet" href="signinAssets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="signinAssets/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="signinAssets/css/style.css">

    <title>Sign in | Artisans For you</title>
    <script defer src="fontawesome/js/brands.js"></script>
<script defer src="fontawesome/js/solid.js"></script>
<script defer src="fontawesome/js/fontawesome.js"></script>
  </head>
  <style media="screen">
    body{
      overflow-y: hidden;
    }
    span{
      transform: translate(0,-50%);
      top: 60%;
      margin-left:450px;
      position: absolute;
      cursor: pointer;
    }
    .fa{
      font-size: 20px;
      color: #7a797e;
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
              if (isset($_POST['signin'])) {
                $email= $_POST['email'];
                $password = $_POST['password'];
                  if (DB::query('SELECT email FROM artisans WHERE email = :email', array(':email'=>$email))) {
                    if (password_verify($password , DB::query('SELECT password FROM artisans WHERE email=:email', array(':email'=>$email))[0]['password'])) {
                      $vercheck = DB::query('SELECT verified FROM artisans WHERE email=:email', array(':email'=>$email))[0]['verified'];
                      if ($vercheck != 0) {
                      $cstrong = True;
                      $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                      $artisan_id = DB::query('SELECT id FROM artisans WHERE email=:email', array(':email'=>$email))[0]['id'];
                      DB::query('INSERT INTO artisan_login VALUES()', array(':tokens'=>sha1($token),':artisan_id'=>$artisan_id));
                      setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
                      setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
                      echo "<script>window.open('artisanProfile.php', '_self')</script>";
                    }else {
                    //  echo "<script>alert('Your account is not Verified, please Check Your email For a verification code')</script>";
                      echo "<span style='color:red' class='col-md-12'>Your account is not Verified, please Check Your email For a verification code</span><hr>";
                    }
                  }else {
                    echo "<span class='alert alert-danger col-md-6'>Unknown Password</span><hr>";
                  //  echo "<span class='alert alert-warning col-md-6'>Unknown User</span>";
                  }
                }else {
                  echo "<script>alert('Unknown Email , Please Register')</script>";
                  echo "<script>window.open('ArtisanReg.php', '_self')</script>";
                }
            }
             ?>
            <b><h3>Login</h3></b>
            <form action="" method="post">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group first">
                    <label for="fname">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="example@artisansforyou.com" id="email">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group first">
                    <label for="fname"><i class="fa fa-users"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                    <span aria-hidden="true" onclick="show()"><i class="fa fa-eye"></i>Show</span>
                  </div>

                </div>
              </div>
              <p><a href="Artisanforgot.php">Forgot Password?</a> / <a href="ArtisanReg.php">Don't have an account?</a><br></p>
              <input type="submit" class="btn btn-primary" name="signin" value="Login">
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function show() {
      var password = document.getElementById('password');
      var icon = document.querySelector('.fas');
      if (password.type === "password") {
        password.type = "text";
        password.style.marginTop = "20px";
        icon.style.color = "#7f2092";

      }else {
        password.type = "password";
        icon.style.color = "gery";
      }
    }
  </script>
    <script src="signinAssets/js/jquery-3.3.1.min.js"></script>
    <script src="signinAssets/js/popper.min.js"></script>
    <script src="signinAssets/js/bootstrap.min.js"></script>
    <script src="signinAssets/js/main.js"></script>
  </body>
</html>
