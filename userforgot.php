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
                $useremail = $_POST['email'];
                $email = DB::query('SELECT * FROM users WHERE email=:email', array(':email'=>$useremail));
                if (DB::query('SELECT * FROM users WHERE email=:email', array(':email'=>$useremail))) {
                  foreach ($email as $key) {
                    $token = $key['vkey']."123";
                    $token= str_shuffle($token);
                    $token = substr($token , 0,5);
                    DB::query('UPDATE users SET vkey=:token WHERE email=:email', array(':email'=>$key['email'],':token'=>$token));
                    header('Location:userforgotvfy.php?password='.$key['password']);
                  }
                }else {
                  ?>
                  <p style="color:red"><?php echo "Incorrect email" ?></p>
                  <?php
                }
              }
             ?>
            <b><h3>Reset Password</h3></b>
            <form action="" method="post">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group first">
                    <label for="email">Your Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="example@artisansforyou.com" id="email">
                  </div>
                </div>
              </div>
              <p><a href="UserLogin.php">Remember password?</a></p>
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
