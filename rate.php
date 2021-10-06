<html>
<?php include('Database/user_Logins.php') ?>

    <head>
                <link rel="stylesheet" href="fontawesome/css/all.css">
        <link rel="stylesheet" href="ratingstyle.css">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
    rel="stylesheet">
    <link rel="icon" href="assets/icon/icon.png" type="image/x-icon">
  <!-- google fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
  <!-- Template CSS -->
        <title>Rating | Artisans For You</title>
    </head>
    <body>
   <!--header-->
  <?php include('app_layout.php') ?>
        <div class="container">
        <div class="one col-md-12">
        <?php
                              if (isset($_POST['save'])) {
                               $uID = $_GET['artisanid'];
                               $ratedIndex = $_POST['rate'];
                               if (!DB::query('SELECT * FROM rating WHERE artisan_id=:artisanid', array(':artisanid'=>$uID))) {
                                   $person = 1;
                                   DB::query('INSERT INTO rating VALUES(\'\', :artisan_id,:star,:people)', array(':artisan_id'=>$uID,':star'=>$ratedIndex,':people'=>$person));
                                   //echo "<br><span class='col-md-12 col-sm-12 alert alert-success'>Thanks! for rating ".$profile['name']."</span><br><br>";
                                   //echo "<script>alert('Thanks! for rating')</script>";
                                   //echo "<script>window.open('profile.php?artisan_id='.$uID.', '_self')</script>";
                                   header('Location:profile.php?artisan_id='.$uID.'');

                               }else {
                                 $rates = DB::query('SELECT * FROM rating WHERE artisan_id=:artisanid', array(':artisanid'=>$uID));
                                 foreach ($rates as $key) {
                                   $person = $key['people'] + 1;
                                   $rate1 = $key['star'];
                                   $rateSum = $key['star'] + $ratedIndex;
                                   DB::query('UPDATE rating SET star=:ratings,people=:person WHERE artisan_id=:artisanid', array('artisanid'=>$uID, ':ratings'=>$rateSum , ':person'=>$person));
                                  // echo "<script>alert('Thanks! for rating')</script>";
                                   //echo "<script>window.open('profile.php?artisan_id='.$uID.', '_self')</script>";
                                   header('Location:profile.php?artisan_id='.$uID.'');
                                 }
                               }
                             }
                              ?>
        <form action="#" method="POST" class="">
            <div class="star">
                <input type="radio" name="rate" id="rate-5" value="5">
                <label for="rate-5" class="fa fa-star"></label>
                <input type="radio" name="rate" id="rate-4" value="4">
                <label for="rate-4" class="fa fa-star"></label>
                <input type="radio" name="rate" id="rate-3" value="3">
                <label for="rate-3" class="fa fa-star"></label>
                <input type="radio" name="rate" id="rate-2" value="2">
                <label for="rate-2" class="fa fa-star"></label>
                <input type="radio" name="rate" id="rate-1" value="1">
                <label for="rate-1" class="fa fa-star"></label><br>
                <button type="submit" class="btn btn-secondary" name="save">Confirm</button>
            </div>
        </form>
        <a href="profile.php?artisan_id=<?php echo $_GET['artisanid']?>">Cancle</a>
        </div>
        </div>
        <script src="assets/js/theme-change.js"></script>
    </body>
</html>