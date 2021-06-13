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
    <title>Sign Up | Artisan For you</title>
  </head>
  <body>
  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('signinAssets/images/bg_3.png');"></div>
    <div class="contents order-2 order-md-1">
      <div class="container">
        <div class="row justify-content-center">
          <?php
          if (isset($_POST['next'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $mobile = $_POST['mobile'];
            $password = $_POST['password'];
            $location = $_POST['location'];
            $profile ="default.png";
            $Repassword = $_POST['Repassword'];
            $verified = "0";
            $token = "qwerty!?#uiopasdf123456ghjklzxcvbn09876543peorumQWERTYU1234!?#$56IOPASDFGHJKLZXCVNM789!?#$";
            $token= str_shuffle($token);
            $token = substr($token , 0,6);
               if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {
                 if (strlen($password) < 8) {
                   echo "<span class='alert alert-warning col-md-6'>Password Must be atleast 8 characters</span>";
                 }elseif ($password != $Repassword) {
                   echo "";
                   echo "<span class='alert alert-warning col-md-6'>Check you passwords inputs don't match</span>";
                 }else {
                   DB::query('INSERT INTO users VALUES(\'\', :username,:email,:gender,:mobile,:password,:location_id,:profile,:vkey,:verified)',
                  array(":username"=>$username,":email"=>$email,":gender"=>$gender,":mobile"=>$mobile,":password"=>password_hash($password, PASSWORD_BCRYPT),":location_id"=>$location,":profile"=>$profile,':vkey'=>$token,':verified'=>$verified));
                  echo "<script>window.open('userver.php', '_self')</script>";
                 }
          }else {
            echo "<span class='alert alert-warning col-md-6'>Email in Use , Try a different email</span>";
          }
        }
           ?>
          <div class="col-md-10 py-5">
            <b><h3>Signup</h3></b>
            <form action="" method="post">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group first">
                    <label for="fname">Full Names</label>
                    <input type="text" name="username" class="form-control" placeholder="e.g. John Kant" id="fname" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group first">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="e.g. john@your-domain.com" id="email" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group last mb-3">
                    <label for="password">Gender</label>
                    <select class="form-control" name="gender" required>
                      <option value="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="lname">Phone Number</label>
                    <input type="text" name="mobile" class="form-control" placeholder="+00 0000 000 0000" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group last mb-3">
                    <label for="re-password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Your Password" id="re-password" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group last mb-3">
                    <label for="re-password">Re_type Password</label>
                    <input type="password" name="Repassword" class="form-control" placeholder="Re_type Your Password" id="re-password" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group last mb-3">
                    <label for="password">Location</label>
                    <select class="form-control" name="location" required>
                      <?php
                        $locations = DB::query('SELECT * FROM location');
                       ?>
                      <option value="">Select Location</option>
                      <?php
                      foreach ($locations as $destination) {
                      ?>
                      <option value="<?php echo $destination['id']?>"><?php echo $destination['state']."/".$destination['city'] ?></option>
                      <?php
                      }
                       ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="d-flex mb-5 mt-4 align-items-center">
                <div class="d-flex align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Creating an account means you're okay with our <a href="#">Terms and Conditions</a> and our <a href="#">Privacy Policy</a>.</span>
                  <input type="checkbox" required/>
                  <div class="control__indicator"></div>
                </label>
              </div>
              </div>
              <a class="btn px-2 btn-default" href="UserLogin.php">Have an account?</a><br>
              <input type="submit" name="next" value="Next" class="btn px-5 btn-primary">
            </form>
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
