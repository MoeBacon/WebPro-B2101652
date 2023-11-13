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
  <style>
    /* Styles for the popup container */
    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      padding: 20px;
      z-index: 1000;
      width: 20%; /* Adjust the width to your desired size */
    }

    /* Styles for the overlay background */
    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      z-index: 999;
    }
  </style>
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
  <main>
    <div class="container">
    <input type="hidden" id="get" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
    <div id="overlay" class="overlay"></div>
    <div id="popup" class="popup"></div>
      <div class="package-detail">
        <div class="package-header">
        <?php
            global $dbConnection;
            $ID = $_GET['id'];
            $sql = "SELECT Name FROM product WHERE ProductID = $ID";
            $result = mysqli_query($dbConnection,$sql);
            if($result){
                $row = mysqli_fetch_assoc($result);
                echo "<h2 id='name' class='my-4'>{$row['Name']}</h2>";
            }
        ?>
          <section class="banner">
            <div class="swiper-container">
              <div class="swiper-wrapper h-500 w-100">
              <?php
                global $dbConnection;
                $id = $_GET['id'];
                $sql = "SELECT Image FROM image WHERE ProductID=$id";
                $imageQ = mysqli_query($dbConnection,$sql);
                while($image = mysqli_fetch_assoc($imageQ)){
                    echo "<div class='swiper-slide align-items-center d-flex responsive-overlap-md bg-overlay-black-30'>
                        <img src='uploads/{$image['Image']}' alt='Card image cap' style='width: 100%; height: 100%;'>
                    </div>";
                }
              ?>

              </div>
              <div class="swiper-button-prev"><i class="fas fa-arrow-left icon-btn"></i></div>
              <div class="swiper-button-next"><i class="fas fa-arrow-right icon-btn"></i></div>
            </div>
          </section>
        </div>
        <div class="package-description my-3">
          <?php
              $ID = $_GET['id'];
              $sql = "SELECT Description FROM product WHERE ProductID=$ID";
              $descriptionQ = mysqli_query($dbConnection,$sql);
              if($descriptionQ){
                  $row = mysqli_fetch_assoc($descriptionQ);
                  echo "<p class=''>" . $row['Description'] . "</p>";
              }
          ?>
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
        <form method="post" id="bookingForm" action="php/functions.php?op=bookNow">
        <h3>Price</h3>
        <?php
            $ID = $_GET['id'];
            $sql = "SELECT Price FROM product WHERE ProductID=$ID";
            $priceQ = mysqli_query($dbConnection,$sql);
            if($priceQ){
                $row = mysqli_fetch_assoc($priceQ);
                echo '<input id="price" type="hidden" name="price" value="' . $row['Price'] . '">';
                echo "<p>RM " . $row['Price'] . " per person</p>";
            }
        ?>

        <div class="package-cta">
          <div class="package-options">
            <label for="start_date">Please select a tour date</label>
            <input type="date" id="date" name="start_date" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
            <div class="my-5">
              <label for="num_people">Person</label>
              <input id="num" type="number" name="num_people" value="0" min="1" />
              <i class="fa fa-plus"></i>
              <i class="fa fa-minus"></i>
            </div>
            <h2>Total prices</h2>
            <div class="package-price mb-5"></div>
            <input id="total" type="hidden" name="total">
              <?php
                global $dbConnection;
                $id = $_GET['id'];
                echo '<input id="productID" type="hidden" name="productID" value="' . $id . '">';
                echo '<input id="hiddenInput" type="hidden" name="people">';
              ?>
              <button id="bookNow" class="btn btn-primary-round btn-round mx-3">Book Now</button>
            
          </div>
        </div>
          </form>
      </div>
    </div>
  </main>

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
  <script>
    var numPeople = document.querySelector("input[name='num_people']").value;
    var basePrice = document.getElementById("price").value;
    var finalPrice = basePrice * numPeople;
    var hidden = document.getElementById("hiddenInput");
    var total = document.getElementById("total");
    document.querySelector(".package-price").innerHTML = `RM ${finalPrice}`;
    document.querySelector(".fa-plus").addEventListener("click", function () {
      numPeople++;
      document.querySelector("input[name='num_people']").value = numPeople;
      finalPrice = basePrice * numPeople;
      document.querySelector(".package-price").innerHTML = `RM ${finalPrice}`;
      hidden.value = numPeople;
      total.value = finalPrice;
    });
    document.querySelector(".fa-minus").addEventListener("click", function () {
      if(numPeople != 0){
      numPeople--;
      document.querySelector("input[name='num_people']").value = numPeople;
      finalPrice = basePrice * numPeople;
      document.querySelector(".package-price").innerHTML = `RM ${finalPrice}`;
      hidden.value = numPeople;
      total.value = finalPrice; 
      }
    });
    document.querySelector("input[name='num_people']").addEventListener("change", function () {
      numPeople = document.querySelector("input[name='num_people']").value;
      if (numPeople < 0) {
        numPeople = '0';
        alert("Invalid number");
        return;
      }
      finalPrice = basePrice * numPeople;
      hidden.value = numPeople;
      document.querySelector(".package-price").innerHTML = `$${finalPrice}`;
      total.value = finalPrice;
    });
   </script>




<script>
document.getElementById("bookingForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Get the values you need from the form, for example:
      var productName = document.getElementById("name").textContent;
      var numPersons = document.getElementById("num").value;
      var date = document.getElementById("date").value;
      var total = document.getElementById("total").value;
      var id = document.getElementById("get").value;

    // Create the HTML content for the popup
    var popupContent = `
        <div class='text-center my-5'>
        <h2>Purchase Info</h2>
        <p>Product Name: ${productName}</p>
        <p>Number of Persons: ${numPersons}</p>
        <p>Start Date: ${date}</p>
        <p>Total: RM ${total}</p>
        <button id="confirmButton" class='btn btn-primary-round btn-round mx-3'>Pay Now</button>
        <button id="cancelButton" class='btn btn-primary-round btn-round mx-3'>Cancel</button>
        </div>
    `;

    // Set the content of the popup
    document.getElementById("popup").innerHTML = popupContent;

    // Display the overlay and popup
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup").style.display = "block";

    // Add event listener for the Confirm and Cancel buttons
    document.getElementById("confirmButton").addEventListener("click", function () {
        document.getElementById("bookingForm").submit();
        closePopup();
    });

    document.getElementById("cancelButton").addEventListener("click", function () {
        closePopup();
    });
});

function closePopup() {
    // Hide the overlay and popup
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
}
</script>

<!-- Add your overlay and popup div elements here -->

</body>

</html>