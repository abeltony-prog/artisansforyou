<!DOCTYPE html>
<html lang="en">
<?php include('Database/Artisan_logins.php') ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KAM | Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</head>
<style>
    .back {
  background: #e2e2e2;
  width: 100%;
  position: absolute;
  top: 0;
  bottom: 0;
}

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
  border-bottom: 2px solid #ccc;
  display: table;
}

div.content {
  display: table-cell;
  vertical-align: middle;
}
</style>
<body>
  <?php
  if (Login::isLoggedIn()) {
    $artisan_user = DB::query('SELECT * FROM artisans WHERE id=:id', array(':id'=>Login::isLoggedIn()));
    foreach ($artisan_user as $artisan) {
    ?>
    <div class="container-fluid">
        <div class="back">
       <div class="div-center">
              <div class="content">
                <h3>Final Step</h3>
                <hr />
                <form class="" action="" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nationality</label>
                    <input type="text" name="nationality" class="form-control" id="exampleInputEmail1" placeholder="Nationality" required>
                  </div>
                  <div class="form-group mt-2">
                    <label for="exampleInputPassword1">Attach ID Photocopy</label>
                    <input type="file" name="file" class="form-control" id="exampleInputPassword1">
                  </div>
                  <button type="submit" name="signup" class="btn btn-primary mt-2">Sign Up</button>
                  <hr />
                </form>

              </div>
              </span>
            </div>
      </div>
    <!-- JS -->
    <script src="registration/vendor/jquery/jquery.min.js"></script>
    <script src="registration/js/main.js"></script>
</body>
<?php
}
}else{
  echo "<script>window.open('ArtisanLogin.php', '_self')</script>";
}
 ?>
</html>
