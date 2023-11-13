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
    <title>Admin Homepage</title>
    <link rel="stylesheet" href="css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <style>

        .merchant-details {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .merchant-details h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .merchant-details img {
            max-width: 100%;
            height: auto;
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
            <div class="merchant-details">
                <h2>Merchant Details</h2>
                <?php
                    global $dbConnection;
                    $id = $_POST['request_id'];
                    $sql = "SELECT * FROM request WHERE RequestID=$id";
                    $result = mysqli_query($dbConnection,$sql);
                    if($result){
                        $row = mysqli_fetch_assoc($result);
                        echo '<p><strong>Email:</strong> ' . $row['Email'] . '</p>';
                        echo '<p><strong>Description of Company:</strong> ' . $row['Description'] . '</p>';
                        echo '<p><strong>Status:</strong> ' . $row['Status'] . '</p>';
                        echo '<p><strong>Date:</strong> ' . $row['Date'] . '</p>';
                        echo '<p><strong>File:</strong> ' . $row['Filename'] . '</p>';
                        echo '<img src="uploads/' . $row['File'] . '" alt="Merchant License" class="mb-3">';

                        if($row['Status'] == "PENDING"){
                            echo '<div class="text-center">';
                            echo '<a href="php/functions.php?op=adminApprove&id=' . $row['RequestID'] . '"><button type="button" class="btn btn-primary-round btn-round mx-3" data-toggle="modal" data-target="#addNewItemModal">Approve</button></a>';
                            echo '<a href="php/functions.php?op=adminReject&id=' . $row['RequestID'] . '"><button type="button" class="btn btn-primary-round btn-round mx-3" data-toggle="modal" data-target="#addNewItemModal">Reject</button></a>';
                            echo '</div>';
                        }
                    }
                ?>
                
                <!-- <p><strong>Email:</strong> merchant@example.com</p>
                <p><strong>Description:</strong> This is a description of the merchant's company.</p>
                <p><strong>Status:</strong> Active</p>
                <p><strong>Date:</strong> October 15, 2023</p>
                <p><strong>File:</strong></p>
                <img src="path-to-license-image.jpg" alt="Merchant License"> -->
            </div>
            

            
        </div>
    </section>
    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>

</html>