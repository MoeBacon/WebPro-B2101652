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
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
                <a class="navbar-brand" href="merchant_product_list.php">
                    <img src="images/logo.svg" style="width:200px;height:75px;">
                </a>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="merchant_product_list.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="purchase_history.php">Record</a>
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

    <section>
        
        <div class="container">
            <h2 class="mb-5 mt-5">Product</h2>
            <?php
                
                global $dbConnection;
                $sql = "SELECT MerchantID
                FROM merchant
                WHERE Email = '" . $_SESSION['username'] . "';";
                $result = mysqli_query($dbConnection,$sql);
                $merchantID;
                if($result){
                    $row = mysqli_fetch_assoc($result);
                    $merchantID = $row['MerchantID'];
                }
                $sql2 = "SELECT p.ProductID, p.Price, p.Name, p.Description, MAX(i.Image) AS Image
                FROM product AS p
                LEFT JOIN image AS i ON p.ProductID = i.ProductID
                WHERE p.MerchantID = $merchantID
                GROUP BY p.ProductID, p.Price, p.Name, p.Description;";

                $productQ = mysqli_query($dbConnection,$sql2);
                while($product = mysqli_fetch_assoc($productQ)){
                    echo "<a href='merchant_product.php?id={$product['ProductID']}' class='card my-3'>
                        <div class='row no-gutters'>
                            <div class='col-md-4'>
                                <img src='uploads/{$product['Image']}' alt='Card image cap' style='width: 100%; height: 100%;'>
                            </div>
                            <div class='col-md-8'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$product['Name']}</h5>
                                    <p class='card-text'>{$product['Description']}</p>
                                    <p class='card-text'><small class='text-muted'>RM {$product['Price']}</small></p>
                                </div>
                            </div>
                        </div>
                    </a>";

                }

            ?>
            
            <!-- <a href="index.html" class="card my-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="https://static.wikia.nocookie.net/vsbattles/images/0/04/025Pikachu_XY_anime_4.png/revision/latest?cb=20180310153929"
                            alt="Card image cap">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Title</h5>
                            <p class="card-text">Description</p>
                            <p class="card-text"><small class="text-muted">Anything</small></p>
                        </div>
                    </div>
                </div>
            </a> -->
            <div class="text-center mb-3">
            <form method="post" action="php/functions.php?op=addNewItemClicked">
                <button type="submit" class="btn btn-primary-round btn-round mx-3">
                    <i class="fas fa-plus"></i> Add New Item
                </button>
            </form>
            </div>
        </div>
    </section>
    
    </section>

    <footer class="footer my-3">
    <div class="footer-top">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-sm-3">
            <a href="merchant_product_list.php"> <img src="images/logo.svg" style="width:200px;height:75px;">
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
            <p class="mb-0">©Copyright 2020 <a href="merchant_product_list.php">LocalExplorer</a> All Rights Reserved</p>
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