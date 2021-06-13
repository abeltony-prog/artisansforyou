<!DOCTYPE html>
<html lang="en">
<?php
  include('Database/DB.php');
 ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/icon/icon.png" type="image/x-icon">

    <title>Verification | Artisans For You</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</head>
<style>

.div-center {
  width: 400px;
  height: 400px;
  background-color: #fff;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  max-width: 100%;
  max-height: 100%;
  overflow: auto;
  padding: 1em 2em;
  display: table;
}

div.content {
  display: table-cell;
  vertical-align: middle;
}



</style>
<body>
    <div class="container-fluid">
        <div class="back">
       <div class="div-center">
              <div class="content">
                <h3>Check Your email for a verification Code, Thank you!!!</h3>
                <form class="" action="" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Code</label>
                    <input type="text" name="code" class="form-control" id="exampleInputcode" placeholder="Verification Code" required>
                  </div>
                  <button type="submit" name="verify" class="btn btn-primary mt-2">Continue</button>
                </form>
                <?php
                  if (isset($_POST['verify'])) {
                    $code= $_POST['code'];
                    $users = DB::query('SELECT * FROM users WHERE vkey=:vkey', array(':vkey'=>$code));
                    foreach ($users as $key) {
                      if ($key['verified'] == "0") {
                        if ($key['vkey'] == $code) {
                          $verified= "1";
                          DB::query('UPDATE users SET verified=:verified WHERE id=:id', array(':verified'=>$verified,':id'=>$key['id']));
                          echo "<script>window.open('UserLogin.php', '_self')</script>";
                        }else {
                          echo "<span class='alert alert-danger col-md-6'>Wrong Verification Code</span>";
                        }
                      }else {
                        echo "<span class='alert alert-warning col-md-6'>Account is already Verified</span>";
                      }
                    }

                }
                 ?>

              </div>
              </span>
            </div>
      </div>
    <!-- JS -->
    <script src="registration/vendor/jquery/jquery.min.js"></script>
    <script src="registration/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
