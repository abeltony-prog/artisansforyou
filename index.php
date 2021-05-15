<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('Database/user_Logins.php') ?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Artisan For You</title>
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
  <?php include('layout.php') ?>
  <!--banner-slider-->
  <!-- main-slider -->
  <section class="w3l-main-slider" id="home">
    <div class="banner-content">
      <div id="demo-1"
        data-zs-src='["assets/images/banner1.jpg", "assets/images/banner2.jpg","assets/images/banner3.jpeg", "assets/images/banner4.jpg"]'
        data-zs-overlay="dots">
        <div class="demo-inner-content">
          <div class="container">
            <div class="banner-infhny">
              <h3>You don't need to go far to Solve your problems.</h3>
              <h6 class="mb-3">Get Any Artisan In Nigeria</h6>
              <div class="flex-wrap search-wthree-field mt-md-5 mt-4">
                <form action="account.php" method="get" class="booking-form">
                  <div class="row book-form">
                    <div class="form-input col-md-6 mt-md-0 mt-3">
                      <select class="" name="category_id">
                        <option value="">Select Artisan</option>
                        <?php
                          $categorial = DB::query('SELECT * FROM categories');
                          foreach ($categorial as $key) {
                            ?>
                            <option value="<?php echo $key['id'] ?>"><?php echo $key['category'] ?></option>
                            <?php
                          }
                         ?>
                      </select>
                    </div>
                    <div class="bottom-btn col-md-4 mt-md-0 mt-3">
                      <button type="submit" class="btn btn-style btn-secondary"><span class="fa fa-search mr-3"
                          aria-hidden="true"></span> Search</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /main-slider -->
  <!-- //banner-slider-->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row col-md-12">
              <div class="form-group col-md-6">
                <a href="ArtisanLogin.php" class="btn btn-outline-secondary col-md-12"><span><i class="fa fa-user"></i> Artisan</span></a>
              </div>
              <div class="form-group col-md-6">
                <a href="UserLogin.php" class="btn btn-outline-primary col-md-12"><span><i class="fa fa-users"></i></span> User</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/grids-->
  <section class="w3l-grids-3 py-5">
    <div class="container py-md-5">
      <div class="title-content text-left mb-lg-5 mb-4">
        <h6 class="sub-title">Visit</h6>
        <h3 class="hny-title">Artisans</h3>
      </div>
      <div class="row col-md-12">
        <img style="border-radius: 120px 10px 120px 10px;" class="col-lg-6" src="assets/images/banner1.jpg" alt="">
      <div class="col-md-6">
        <p>We help in the integration of artisans in Nigeria into the digital economy by connecting them with direct consumers on an interactive web/mobile platform. This will give artisans a singular largest market for their products or services.</p>
      </div>
      </div>
      </div>
    </div>
  </section>
  <!--//grids-->
  <!-- stats -->
  <section class="w3l-stats py-5" id="stats">
    <div class="gallery-inner container py-lg-0 py-3 mr-5">
      <div class="row stats-con pb-lg-3">
        <div class="col-lg-4 col-6 stats_info counter_grid">
          <?php
            $artisanCount = DB::query('SELECT COUNT(id) AS Totalartisan FROM artisans');
            foreach ($artisanCount as $artcount) {
              ?>
          <p class="counter"><?php echo $artcount['Totalartisan']; ?></p>
          <?php
        }
       ?>
          <h4>Artisans</h4>
        </div>
        <div class="col-lg-4 col-6 stats_info counter_grid1">
          <?php
            $usersCount = DB::query('SELECT COUNT(id) AS Totalusers FROM users');
            foreach ($usersCount as $ucount) {
              ?>
               <p class="counter"><?php echo $ucount['Totalusers']; ?></p>
              <?php
            }
           ?>
          <h4>Users</h4>
        </div>
        <div class="col-lg-4 col-6 stats_info counter_grid1">
          <?php
            $locationCount = DB::query('SELECT COUNT(id) AS Totallocation FROM location');
            foreach ($locationCount as $lcount) {
              ?>
               <p class="counter"><?php echo $lcount['Totallocation']; ?></p>
              <?php
            }
           ?>
          <h4>Cities</h4>
        </div>
      </div>
    </div>
  </section>
  <!-- //stats -->
  <!--/-->
  <!--<div id="myblog" class="best-rooms py-5">
    <div class="container py-md-5">
      <div class="title-content text-left mb-lg-5 mb-4">
        <h6 class="sub-title">Visit</h6>
        <h3 class="hny-title">Blog</h3>
      </div>
        <div class="ban-content-inf row">
            <div class="maghny-gd-1 col-lg-12 mt-lg-0 mt-4">

            </div>
        </div>
    </div>
