<!doctype html>
<html lang="zxx">
<?php include('Database/Artisan_logins.php') ?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard | Artisans For You</title>
  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
    rel="stylesheet">
    <link rel="icon" href="assets/icon/icon.png" type="image/x-icon">

  <!-- google fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
  <!-- Template CSS -->
</head>

<body>
  <!--header-->
  <?php
  if (Login::isLoggedIn()) {
    $artisan_user = DB::query('SELECT * FROM artisans WHERE id=:id', array(':id'=>Login::isLoggedIn()));
    foreach ($artisan_user as $artisan) {
    ?>
  <header id="site-header" class="fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg stroke">
        <h1><a class="navbar-brand mr-lg-5" href="ArtisanProfile.php">
          <img style="border-radius: 120px;width: 50px;height: 50px;" src="assets/images/<?php echo $artisan['profile'] ?>" alt="">
          </a></h1>
        <!-- if logo is image enable this
      <a class="navbar-brand" href="#index.php">
          <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
      </a> -->
        <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
          data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
          <span class="navbar-toggler-icon fa icon-close fa-times"></span>
          </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ArtisanProfile.php">My Profile</a>
            </li>
            <li class="nav-item">
              <a  class="nav-link" href="Artisanlogout.php?artisan_id=<?php echo $artisan['id'] ?>"><i class="fa fa-sign-out"></i> Logout</a>
            </li>
          </ul>
          <span style="margin-right: 10%;"><strong><?php echo $artisan['name'] ?></strong> </span>
        </div>
        <!-- toggle switch for light and dark theme -->
        <div class="mobile-position">
          <nav class="navigation">
            <div class="theme-switch-wrapper">
              <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox">
                <div class="mode-container">
                  <i class="gg-sun"></i>
                  <i class="gg-moon"></i>
                </div>
              </label>
            </div>
          </nav>
        </div>
        <!-- //toggle switch for light and dark theme -->
      </nav>
    </div>
  </header>
  <!-- //header -->
  <!-- about breadcrumb --><br><br><br><br><br>
  <!-- //about breadcrumb -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container">
    <?php
      if (!DB::query('SELECT * FROM id WHERE artisan_id=:artisanid', array(':artisanid'=>$artisan['id']))) {
        echo "<script>window.open('AttachID.php', '_self')</script>";
      }else {
        ?>
        <div class="row">
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">Notification</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sms = DB::query('SELECT * FROM msg WHERE artisan_id=:artisanid', array(':artisanid'=>$artisan['id']));
                  foreach ($sms as $message) {
                    ?>
                    <tr>
                      <td><b><?php echo $message['msg'] ?></b> </td>
                      <td>From <u style="color: blue;">
                        <?php
                        $usernames = DB::query('SELECT username FROM users WHERE id=:userid', array(':userid'=>$message['users_id']))[0]['username'];
                        echo $usernames;?>
                      </u> to your email inbox </td>
                      <td><small><span><?php echo date("F j, Y ", strtotime($message["posted_at"])); ?></span> </small> </td>
                    </tr>
                    <?php
                  }
                 ?>
              </tbody>
            </table>
          </div>
        <?php
      }
     ?>
     <div >
       <form style="margin-top: 250px;" class="row" method="post">
         <div class="form-group col-md-6">
           <textarea class="form-control" name="comment" id="textAreaExample1" placeholder="Leave a Comment" cols="30" rows="3"></textarea>
         </div>
         <div class="form-group col-md-6">
           <button class="btn btn-secondary" type="submit" name="commit"><i class="fa fa-send"></i> </button>
         </div>
       </form>
       <?php
       if (isset($_POST['commit'])) {
         $artisan_id = $artisan['id'];
         $comment = $_POST['comment'];
         $permit = "0";
         DB::query('INSERT INTO comment VALUES(\'\',:artisan_id,:comment,NOW(),:permit)', array(':artisan_id'=>$artisan_id,':comment'=>$comment,':permit'=>$permit));
         echo "<script>alert('Thank for leaving a comment !!')</script>";
         echo "<script>window.open('dashboard.php', '_self')</script>";
       }
        ?>
     </div>
   </div>
  </div>
  <!-- Template JavaScript -->
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
  <?php
  }
  }else{
    echo "<script>window.open('ArtisanLogin.php', '_self')</script>";
  }
   ?>
</body>

</html>
