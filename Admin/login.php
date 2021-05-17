<!DOCTYPE html>
<html lang="en">
<?php include('../Database/DB.php') ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="artisans for you">
  <meta name="author" content="">
  <link rel="icon" href="../assets/icon/icon.png" type="image/x-icon">

  <title>Login | Artisan For you</title>

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
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="name" class="form-control" placeholder="Username" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>
      </div>
    </form>
    <?php
      if (isset($_POST['login'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        if (DB::query('SELECT name FROM admin_user WHERE name = :name', array(':name'=>$name))) {
          if (password_verify($password , DB::query('SELECT password FROM admin_user WHERE name=:name', array(':name'=>$name))[0]['password'])) {
            $cstrong = True;
            $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
            $admin_id = DB::query('SELECT id FROM admin_user WHERE name=:name', array(':name'=>$name))[0]['id'];
            DB::query('INSERT INTO admin_logins VALUES(\'\', :admin_id,:tokens)', array(':tokens'=>sha1($token),':admin_id'=>$admin_id));
            setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
            setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
            echo "<script>window.open('index.php', '_self')</script>";
          }else {
            echo "<script>alert('Unknown Password')</script>";
          }
        }else {
          echo "<script>alert('Unknown User and Wrong password')</script>";
        }
    }
     ?>
  </div>
</body>

</html>
