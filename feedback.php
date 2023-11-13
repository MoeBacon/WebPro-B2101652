
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
    <title>View Feedback</title>
    <link rel="stylesheet" href="css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
        .feedback-container {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .checked {
            color: orange;
        }
    </style>
</head>

<body>
    <header class="header default">
        <nav class="navbar bg-white navbar-static-top navbar-expand-lg">
            <div class="container-fluid">
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
                <a class="navbar-brand" href="admin_page.php">
                    <img src="images/logo.svg" style="width:200px;height:75px;">
                </a>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="admin_page.php">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="feedback.php">View Feedback</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="manage_account.php">Manage Account</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="merchant_request.php">Merchant Request</a>
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
        <div class="container">
            <h2 class="mb-5">View Feedback</h2>
            <h3>5 stars rating</h3>
            <div class="row">
                <?php
                    global $dbConnection;
                    $sql = "SELECT Rating, Opinion, Username, Date FROM feedback WHERE Rating = 5";
                    $feedbackQ = mysqli_query($dbConnection,$sql);
                    if(mysqli_num_rows($feedbackQ)==0){
                        echo "< - - No rating - - >";
                    }
                    while($feedback = mysqli_fetch_assoc($feedbackQ)){
                        echo '<div class="feedback-container col-12 py-3 mb-3">';
                        echo '<h5>' . $feedback['Username'] . '</h5>';
                        $rating = $feedback['Rating'];
                        for($i=1; $i<=$rating; $i++){
                        echo '<span class="fa fa-star checked"></span>';
                        $left = 5 - $rating;
                        }
                        for($i=1; $i<=$left; $i++){
                            echo '<span class="fa fa-star"></span>';
                        }
                        echo '<i class="bi bi-star"></i>';
                        echo '<p>' . $feedback['Opinion'] . '</p>';
                        echo '<p>' . $feedback['Date'] . '</p>
                        </div>';
                    }
                ?>
            </div>

            <h3 class="my-3">4 stars rating</h3>
            <div class="row">
                <?php
                    global $dbConnection;
                    $sql = "SELECT Rating, Opinion, Username, Date FROM feedback WHERE Rating = 4";
                    $feedbackQ = mysqli_query($dbConnection,$sql);
                    if(mysqli_num_rows($feedbackQ)==0){
                        echo "< - - No rating - - >";
                    }
                    while($feedback = mysqli_fetch_assoc($feedbackQ)){
                        echo '<div class="feedback-container col-12 py-3 mb-3">';
                        echo '<h5>' . $feedback['Username'] . '</h5>';
                        $rating = $feedback['Rating'];
                        for($i=1; $i<=$rating; $i++){
                        echo '<span class="fa fa-star checked"></span>';
                        $left = 5 - $rating;
                        }
                        for($i=1; $i<=$left; $i++){
                            echo '<span class="fa fa-star"></span>';
                        }
                        echo '<i class="bi bi-star"></i>';
                        echo '<p>' . $feedback['Opinion'] . '</p>';
                        echo '<p>' . $feedback['Date'] . '</p>
                        </div>';
                    }
                ?>
            </div>

            <h3 class="my-3">3 stars rating</h3>
            <div class="row">
                <?php
                    global $dbConnection;
                    $sql = "SELECT Rating, Opinion, Username, Date FROM feedback WHERE Rating = 3";
                    $feedbackQ = mysqli_query($dbConnection,$sql);
                    if(mysqli_num_rows($feedbackQ)==0){
                        echo "< - - No rating - - >";
                    }
                    while($feedback = mysqli_fetch_assoc($feedbackQ)){
                        echo '<div class="feedback-container col-12 py-3 mb-3">';
                        echo '<h5>' . $feedback['Username'] . '</h5>';
                        $rating = $feedback['Rating'];
                        for($i=1; $i<=$rating; $i++){
                        echo '<span class="fa fa-star checked"></span>';
                        $left = 5 - $rating;
                        }
                        for($i=1; $i<=$left; $i++){
                            echo '<span class="fa fa-star"></span>';
                        }
                        echo '<i class="bi bi-star"></i>';
                        echo '<p>' . $feedback['Opinion'] . '</p>';
                        echo '<p>' . $feedback['Date'] . '</p>
                        </div>';
                    }
                ?>
            </div>

            <h3 class="my-3">2 stars rating</h3>
            <div class="row">
                <?php
                    global $dbConnection;
                    $sql = "SELECT Rating, Opinion, Username, Date FROM feedback WHERE Rating = 2";
                    $feedbackQ = mysqli_query($dbConnection,$sql);
                    if(mysqli_num_rows($feedbackQ)==0){
                        echo "< - - No rating - - >";
                    }
                    while($feedback = mysqli_fetch_assoc($feedbackQ)){
                        echo '<div class="feedback-container col-12 py-3 mb-3">';
                        echo '<h5>' . $feedback['Username'] . '</h5>';
                        $rating = $feedback['Rating'];
                        for($i=1; $i<=$rating; $i++){
                        echo '<span class="fa fa-star checked"></span>';
                        $left = 5 - $rating;
                        }
                        for($i=1; $i<=$left; $i++){
                            echo '<span class="fa fa-star"></span>';
                        }
                        echo '<i class="bi bi-star"></i>';
                        echo '<p>' . $feedback['Opinion'] . '</p>';
                        echo '<p>' . $feedback['Date'] . '</p>
                        </div>';
                    }
                ?>
            </div>

            <h3 class="my-3">1 star rating</h3>
            <div class="row">
                <?php
                    global $dbConnection;
                    $sql = "SELECT Rating, Opinion, Username, Date FROM feedback WHERE Rating = 1";
                    $feedbackQ = mysqli_query($dbConnection,$sql);
                    if(mysqli_num_rows($feedbackQ)==0){
                        echo "< - - No rating - - >";
                    }
                    while($feedback = mysqli_fetch_assoc($feedbackQ)){
                        echo '<div class="feedback-container col-12 py-3 mb-3">';
                        echo '<h5>' . $feedback['Username'] . '</h5>';
                        $rating = $feedback['Rating'];
                        for($i=1; $i<=$rating; $i++){
                        echo '<span class="fa fa-star checked"></span>';
                        $left = 5 - $rating;
                        }
                        for($i=1; $i<=$left; $i++){
                            echo '<span class="fa fa-star"></span>';
                        }
                        echo '<i class="bi bi-star"></i>';
                        echo '<p>' . $feedback['Opinion'] . '</p>';
                        echo '<p>' . $feedback['Date'] . '</p>
                        </div>';
                    }
                ?>
            </div>
    </section>
    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>
</html>