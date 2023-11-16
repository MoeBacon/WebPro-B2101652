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
        <a class="navbar-brand" href="index.php"><img src="images/logo.svg" style="width:200px;height:75px;">
        </a>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product.php">Product</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="purchaseHistory_Customer.php">History</a>
            </li>
          </ul>
        </div>
        <div class="d-none d-sm-flex ms-auto me-5 me-lg-0 pe-4 pe-lg-0">
          <ul class="nav ms-1 ms-lg-2 align-self-center">
            <li class="sign_out nav-item pe-4 ">
            <a class="fw-bold" href="php/functions.php?op=signout"><i class="fas fa-sign-out-alt pe-2"></i>Sign out</a>
            </li>
      </div>
    </nav>
  </header>
  <div class="container my-5">
    <h2>Purchase History</h2>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">Reference</th>
        <th scope="col">Product Name</th>
        <th scope="col">Start Date</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    <?php
        global $dbConnection;
        
        $email = $_SESSION['username'];
        $sql2 = "SELECT CustID FROM customer WHERE Email='$email'";
        $result = mysqli_query($dbConnection,$sql2);
        $CustID;
        if($result){
          $row = mysqli_fetch_assoc($result);
          $CustID = $row['CustID'];
        }

        $sql = "SELECT purchase.PurchaseID, purchase.Date, purchase.Total, purchase.ProductID, product.Name
        FROM purchase
        JOIN product ON purchase.ProductID = product.ProductID
        WHERE CustID = '$CustID';";
        $purchaseQ = mysqli_query($dbConnection,$sql);

        $num = 1;
        while($purchase = mysqli_fetch_assoc($purchaseQ)){     
          echo '<tr">
          <th scope="row" class="align-middle">' . $num . '</th>
          <td class="align-middle">' . $purchase['Name'] . '</td>
          <td class="align-middle">' . $purchase['Date'] . '</td>
          <td class="align-middle">
              <form method="post" action="invoice.php">
                  <input type="hidden" name="purchase_id" value="' . $purchase['PurchaseID'] . '">
                  <button type="submit" class="btn btn-primary btn-sm">Receipt</button>
              </form>
          </td>
          </tr>';
          $num++;
      }

    ?>
      <!-- <tr>
        <th scope="row">1</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr> -->
    </tbody>
  </table>
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