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
    <title>Manage Account</title>
    <link rel="stylesheet" href="css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
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
            <h2 class="mb-5">Manage Account</h2>
            <h3>Customer</h3>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        global $dbConnection;
                        $sql = "SELECT UserID,Username,Role FROM user WHERE Role='customer'";
                        $userQ = mysqli_query($dbConnection,$sql);
                        $num = 1;
                        while($user = mysqli_fetch_assoc($userQ)){
                            if($user['Role'] != "admin"){
                                echo '<tr>
                                <th scope="row" class="align-middle">' . $num . '</th>
                                <td class="align-middle">' . $user['Username'] . '</td>
                                <td class="align-middle">' . $user['Role'] . '</td>
                                <td class="align-middle">
                                    <form method="post" action="php/functions.php?op=adminDelete">
                                        <input type="hidden" name="user_id" value="' . $user['UserID'] . '">
                                        <button onclick="return confirmation()" type="submit" class="btn btn-primary btn-sm">Delete</button>
                                    </form>
                                </td>
                                </tr>';
                                $num++;
                            }
                            
                        }
                        ?>
                    </tbody>
                </table>

                
            </div>

            <div class="container">
            <h3>Merchant</h3>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        global $dbConnection;
                        $sql = "SELECT UserID,Username,Role FROM user WHERE Role='merchant'";
                        $userQ = mysqli_query($dbConnection,$sql);
                        $num = 1;
                        while($user = mysqli_fetch_assoc($userQ)){
                            if($user['Role'] != "admin"){
                                echo '<tr>
                                <th scope="row" class="align-middle">' . $num . '</th>
                                <td class="align-middle">' . $user['Username'] . '</td>
                                <td class="align-middle">' . $user['Role'] . '</td>
                                <td class="align-middle">
                                    <form method="post" action="php/functions.php?op=adminDelete">
                                        <input type="hidden" name="user_id" value="' . $user['UserID'] . '">
                                        <button onclick="return confirmation()" type="submit" class="btn btn-primary btn-sm">Delete</button>
                                    </form>
                                </td>
                                </tr>';
                                $num++;
                            }
                            
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </section>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script>
        function confirmation(){
            return confirm('Are you sure you want to delete this account?');
        }
    </script>
</body>
</html>