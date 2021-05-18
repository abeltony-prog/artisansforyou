
<header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.php" class="logo">Artisan For<span class="lite"> You</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                            </span>
                            <span class="username"><?php echo $user['name'] ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="changepassword.php"><i class="icon_lock"></i>Change Password</a>
              </li>
              <li>
                <form class="" action="" method="post">
                  <button class="btn btn-danger" type="submit" name="logout"><i class="fa fa-sign-out"></i> Log Out</button>
                </form>
                <?php
if (!Login::isLoggedIn()) {
  die("<script>window.open('login.php', '_self')</script>");
}
if (isset($_POST['logout'])) {
    DB::query('DELETE FROM admin_logins WHERE admin_id =:id', array(':id'=>Login::isLoggedIn()));
      echo "<script>window.open('login.php', '_self')</script>";
    if (isset($_COOKIE['SNID'])) {
    DB::query('DELETE FROM admin_logins WHERE token =:token', array(':token'=>sha1($_COOKIE['SNID'])));
        echo "<script>window.open('login.php', '_self')</script>";
    }
    setcookie('SNID', '1' , time()-3600);
    setcookie('SNID_', '1' , time()-3600);
}
 ?>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->
<!--sidebar start-->
<aside>
  <div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu">
      <li>
        <a class="active" href="index.php">
                      <i class="icon_house_alt"></i>
                      <span>Dashboard</span>
                  </a>
      </li>
      <li>
        <a class="" href="blog.php">
                      <i class="icon_book"></i>
                      <span>Blog Post</span>
                  </a>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" class="">
                      <i class="fa fa-desktop"></i>
                      <span>More</span>
                      <span class="menu-arrow arrow_carrot-right"></span>
                  </a>
        <ul class="sub">
          <li><a class="" href="category_list.php">Category List</a></li>
          <li><a class="" href="addcate.php">Add New</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" class="">
                      <i class="fa fa-users"></i>
                      <span>Artisans</span>
                      <span class="menu-arrow arrow_carrot-right"></span>
                  </a>
        <ul class="sub">
          <?php
          $categories = DB::query('SELECT * FROM categories ORDER BY id DESC');
          foreach ($categories as $category) {
            ?>
            <li><a class="" href="category_artisan.php?category_id=<?php echo $category['id'] ?>"><?php echo $category['category'] ?></a></li>
            <?php
          }
           ?>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" class="">
                      <i class="icon_pin"></i>
                      <span>More</span>
                      <span class="menu-arrow arrow_carrot-right"></span>
                  </a>
        <ul class="sub">
          <li><a class="" href="cityList.php">Cities</a></li>
          <li><a class="" href="addcity.php">Add Cities</a></li>
        </ul>
      </li>

    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->