</div>-->
  <!-- //stats -->
  <!-- testimonials -->
  <section class="w3l-clients" id="clients">
    <!-- /grids -->
    <div class="cusrtomer-layout py-5">
      <div class="container py-lg-4 py-md-3 pb-lg-0">
        <div class="heading text-center mx-auto">
          <h6 class="sub-title text-center">Here’s what they have to say</h6>
          <h3 class="hny-title mb-md-5 mb-4">our clients do the talking</h3>
        </div>
        <!-- /grids -->
        <div class="testimonial-width">
          <div id="owl-demo1" class="owl-two owl-carousel owl-theme">
            <?php
              $allcomment = DB::query('SELECT * FROM comment ORDER BY id DESC Limit 5');
              foreach ($allcomment as $comment) {
                ?>
                <div class="item">
                  <div class="testimonial-content">
                    <div class="testimonial">
                      <blockquote>
                        <span class="fa fa-quote-left" aria-hidden="true"></span>
                        <?php echo $comment['comment'] ?>
                      </blockquote>
                      <?php
                      $artisandetails = DB::query('SELECT * FROM artisans WHERE id=:artisanid', array(':artisanid'=>$comment['artisan_id']));
                      foreach ($artisandetails as $detail) {
                        ?>
                        <div class="testi-des">
                          <div class="test-img"><img src="assets/images/<?php echo $detail['profile'] ?>" class="img-fluid" alt="client-img">
                          </div>
                          <div class="peopl align-self">
                            <h3><?php echo $detail['name'] ?></h3>
                            <p class="indentity">Example City</p>
                          </div>
                        </div>
                        <?php
                      }
                       ?>
                    </div>
                  </div>
                </div>
                <?php
              }
             ?>
          </div>
        </div>
      </div>
      <!-- /grids -->
    </div>
    <!-- //grids -->
  </section>
  <!-- //testimonials -->

  <!--/w3l-footer-29-main-->
  <footer>
    <!-- footer -->
    <section class="w3l-footer">
      <div class="w3l-footer-16-main py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 column">
              <div class="row">
                <div class="col-md-11 column">
                  <h3>Company</h3>
                  <ul class="footer-gd-16">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="#myblog">Blog</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                  </ul>
                </div>

              </div>
            </div>
            <div class="col-lg-6 col-md-12 column pl-lg-5 column4 mt-lg-0 mt-5">
              <h3>Newsletter </h3>
              <div class="end-column">
                <h4>Get latest updates and offers.</h4>
                <form action="#" class="subscribe" method="post">
                  <input type="email" name="email" placeholder="Email Address" required="">
                  <button type="submit">Go</button>
                </form>
                <p>Sign up for our latest news & articles. We won’t give you spam mails.</p>
              </div>
            </div>
          </div>
          <div class="d-flex below-section justify-content-between align-items-center pt-4 mt-5">
            <div class="columns text-lg-left text-center">
              <p>&copy; 2021 KAM. All rights reserved.Developed by <a href="https://umbrellagrp.rw/" target="_blank">
                Umbrella
                </a>
              </p>
            </div>
            <div class="columns-2 mt-lg-0 mt-3">
              <ul class="social">
                <li><a href="https://www.linkedin.com/company/umbrella-innovators/"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                </li>
                <li><a href="#twitter"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                </li>
                <li><a href="https://github.com/Umbrella-Devs"><span class="fa fa-github" aria-hidden="true"></span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- move top -->
      <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-angle-up"></span>
      </button>
      <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
          scrollFunction()
        };

        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
          } else {
            document.getElementById("movetop").style.display = "none";
          }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
      </script>
      <!-- //move top -->
      <script>
        $(function () {
          $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
          })
        });
      </script>
    </section>
    <!-- //footer -->
  </footer>
  <!-- Template JavaScript -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/theme-change.js"></script>
  <!--/slider-js-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/modernizr-2.6.2.min.js"></script>
  <script src="assets/js/jquery.zoomslider.min.js"></script>
  <!--//slider-js-->
  <script src="assets/js/owl.carousel.js"></script>
  <!-- script for tesimonials carousel slider -->
  <script>
    $(document).ready(function () {
      $("#owl-demo1").owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          736: {
            items: 1,
            nav: false
          },
          1000: {
            items: 1,
            nav: false,
            loop: true
          }
        }
      })
    })
  </script>
  <!-- //script for tesimonials carousel slider -->
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
