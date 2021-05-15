<!DOCTYPE html>
<html lang="en">
<?php include('Database/Artisan_logins.php') ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Location | Artisan For You</title>
    <link rel="icon" href="assets/icon/icon.png" type="image/x-icon">

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
</style>
<body>
  <?php
  if (Login::isLoggedIn()) {
    $artisan_user = DB::query('SELECT * FROM artisans WHERE id=:id', array(':id'=>Login::isLoggedIn()));
    foreach ($artisan_user as $artisan) {
    ?>
    <div class="container-fluid">
       <div class="row div-center">
              <div class="content col-md-12">
                <h3>My location</h3>
                <hr />
                <form class="" action="" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">State and Capitals</label>
                    <select class="form-control" name="state" id="">
                      <option value="">None</option>
                      <?php $locations = DB::query('SELECT * FROM location');
                      foreach ($locations as $locate) {
                        ?>
                        <option value="<?php echo $locate['id'] ?>"><?php echo $locate['state']."/".$locate['city'] ?></option>
                        <?php
                      } ?>
                    </select>
                  </div>
                  <button type="submit" name="update" class="btn btn-primary mt-2">Update</button>
                  <a class="btn btn-default" href="dashboard.php">Go Back</a><br><br><br>
                </form>
                <?php
                    if (isset($_POST['update'])) {
                      $states = $_POST['state'];
                      if(!DB::query('SELECT * FROM artisan_location WHERE artisan_id=:artisan_id', array(':artisan_id'=>$_GET['id']))){
                      DB::query('INSERT INTO artisan_location VALUES(\'\',:artisan_id,:location_id)', array(':artisan_id'=>$artisan['id'],':location_id'=>$states));
                      echo "
                      <span class='alert alert-success'>Your Location was Added</span>
                      ";
                    }else {
                      DB::query('UPDATE artisan_location SET location_id=:location_id WHERE artisan_id=:artisan_id', array(':location_id'=>$states,':artisan_id'=>$artisan['id']));
                      echo "
                      <span class='alert alert-success'>Your Location was updates SuccessFully</span>
                      ";
                    }
                    }
                 ?>
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
