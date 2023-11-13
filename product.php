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
  <title>Products</title>
  <link rel="stylesheet" href="css/font-awesome/all.min.css" />
  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/swiper/swiper.min.css" />
  <link rel="stylesheet" href="css/animate/animate.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <style>
    .product-card {
        transition: transform 0.3s, border 0.3s;
        border: 1px solid transparent;
    }

    .product-card:hover {
        transform: translateY(-2px);
        border-color: #022d62; /* Change this color to your desired border color */
    }

    .row{
      justify-content: center;
    }

  </style>
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
          <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
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
  <section class="py-5">

    <div class="container" >
      <h2>Products</h2>
      <div class="row" >

      <?php
      global $dbConnection;
      $sql = "SELECT p.ProductID, p.Price, p.Name, p.Description, MAX(i.Image) AS Image
      FROM product AS p
      LEFT JOIN image AS i ON p.ProductID = i.ProductID
      GROUP BY p.ProductID, p.Price, p.Name, p.Description;";
      $productQ = mysqli_query($dbConnection,$sql);
      while($product = mysqli_fetch_assoc($productQ)){
        $description = $product['Description'];
        $ellipsis = "....";
        if (strlen($description) > 200) {
            $description = substr($description, 0, 150 - strlen($ellipsis)) . $ellipsis;
            echo '<div class="col-3 product-card rounded-1 shadow-sm" style="margin: 8px 8px; border: 1px solid #ddd;"><a style="color:black;" href="product_page.php?id=' . $product['ProductID'] . '">
              <img class="img" style="width:100%;height:50%;" src="uploads/' . $product['Image'] . '" alt="image">
              <h5 class="mb-3 mt-3">' .$product['Name'] . ' </h5>
              <p>' . $description . '</p>
              <p>RM ' . $product['Price'] . '</p>
          </div></a>';

        }
      }
    ?>
        <!-- <div class="col-3">
          <img class="img-fluid w-100"
            src="images/cherry-blossoms-spring-chureito-pagoda-fuji-mountain-sunset-japan.jpg" alt="image">
          <p>We don't take ourselves too seriously, but seriously enough to ensure we're creating the best
            product and experience for our customers. I feel like Help Scout does the same.</p>
          <p>RM ???</p>


      </div> -->
      
    </div>
    
    
  </section>

  </div>
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