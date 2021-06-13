<!doctype html>
<html lang="en">
<?php include('Database/DB.php') ?>
  <head>
    <!-- Required meta tags -->
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
    <div class="bg order-1 order-md-2" style="background-image: url('signinAssets/images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 py-5">
            <h3>Signup</h3>
            <p class="mb-4">Artisans For You</p>
            <form action="" method="post">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group first">
                    <label for="fname">Full Names</label>
                    <input type="text" name="name" class="form-control" placeholder="e.g. John Kant" id="fname">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="e.g. john@your-domain.com" id="email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="lname">Phone Number</label>
                    <input type="text" name="telephone" class="form-control" placeholder="+00 0000 000 0000" id="lname">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group last mb-3">
                    <label for="password">Gender</label>
                    <select class="form-control" name="gender">
                      <option value="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group last mb-3">
                    <label for="password">Type of Work</label>
                    <select class="form-control" name="category">
                      <option value="">Select who you are</option>
                      <?php
                      $allcategories = DB::query('SELECT * FROM categories');
                      foreach ($allcategories as $category) {
                        ?>
                        <option value="<?php echo $category['id'] ?>"><?php echo $category['category'] ?></option>
                        <?php
                      }
                       ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">

                  <div class="form-group last mb-3">
                    <label for="re-password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Your Password" id="re-password">
                  </div>
                </div>
                <div class="col-md-6">

                  <div class="form-group last mb-3">
                    <label for="re-password">Re_type Password</label>
                    <input type="password" name="Repassword" class="form-control" placeholder="Re_type Your Password" id="re-password">
                  </div>
                </div>
              </div>

              <div class="d-flex mb-5 mt-4 align-items-center">
                <div class="d-flex align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Creating an account means you're okay with our <a href="#">Terms and Conditions</a> and our <a href="#">Privacy Policy</a>.</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
              </div>
              </div>

              <input type="submit" name="next" value="Next" class="btn px-5 btn-primary">
              <a class="btn px-5 btn-default" href="index.php">Back</a>
            </form>
            <?php
              if (isset($_POST['next'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $tel = $_POST['telephone'];
                $gender = $_POST['gender'];
                $category = $_POST['category'];
                $profile = "default.png";
                $password= $_POST['password'];
                $Repassword = $_POST['Repassword'];
                  if ($password == $Repassword) {
                    if (!DB::query('SELECT email FROM artisans WHERE email=:email', array(':email'=>$email))[0]['email']) {
                    DB::query('INSERT INTO artisans VALUES(\'\', :name,:email,:telephone,:gender,:category_id,:profile,:password)',
                    array(':name'=>$name,':email'=>$email,':telephone'=>$tel,':gender'=>$gender,':category_id'=>$category,':profile'=>$profile,':password'=>password_hash($password, PASSWORD_BCRYPT)));
                    if (DB::query('SELECT email FROM artisans WHERE email = :email', array(':email'=>$email))) {
                      if (password_verify($password , DB::query('SELECT password FROM artisans WHERE email=:email', array(':email'=>$email))[0]['password'])) {
                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $artisan_id = DB::query('SELECT id FROM artisans WHERE email=:email', array(':email'=>$email))[0]['id'];
                        DB::query('INSERT INTO artisan_login VALUES(\'\', :artisan_id,:tokens)', array(':tokens'=>sha1($token),':artisan_id'=>$artisan_id));
                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
                        echo "<span class='alert alert-success col-md-12'>Thank you for registering!!</span>";
                        echo "<script>window.open('AttachID.php', '_self')</script>";
                      }
                    }
                  }else {
                    echo "<span class='alert alert-warning col-md-12'>Email in use , Use a different email</span>";
                  }
                }else {
                  echo "<span class='alert alert-danger col-md-12'>Password Don't match</span>";
                }
              }
             ?>
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
