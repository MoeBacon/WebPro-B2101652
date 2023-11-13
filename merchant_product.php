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
        <main>
            <div class="container">
                <div class="package-detail">
                    <div class="package-header">
                        <?php
                            global $dbConnection;
                            $ID = $_GET['id'];
                            $sql = "SELECT Name FROM product WHERE ProductID = $ID";
                            $result = mysqli_query($dbConnection,$sql);
                            if($result){
                                $row = mysqli_fetch_assoc($result);
                                echo "<h2>{$row['Name']}</h2>";
                            }
                        ?>

                        <section class="banner">
                            <div class="swiper-container">
                                <div class="swiper-wrapper h-500 w-100">
                                    <?php
                                        global $dbConnection;
                                        $ID = $_GET['id'];
                                        $sql = "SELECT Image FROM image WHERE ProductID = $ID";
                                        $imageQ = mysqli_query($dbConnection,$sql);
                                        while($image = mysqli_fetch_assoc($imageQ)){
                                            echo "<div class='swiper-slide align-items-center d-flex responsive-overlap-md bg-overlay-black-30'>
                                                <img src='uploads/{$image['Image']}' alt='Card image cap' style='width: 100%; height: 100%;'>
                                            </div>";
                                        }
                                    ?>
                                    <!-- <div class="swiper-slide align-items-center d-flex responsive-overlap-md bg-overlay-black-30">
                                        <img
                                            src="https://www.balilandscapecompany.com/wp-content/uploads/2021/06/river_house_bali_04_bali_landscape_company_landscaping_service_architecture_construction_indonesia.jpg">
                                    </div> -->
                                </div>
                                <div class="swiper-button-prev"><i class="fas fa-arrow-left icon-btn"></i></div>
                                <div class="swiper-button-next"><i class="fas fa-arrow-right icon-btn"></i></div>
                            </div>
                        </section>
                    </div>
                    <div class="package-description">
                        <?php
                            $ID = $_GET['id'];
                            $sql = "SELECT Description FROM product WHERE ProductID=$ID";
                            $descriptionQ = mysqli_query($dbConnection,$sql);
                            if($descriptionQ){
                                $row = mysqli_fetch_assoc($descriptionQ);
                                echo "<p>" . $row['Description'] . "</p>";
                            }
                        ?>
                        <!-- <p>Embark on an unforgettable journey through the enchanting island of Bali, where stunning
                            natural beauty,
                            rich cultural heritage, and warm hospitality await. This 7-day adventure tour will take you
                            through the
                            island's diverse landscapes, from the majestic volcanoes to the serene rice paddies, and
                            introduce you to
                            the vibrant Balinese culture.</p> -->
                    </div>
                    <div class="package-highlights">
                        <h3>Highlights</h3>
                        
                        <?php
                            $ID = $_GET['id'];
                            $sql = "SELECT Highlight FROM product WHERE ProductID=$ID";
                            $highlightQ = mysqli_query($dbConnection,$sql);
                            if($highlightQ){
                                $row = mysqli_fetch_assoc($highlightQ);
                                $highlights = explode("\n", $row['Highlight']);
                                echo "<ul>";
                                foreach ($highlights as $highlight) {
                                    $highlight = trim($highlight); // Remove any leading/trailing whitespace
                                    if (!empty($highlight)) {
                                        echo "<li>" . $highlight . "</li>";
                                    }
                                }
                                echo "</ul>";
                            }
                        ?>
                        <!-- <li>Explore the ancient temples of Ubud, the cultural heart of Bali.</li>
                        <li>Hike to the summit of Mount Batur, an active volcano, and witness the breathtaking
                            sunrise.</li>
                        <li>Indulge in the pristine beaches of Nusa Dua and soak up the tropical sun.</li>
                        <li>Immerse yourself in the vibrant nightlife of Kuta, a bustling beach town.</li>
                        <li>Experience the tranquility of Uluwatu Temple, perched on a cliff overlooking the Indian
                            Ocean.</li> -->
                        
                    </div>
                    <div class="package-inclusions">
                        <h3>Package Inclusions</h3>
                        <?php
                            $ID = $_GET['id'];
                            $sql = "SELECT Package FROM product WHERE ProductID=$ID";
                            $packageQ = mysqli_query($dbConnection,$sql);
                            if($packageQ){
                                $row = mysqli_fetch_assoc($packageQ);
                                $packages = explode("\n", $row['Package']);
                                echo "<ul>";
                                foreach ($packages as $package) {
                                    $package = trim($package); // Remove any leading/trailing whitespace
                                    if (!empty($package)) {
                                        echo "<li>" . $package . "</li>";
                                    }
                                }
                                echo "</ul>";
                            }
                        ?>
                    </div>

                    <div class="price">
                        <h3>Price</h3>
                            <?php
                                $ID = $_GET['id'];
                                $sql = "SELECT Price FROM product WHERE ProductID=$ID";
                                $priceQ = mysqli_query($dbConnection,$sql);
                                if($priceQ){
                                    $row = mysqli_fetch_assoc($priceQ);
                                    echo "<p>RM " . $row['Price'] . " per person</p>";
                                }
                            ?>
                        <!-- <p>$1200 per person</p> -->
                    </div>
                    <div class="text-center mb-3">
                        <?php
                            echo '<form method="post" action="php/functions.php?op=edit&id=' . $_GET['id'] . '" style="display: inline-block;">
                            <button type="submit" class="btn btn-primary-round btn-round mx-3" data-toggle="modal" data-target="#addNewItemModal">Edit</button>
                            </form>';
                            
                            echo '<form method="post" action="php/functions.php?op=deleteProduct&id=' . $_GET['id'] . '" style="display: inline-block;">
                                <button type="submit" onclick="return confirmation()" class="btn btn-primary-round btn-round mx-3" data-toggle="modal" data-target="#addNewItemModal">Delete</button>
                            </form>';
                        
                        ?>
                        
                            <!-- <button type="button" name class="btn btn-primary-round btn-round mx-3" data-toggle="modal" data-target="#addNewItemModal">Edit</button>
                            <button type="button" class="btn btn-primary-round btn-round mx-3" data-toggle="modal" data-target="#addNewItemModal">Delete</button> -->
                    </div>
                </div>
                <table class="table">
                    <h3>Customer Purchase History</h3>
                        <thead>
                        <tr>
                            <th scope="col">Reference</th>
                            <th scope="col">Buyer</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Pax</th>
                            <th scope="col">Total Amount</th>
                        </tr>
                        </thead>
                    <tbody>
                    <?php
                        global $dbConnection;
                        $email = $_SESSION['username'];
                        $sql = "SELECT MerchantID FROM merchant WHERE Email='$email'";
                        $merchantID;
                        $merchantQ = mysqli_query($dbConnection,$sql);
                        if($merchantQ){
                        $merchant = mysqli_fetch_assoc($merchantQ);
                        $merchantID = $merchant['MerchantID'];
                        $productID = $_GET['id'];
                        }
                        $sql2 = "SELECT purchase.Date, purchase.Total, purchase.Pax, customer.Email, product.Name
                        FROM purchase
                        INNER JOIN customer ON purchase.CustID = customer.CustID
                        INNER JOIN product ON purchase.ProductID = product.ProductID
                        WHERE purchase.MerchantID='$merchantID' AND purchase.ProductID='$productID';
                        ";
                        $purchaseQ = mysqli_query($dbConnection,$sql2);
                        $num = 1;
                        while($purchase = mysqli_fetch_assoc($purchaseQ)){     
                        echo '<tr">
                        <th scope="row" class="align-middle">' . $num . '</th>
                        <td class="align-middle">' . $purchase['Email'] . '</td>
                        <td class="align-middle">' . $purchase['Date'] . '</td>
                        <td class="align-middle">Done</td>
                        <td class="align-middle">' . $purchase['Pax'] . '</td>
                        <td class="align-middle">RM ' . $purchase['Total'] . '</td>
                        </tr>';
                        $num++;
                    }

                    ?>

                    </tbody>
                </table>
            </div>

        </main>
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
    <script>
        function confirmation(){
            return confirm('Are you sure you want to delete this product?');
        }
    </script>
</body>

</html>