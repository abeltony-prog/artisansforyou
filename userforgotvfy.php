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
                $vkey = $_POST['code'];
                if (DB::query('SELECT password FROM users WHERE password=:password', array(':password'=>$_GET['password']))[0]['password']) {
                  $code = DB::query('SELECT * FROM users WHERE password=:password', array(':password'=>$_GET['password']));
                  foreach ($code as $key) {
                    if ($vkey == $key['vkey']) {
                      header('Location:userChangerpassword.php?users='.$key['id']);
                    }else {
                      ?>
                      <p style="color:red"><?php echo "Incorrect Verification Code" ?></p>
                      <?php
                    }
                  }
                }
              }
             ?>
            <b><h3>Password Reset Email Verification</h3></b>
            <span>Check a mail sent to your google account.</span>
            <form action="" method="post">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group first">
                    <input type="text" name="code" class="form-control" placeholder="Verification Code" id="code">
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
