<?php
    include 'php/dbConnect.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header ("Location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Homepage</title>
  <link rel="stylesheet" href="css/font-awesome/all.min.css" />
  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/swiper/swiper.min.css" />
  <link rel="stylesheet" href="css/animate/animate.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <header class="header default">
    <nav class="navbar bg-white navbar-static-top navbar-expand-lg">
      <div class="container-fluid">
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"><i
            class="fas fa-align-left"></i></button>
        <a class="navbar-brand" href="index.php">
          <img src="images/logo.svg" style="width:200px;height:75px;">
        </a>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="purchaseHistory_Customer.php">History</a>
            </li>
          </ul>
        </div>
        <div class="d-none d-sm-flex ms-auto me-5 me-lg-0 pe-4 pe-lg-0">
          <ul class="nav ms-1 ms-lg-2 align-self-center">
            <li class="sign_out nav-item pe-4 ">
            <a class="fw-bold" href="php/functions.php?op=signout"><i class="fas fa-sign-out-alt pe-2"></i>Sign out</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </header>
  <section class="banner">
    <div class="swiper-container">
      <div class="swiper-wrapper h-700 h-sm-500">
        <?php
          global $dbConnection;
          $sql = "SELECT Image FROM image LIMIT 3";
          $imageQ = mysqli_query($dbConnection,$sql);
          while($image = mysqli_fetch_assoc($imageQ)){
            echo '<div class="swiper-slide align-items-center d-flex responsive-overlap-md bg-overlay-black-30"
              style="background-image:url(uploads/' . $image['Image'] . '); background-size: cover; background-position: center center;">
              <div class="swipeinner container">
                <div class="row justify-content-center">
                  <div class="col-lg-9 col-md-11 text-center position-relative">
                    <h1 data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.25s">Discover Touring Packages</h1>
                    <h6 data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.5s">We\'re your gateway to unforgettable adventures. Explore the world\'s most beautiful destinations with our curated touring packages.</h6>
                    <a class="btn btn-dark btn-round text-white" data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.75s" href="product.php">View Product<i class="fas fa-arrow-right ps-3"></i></a>
                  </div>
                </div>
              </div>
            </div>';
          }
        ?>


      </div>
      <div class="swiper-button-prev"><i class="fas fa-arrow-left icon-btn"></i></div>
      <div class="swiper-button-next"><i class="fas fa-arrow-right icon-btn"></i></div>
    </div>
  </section>

  <section class="space-ptb">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-10">
          <div class="section-title text-center">
            <h2>Why choose Us</h2>
            <p>Fortune 100 companies and established brands trust our enterprise software development.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-sm-5 mb-4">
          <div class="category-box category-box-style text-center ">
            <div class="category-icon">
              <img src="./images/search.png" class="pb-3">
              <h5 class="category-title mb-3">Discover the possibilities</h5>
            </div>
            <ul class="category-list">
              <li><a>With nearly half a million attractions, hotels & more, you're sure to find joy.</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-sm-5 mb-4">
          <div class="category-box category-box-style text-center">
            <div class="category-icon">
              <img src="./images/deal.png" class="pb-3">
              <h5 class="category-title mb-3">Enjoy deals & delights</h5>
            </div>
            <ul class="category-list">
              <li><a>Quality activities. Great prices. Plus, earn Klook credits to save more.</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-sm-5 mb-4">
          <div class="category-box category-box-style text-center">
            <div class="category-icon">
              <img src="./images/booking.png" class="pb-3">
              <h5 class="category-title mb-3">Exploring made easy</h5>
            </div>
            <ul class="category-list">
              <li><a>Book last minute, skip lines & get free cancellation for easier exploring.</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-sm-5 mb-4">
          <div class="category-box category-box-style text-center">
            <div class="category-icon">
              <img src="./images/travel.png" class="pb-3">
              <h5 class="category-title mb-3">Travel you can trust</h5>
            </div>
            <ul class="category-list">
              <li><a>Read reviews & get reliable customer support. We're with you at every step.</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="space-ptb bg-dark-half-lg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-10">
          <div class="section-title text-center position-relative">
            <h2 class="text-white">Offers for travel inspiration</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-4 order-lg-1 order-1">
          <div class="offer">
            <div class="offer-img offer-lg"
              style="background-image: url('images/full-shot-woman-travel-concept.jpg');">
            </div>
            <div class="offer-info">
              <a class="offer-title fw-bold" href="product.php">Embark on Epic Journeys</a>
              <span class="offer-services text-primary">Travel | Explore | Experience</span>
              <p>Your extraordinary adventure begins right here, where your dreams come to life, and the world awaits your exploration.</p>
              <a href="product.php" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-4 order-lg-2 order-3">
          <div class="row">
            <div class="col-sm-6 col-lg-12">
              <div class="offer">
                <div class="offer-img"
                  style="background-image: url('images/top-view-tourist-items-arrangement.jpg');">
                </div>
                <div class="offer-info">
                  <a class="offer-title fw-bold" href="product.php">Discover the World, One Booking at a Time</a>
                  <span class="offer-services text-primary">Where Dreams Become Destinations</span>
                  <p>Start crafting your travel tale today.</p>
                  <a href="product.php" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-12">
              <div class="offer">
                <div class="offer-img"
                  style="background-image: url('images/yellow-suitcase-with-traveler-accessories-blue-background-travel-concept.jpg');">
                </div>
                <div class="offer-info">
                  <a class="offer-title" href="product.php">Adventure Awaits. Where to Next?</a>
                  <span class="offer-services text-primary">Your Passport to Unforgettable Experiences</span>
                  <p>Begin your unforgettable journey with us.</p>
                  <a href="product.php" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 order-lg-3 order-2">
          <div class="offer">
            <div class="offer-img offer-lg"
              style="background-image: url('images/travel-adventure-with-baggage.jpg');">
            </div>
            <div class="offer-info">
              <a class="offer-title fw-bold" href="product.php">Explore, Experience, Enjoy</a>
              <span class="offer-services text-primary">Your Gateway to Global Adventures</span>
              <p>Choose, book, and embark on your next thrilling voyage, where every moment is a new chapter in your travel story, waiting to be written.</p>
              <a href="product.php" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 d-flex justify-content-center mt-0 mt-md-4">
          <a href="product.php" class="btn btn-primary-round btn-round mx-3">View all product<i
              class="fas fa-arrow-right ps-3"></i></a>
        </div>
      </div>
    </div>
  </section>

  <section class="space-ptb">
    <div class="container">
      <div class="row mb-0 mb-lg-4">
        <div class="col-lg-6 col-xl-7 text-center">
          <div class="owl-carousel testimonial-style-02" data-nav-arrow="true" data-nav-dots="false" data-items="1"
            data-lg-items="1" data-md-items="1" data-sm-items="1" data-space="0" data-autoheight="true">
            <?php
              $sql = "SELECT p.ProductID, p.Price, p.Name, p.Description, MAX(i.Image) AS Image
              FROM product AS p
              LEFT JOIN image AS i ON p.ProductID = i.ProductID
              GROUP BY p.ProductID, p.Price, p.Name, p.Description
              LIMIT 3;";
              $productQ = mysqli_query($dbConnection,$sql);
              while($product = mysqli_fetch_assoc($productQ)){
                $description = $product['Description'];
                $ellipsis = "....";
                if (strlen($description) > 200) {
                    $description = substr($description, 0, 200 - strlen($ellipsis)) . $ellipsis;
                }
                echo '<div class="item">
                  <div class="video-image">
                    <img class="img-fluid w-100" src="uploads/' . $product['Image'] . '" alt="">
                  </div>
                  <div class="testimonial-item mt-0">
                    <div class="testimonial-content">
                      <p>' . $description . '</p>
                    </div>
                    <div class="testimonial-author">
                      <div class="testimonial-name">
                        <h6 class="mb-1">RM ' . $product['Price'] . '</h6>
                      </div>
                    </div>
                  </div>
                </div>';
              }
            ?>
          </div>
        </div>
        <div class="col-lg-6 col-xl-5 align-self-center ps-0 ps-lg-5 mt-5 mt-lg-0">
          <div class="ps-3 ps-lg-4">
            <h2 class="mb-4 mb-lg-5">Popular activities</h2>
            <a href="product.php" class="btn btn-primary-round btn-round mb-3">See more<i
                class="fas fa-arrow-right ps-3"></i></a>
            <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="space-ptb bg-light position-relative">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-title is-sticky">
            <h2>Experiences for everyone</h2>
            <a href="product.php" class="btn btn-primary-round btn-round">See All Services<i
                class="fas fa-arrow-right ps-3"></i></a>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="row">
            <div class="col-sm-6">
              <div class="feature-info feature-info-style-01">
                <div class="feature-info-icon">
                  <i class="flaticon-data"></i>
                </div>
                <div class="feature-info-content">
                  <h5 class="mb-3 feature-info-title">LocalXplorer Pass. One Pass Multi Attractions. Save More.</h5>
                  <p class="mb-0">Explore various attractions with LocalXplore Pass</p>
                  <a href="product.php" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
              </div>
              <div class="feature-info feature-info-style-01 mt-4 mt-lg-5">
                <div class="feature-info-icon">
                  <i class="flaticon-design"></i>
                </div>
                <div class="feature-info-content">
                  <h5 class="mb-3 feature-info-title">Ski Resorts in South Korea</h5>
                  <p class="mb-0">Winter is coming — spectacular snowy landscapes and the skiing experience of a lifetime await!</p>
                  <a href="product.php" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="feature-info feature-info-style-01 mt-4 mt-lg-5">
                <div class="feature-info-icon">
                  <i class="flaticon-icon-149196"></i>
                </div>
                <div class="feature-info-content">
                  <h5 class="mb-3 feature-info-title">Welcome to Japan</h5>
                  <p class="mb-0">Konnichawa! Don't miss these popular activities and experiences during your visit to Japan!</p>
                  <a href="product.php" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer my-3">
    <div class="footer-top">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-sm-3">
            <a href="index.php"> <img src="images/logo.svg" style="width:200px;height:75px;">
            </a>
          </div>
          <div class="col-sm-9 text-sm-end mt-4 mt-sm-0">
            <ul class="list-unstyled mb-0 social-icon">
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
          </div>
        </div>
        <hr class="pb-0">
      </div>
    </div>

    <div class="footer-bottom py-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <p class="mb-0">©Copyright 2020 <a href="index.php">LocalExplorer</a> All Rights Reserved</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/popper/popper.min.js"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <script src="js/swiper/swiper.min.js"></script>
  <script src="js/swiperanimation/SwiperAnimation.min.js"></script>
  <script src="js/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/custom.js"></script>
</body>
</html>