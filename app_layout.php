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
      <?php
        $users = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>Login::isLoggedIn()));
        foreach ($users as $user) {
        ?>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="Myprofile.php">
              <img width="30" src="assets/images/<?php echo $user['profile'] ?>" alt="Admin" class="rounded-circle" width="150">
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="favorite.php">My Favoriet</a>
          </li>
          <li class="nav-item">
            <a style="margin-top:10px;margin-left: 250px;" class="btn btn-secondary" href="userlogout.php?users_id=<?php echo $user['id'] ?>"><i class="fa fa-sign-out"></i> Logout</a>
         </li>
        </ul>
      </div>
                <?php
      if (!Login::isLoggedIn()) {
      die("<script>window.open('index.php', '_self')</script>");
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
