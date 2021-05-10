<!DOCTYPE html>
<html lang="en">
<?php include('../Database/DB.php') ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Change Password | Artisan For you</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body class="login-img3-body">
  <div class="container">
    <form class="login-form" action="" method="post">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <label for="">New Pasword</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="newPass" class="form-control" placeholder="New Password">
        </div>
        <button class="btn btn-success btn-lg btn-block" name="conferm" type="submit">Conferm</button>
        <a class="btn btn-outline-primary btn-lg btn-block" href="index.php">Go Backs</a>
      </div>
    </form>
    <?php
      if (isset($_POST['conferm'])) {
        $adminid = DB::query('SELECT * FROM admin_user');
        foreach ($adminid as $admin) {
          $newPass = $_POST['newPass'];
              DB::query('UPDATE password=:newPass FROM admin_user WHERE admin_id=:adminid', array(':newPass'=>$newPass,':adminid'=>$admin['id']));
              echo "<script>window.open('index.php', '_self')</script>";
        }
    }
     ?>
  </div>
</body>

</html>
