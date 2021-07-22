<!DOCTYPE html>
<html lang="en">
<?php include('Database/user_Logins.php') ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
<link href="fontawesome/css/brands.css" rel="stylesheet">
<link href="fontawesome/css/solid.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile | Artisans For You</title>
    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
      rel="stylesheet">
      <link rel="icon" href="assets/icon/icon.png" type="image/x-icon">
      <script src="jquery/jquery.barrating.min.js" charset="utf-8"></script>
      <script src="jquery/jquery.barrating.js" charset="utf-8"></script>
      <link rel="stylesheet" href="ratingstyle.css">
    <!-- google fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
<!--<script type="text/javascript">
  $(document).ready(function() {
    $('.rating').barrating({
      theme: 'fa fa-star',
      onSelect: function(value,text,event){
        var el = this;
        var ed_id = el.$elem.data('id');
        if (typeof (event) !== 'undefined') {
          var split_id = el_id.split("_");
          var postid = split_id[1];

          $.ajax({
            url: 'rating.php',
            type : 'post',
            data: {postid: postid, rating: value},
            dataType: 'json',
            success: function(data){
              var average = data['averageRating'];
              $('#avgrating_' + postid).text(average);
            }
          });
        }
      }
    });
  });
</script>-->

</head>

<body>
  <!--header-->
  <?php include('app_layout.php') ?>
  <!-- //header --><br> <br><br><br><br><br><br><br>
  <div class="modal fade" id="rateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php
        $artisanprofile = DB::query('SELECT * FROM artisans WHERE id=:artisan_id', array(':artisan_id'=>$_GET['artisan_id']));
        foreach ($artisanprofile as $profile) {
          ?>
        <div class="modal-body">
          <div class="row col-md-12">
              <form align="center" class="star-widget" action="" method="post">
                <input type="radio" name="rate" id="rate-5" value="5">
                <label for="rate-5" class="fa fa-star fa-2x"></label>
                <input type="radio" name="rate" id="rate-4" value="4">
                <label for="rate-4" class="fa fa-star fa-2x"></label>
                <input type="radio" name="rate" id="rate-3" value="3">
                <label for="rate-3" class="fa fa-star fa-2x"></label>
                <input type="radio" name="rate" id="rate-2" value="2">
                <label for="rate-2" class="fa fa-star fa-2x"></label>
                <input type="radio" name="rate" id="rate-1" value="1">
                <label for="rate-1" class="fa fa-star fa-2x"></label><br>
                <button class="btn btn-outline-primary" type="submit" name="save">Conferm</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="container">
        <div class="main-body">
              <div class="row gutters-sm">

                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                          <img src="assets/images/<?php echo $profile['profile'] ?>" alt="Admin" class="rounded-circle" width="150">
                          <div class="mt-3">
                            <h4><?php echo $profile['name'];
                            $allrates = DB::query('SELECT * FROM rating WHERE artisan_id=:artisanid', array(':artisanid'=>$profile['id']));
                            foreach ($allrates as $rates) {
                              if ( 50 >= $rates['star'] ) {
                              }elseif ( 140 >= $rates['star']) {
                                ?> ~ <span><img width="30" src="assets/rate/bronze.png" alt=""> </span><?php
                              }elseif ( 300 >= $rates['star']) {
                                ?> ~ <span><img width="30" src="assets/rate/gold.png" alt=""> </span><?php
                              }else {
                                ?> ~ <span><img width="30" src="assets/rate/silver.png" alt=""> </span><?php
                              }
                            ?>  </h4>
                            <span>Rating average:<?php echo $rates['star'] ?></span>
                            <?php
                          }

                            $categories = DB::query('SELECT * FROM categories WHERE id=:category', array(':category'=>$profile['category_id']));
                            foreach ($categories as $one) {
                            ?>
                            <p class="text-secondary mb-1">
                              <?php echo $one['category'] ?>
                            </p>
                            <?php
                            }
                             ?>
                             <?php
                              if (isset($_POST['save'])) {
                               $uID = $profile['id'];
                               $ratedIndex = $_POST['rate'];
                               if (!DB::query('SELECT * FROM rating WHERE artisan_id=:artisanid', array(':artisanid'=>$uID))) {
                                 DB::query('INSERT INTO rating VALUES(\'\', :artisan_id,:star)', array(':artisan_id'=>$uID,':star'=>$ratedIndex));
                                 echo "<br><span class='col-md-12 col-sm-12 alert alert-success'>Thanks! for rating ". $profile['name']."</span><br><br>";
                               }else {
                                 $rates = DB::query('SELECT * FROM rating WHERE artisan_id=:artisanid', array(':artisanid'=>$uID));
                                 foreach ($rates as $key) {
                                   $rate1 = $key['star'];
                                   $rateSum = $key['star'] + $ratedIndex;
                                   DB::query('UPDATE rating SET star=:ratings WHERE artisan_id=:artisanid', array('artisanid'=>$uID, ':ratings'=>$rateSum));
                                   echo "<br><span class='col-md-12 col-sm-12 alert alert-success'>Thanks! for rating ".$profile['name']."</span><br><br>";
                                 }
                               }
                             }
                              ?>
                             <form class="" action="" method="post">
                              <a class="btn btn-outline-secondary" data-toggle="modal" data-target="#rateModal" href="#"><span><i class="fa fa-star-o"></i> Rate</span></a>
                               <a class="btn btn-outline-primary" data-toggle="modal" data-target="#chatModal" href="#"><i class="fa fa-send"></i> Message</a>

                               <?php
                               $user_valid = DB::query('SELECT id FROM users WHERE id=:id', array(':id'=>Login::isLoggedIn()))[0]['id'];
                                if (!DB::query('SELECT artisan_id FROM favoriet WHERE user_id=:user_id', array(':user_id'=>$user_valid))) {
                                  ?>
                                  <button type="submit" name="favorite"  class="btn btn-outline-success"><i class="fa fa-plus"></i> Favorite</button>
                                  <?php
                                }else {
                                  ?>
                                  <button type="submit" name="remove"  class="btn btn-outline-danger"><i class="fa fa-minus"></i> Remove</button>
                                  <?php
                                }
                                ?>
                             </form>
                          </div>
                      </div>
                    </div>
                    <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-bottom-0">
                            <span><?php echo $profile['name']; ?> <i class="fa fa-user"></i></span>
                          </div>
                          <div class="modal-body">
                              <form class="row col-md-12" action="" method="post">
                                <div class="form-group col-md-10">
                                    <textarea class="col-md-12" name="message" rows="4" cols=40 placeholder="Send Message" ></textarea>
                                </div>
                                <div class="form-group col-md-2">
                                     <button class="btn btn-outline-primary col-md-12" type="submit" name="send"><i class="fa fa-send"></i></button>
                                </div>
                              </form>
                                                            <?php
                                if (isset($_POST['send'])) {
                                  $msg = "You Have a New Message";
                                  $user = DB::query('SELECT id FROM users WHERE id=:id', array(':id'=>Login::isLoggedIn()))[0]['id'];
                                  DB::query('INSERT INTO msg VALUES(\'\',:msg,:artisan_id,:users_id,NOW())', array(':msg'=>$msg,':artisan_id'=>$_GET['artisan_id'],':users_id'=>$user));
                                                                                $users = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>Login::isLoggedIn()));
                                         foreach ($users as $user) {
                                    $name = $user['username'];
                                    $email= $user['email'];
                                    $message= $_POST['message'];
                                    $to = $profile['email'];
                                    $subject = "Mail From ".$name." Artisans For You Client";
                                    $txt = $message."\r\n\r\n\r\n Email: ".$email;
                                    $headers = "From: noreply@artisansforyou.com " . "\r\n" .
                                    "CC: ".$user['email']."";
                                    if($email!=NULL){
                                        mail($to,$subject,$txt,$headers);
                                    }
                                    //redirect
                                    header("Location:index.php");
                                      }

                                }
                               ?>
                          </div>
                        </div>
                      </div>
                    </div>

                    <?php
                    $user_validation = DB::query('SELECT id FROM users WHERE id=:id', array(':id'=>Login::isLoggedIn()))[0]['id'];
                      if (isset($_POST['favorite'])) {
                        if (!DB::query('SELECT artisan_id FROM favoriet WHERE user_id=:user_id', array(':user_id'=>$user_validation))) {
                        $artisan_id = $profile['id'];
                        $user_id = DB::query('SELECT id FROM users WHERE id=:id', array(':id'=>Login::isLoggedIn()))[0]['id'];
                        DB::query('INSERT INTO favoriet VALUES(\'\', :artisan_id, :user_id)', array(':artisan_id'=>$artisan_id, ':user_id'=>$user_id));
                        echo "<span class='col-md-12 col-sm-12 alert alert-success'>Thanks! for adding ".$profile['name']." to your favourite!!</span>";
                      }else {
                        echo "<span class='col-md-12 col-sm-12 alert alert-warning'>Artisan <strong>".$profile['name']."</strong> is already in your favourite!</span>";
                      }
                    }elseif (isset($_POST['remove'])) {
                      $userid = DB::query('SELECT id FROM users WHERE id=:id', array(':id'=>Login::isLoggedIn()))[0]['id'];
                      DB::query('DELETE FROM favoriet WHERE user_id=:userid AND artisan_id=:artisanid', array(':userid'=>$userid, ':artisanid'=>$profile['id']));
                      echo "<script>window.open('index.php', '_self')</script>";
                    }
                     ?>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <?php echo $profile['name'] ?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <?php echo $profile['email'] ?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Mobile</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <?php echo $profile['telephone'] ?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <?php
                          $artisanlocation = DB::query('SELECT * FROM artisan_location WHERE artisan_id=:artisan_id', array(':artisan_id'=>$_GET['artisan_id']));
                          foreach ($artisanlocation as $location) {
                            $lo = DB::query('SELECT * FROM location WHERE id=:id', array(':id'=>$location['location_id']));
                            foreach ($lo as $key) {
                              echo $key['state'].",".$key['city'];
                            }
                          }
                           ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="container">
                  <div class="row" id="gallery" data-toggle="modal" data-target="#exampleModal">
                    <?php
                      $allphotoes = DB::query('SELECT * FROM gallery WHERE artisan_id=:artisanid ORDER BY id DESC LIMIT 50', array(':artisanid'=>$_GET['artisan_id']));
                      foreach ($allphotoes as $photo) {
                      ?>
                      <div class="col-12 col-sm-6 col-lg-3 mb-2">
                        <img class="w-100" src="assets/gallery/<?php echo $photo['file'] ?>" data-target="#carouselExample" data-slide-to="0">
                      </div>
                      <?php
                      }
                     ?>
                    </div>
                  </div>
              </div>
            </div>
        </div>

                                  <?php
                                }
                                 ?>
        <script defer src="fontawesome/js/all.js"></script> <!--load all styles -->
        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="assets/js/theme-change.js"></script>
        <!-- stats number counter-->
        <script src="assets/js/jquery.waypoints.min.js"></script>
        <script src="assets/js/jquery.countup.js"></script>
        <script>
          $('.counter').countUp();
        </script>
        <!-- //stats number counter -->
        <!--/MENU-JS-->
        <script>
          $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
              $("#site-header").addClass("nav-fixed");
            } else {
              $("#site-header").removeClass("nav-fixed");
            }
          });

          //Main navigation Active Class Add Remove
          $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
          });
          $(document).on("ready", function () {
            if ($(window).width() > 991) {
              $("header").removeClass("active");
            }
            $(window).on("resize", function () {
              if ($(window).width() > 991) {
                $("header").removeClass("active");
              }
            });
          });
        </script>
        <!--//MENU-JS-->

        <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
