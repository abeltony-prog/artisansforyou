<!DOCTYPE html>
<html lang="en">
<?php include('Database/DB.php') ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KAM | User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</head>
<style>
body{
  overflow-x: hidden;
}
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
                <h3>Sign up</h3>
                <hr />
                <form class="" action="" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Full Name">
                  </div>
                  <div class="form-group mt-2">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" id="" placeholder="Email">
                  </div>
                  <div class="form-group mt-2">
                    <label for="exampleInputPassword1">Telephone Number</label>
                    <input type="text" name="telephone" class="form-control" id="" placeholder="Telephone Number">
                  </div>
                  <div class="form-group mt-2">
                    <label for="exampleInputPassword1">Gender</label>
                    <select class="form-control" name="gender" id="">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="none">Rather not say</option>
                    </select>
                  </div>
                  <div class="form-group mt-2">
                    <label for="exampleInputPassword1">Type of Work</label>
                    <select class="form-control" name="category" id="">
                      <option value="">Select what you do</option>
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
                  <div class="form-group mt-2">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="**************">
                  </div>
                  <div class="form-group mt-2">
                    <label for="exampleInputPassword1">Re-enter Password</label>
                    <input type="password" name="Repassword" class="form-control" id="exampleInputPassword1" placeholder="Re-enter password">
                  </div>
                  <button type="submit" name="next" class="btn btn-primary mt-2 pull-right">Next</button>
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
              </span>
            </div>
      </div>
    <!-- JS -->
    <script src="registration/vendor/jquery/jquery.min.js"></script>
    <script src="registration/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
