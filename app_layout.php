<?php
if (Login::isLoggedIn()) {
  ?>
<header id="site-header" class="fixed-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg stroke">
      <h1><a class="navbar-brand mr-lg-5" href="index.php">
          Artisan For You
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
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="favorite.php">My Favoriet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Myprofile.php"><i class="fa fa-dashboard"></i> My profile</a>
          </li>

        </ul>
      </div>
      <?php
        $users = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>Login::isLoggedIn()));
        foreach ($users as $user) {
        ?>
      <div class="d-lg-block d-none">
          <span><i class="fa fa-user"></i> <?php echo $user['username'] ?></span>
      </div>

               <form style="margin-left: 60px;" class="d-lg-block d-none" action="" method="post">
                  <button class="btn btn-secondary" type="submit" name="logout"><span><i class="fa fa-sign-out"></i></span></button>
                </form>
                <?php
      if (!Login::isLoggedIn()) {
      die("<script>window.open('index.php', '_self')</script>");
      }
      if (isset($_POST['logout'])) {
      DB::query('DELETE FROM users_login WHERE user_id =:id', array(':id'=>Login::isLoggedIn()));
      echo "<script>window.open('index.php', '_self')</script>";
      if (isset($_COOKIE['SNID'])) {
      DB::query('DELETE FROM users_login WHERE tokens =:token', array(':token'=>sha1($_COOKIE['SNID'])));
        echo "<script>window.open('index.php', '_self')</script>";
      }
      setcookie('SNID', '1' , time()-3600);
      setcookie('SNID_', '1' , time()-3600);
      }
      ?>
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
<?php
}
}else {
  echo "<script>window.open('UserLogin.php', '_self')</script>";
}
 ?>
