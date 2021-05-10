
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
          <!-- inbox notificatoin start-->
          <li id="mail_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                        </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have 5 new messages</p>
              </li>
              <li>
                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Greg  Martin</span>
                                    </span>
                                    <span class="message">
                                        I really like this admin panel.
                                    </span>
                                </a>
              </li>
              <li>
                <a href="#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox notificatoin end -->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/<?php echo $user['profile'] ?>">
                            </span>
                            <span class="username"><?php echo $user['name'] ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="changepassword.php"><i class="icon_profile"></i>Change Password</a>
              </li>
              <li>
                <form class="" action="" method="post">
                  <button class="btn btn-danger" type="submit" name="logout"><i class="fa fa-sign-out"></i> Log Out</button>
                </form>
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
