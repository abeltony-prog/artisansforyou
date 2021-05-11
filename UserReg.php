<!DOCTYPE html>
<html lang="en">
<?php include('Database/DB.php') ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login | Artisans For You </title>
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
    <div class="container-fluid">
        <div class="back">
            <div class="div-center">
              <div class="content">
                <h3>Create Account</h3>
                <hr />
                <form class="" action="" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group mt-2">
                    <label for="exampleInputEmail1">Gender</label>
                    <select class="form-control" name="gender" id="">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="none">Rather Not say</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="text" name="mobile" class="form-control" id="" placeholder="Mobile Number">
                  </div>
                  <div class="form-group mt-2">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="" placeholder="Password">
                  </div>
                  <div class="form-group mt-2">
                    <label for="exampleInputEmail1">Select State & City You Located in</label>
                    <select class="form-control" name="location" id="">
                      <?php
                        $locations = DB::query('SELECT * FROM location');
                       ?>
                        <option value="">None</option>
                        <?php
                        foreach ($locations as $destination) {
                        ?>
                        <option value="<?php echo $destination['id']?>"><?php echo $destination['state']."/".$destination['city'] ?></option>
                        <?php
                        }
                         ?>
                    </select>
                  </div>
                  <button type="submit" name="signup" class="btn btn-primary mt-2">SignUp</button><br><br>
                </form>
                <?php
                if (isset($_POST['signup'])) {
                  $username = $_POST['username'];
                  $email = $_POST['email'];
                  $gender = $_POST['gender'];
                  $mobile = $_POST['mobile'];
                  $password = $_POST['password'];
                  $location = $_POST['location'];
                  $profile ="default.png";
                  if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))[0]['email']) {
                    DB::query('INSERT INTO users VALUES(\'\', :username,:email,:gender,:mobile,:password,:location_id,:profile)', array(
                      ":username"=>$username,":email"=>$email,":gender"=>$gender,":mobile"=>$mobile,":password"=>password_hash($password, PASSWORD_BCRYPT),":location_id"=>$location,":profile"=>$profile
                    ));
                    echo "<script>window.open('UserLogin.php', '_self')</script>";
                  }else {
                    echo "<span class='alert alert-warning col-md-12'>Email in use , Use a different email</span>";
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
