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
    <title>Merchant Request</title>
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
            <h2>Manage Request</h2>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            global $dbConnection;
                            $sql = "SELECT RequestID,Phone,Email,Status,Date FROM request";
                            $requestQ = mysqli_query($dbConnection,$sql);
                            $num = 1;
                            while($request = mysqli_fetch_assoc($requestQ)){
                                if($request['Status'] == "PENDING"){
                                    echo '<tr  style="background-color:#fdfdc2;">
                                    <th scope="row" class="align-middle">' . $num . '</th>
                                    <td class="align-middle">' . $request['Email'] . '</td>
                                    <td class="align-middle">' . $request['Status'] . '</td>
                                    <td class="align-middle">' . $request['Phone'] . '</td>
                                    <td class="align-middle">' . $request['Date'] . '</td>
                                    <td class="align-middle">
                                        <form method="post" action="merchant_details.php">
                                            <input type="hidden" name="request_id" value="' . $request['RequestID'] . '">
                                            <button type="submit" class="btn btn-primary btn-sm">View</button>
                                        </form>
                                    </td>
                                    </tr>';
                                }
                                elseif($request['Status'] == "APPROVE"){
                                    echo '<tr style="background-color:#c6ecc6;">
                                    <th scope="row" class="align-middle">' . $num . '</th>
                                    <td class="align-middle">' . $request['Email'] . '</td>
                                    <td class="align-middle">' . $request['Status'] . '</td>
                                    <td class="align-middle">' . $request['Phone'] . '</td>
                                    <td class="align-middle">' . $request['Date'] . '</td>
                                    <td class="align-middle">
                                        <form method="post" action="merchant_details.php">
                                            <input type="hidden" name="request_id" value="' . $request['RequestID'] . '">
                                            <button type="submit" class="btn btn-primary btn-sm">View</button>
                                        </form>
                                    </td>
                                    </tr>';
                                }
                                elseif($request['Status'] == "REJECT"){
                                    echo '<tr style="background-color:#fccccc;">
                                    <th scope="row" class="align-middle">' . $num . '</th>
                                    <td class="align-middle">' . $request['Email'] . '</td>
                                    <td class="align-middle">' . $request['Status'] . '</td>
                                    <td class="align-middle">' . $request['Phone'] . '</td>
                                    <td class="align-middle">' . $request['Date'] . '</td>
                                    <td class="align-middle">
                                        <form method="post" action="merchant_details.php">
                                            <input type="hidden" name="request_id" value="' . $request['RequestID'] . '">
                                            <button type="submit" class="btn btn-primary btn-sm">View</button>
                                        </form>
                                    </td>
                                    </tr>';
                                }

                                    $num++;
                            }
                        ?>
                        <!-- <tr>
                            <th scope="row" class="align-middle">1</th>
                            <td class="align-middle">Thornton</td>
                            <td class="align-middle">asdfasdfasdf</td>
                            <td class="align-middle">11111111</td>
                            <td class="align-middle">Date</td>
                            <td class="align-middle">
                                <form method="post" action="your_action_url.php">
                                    <input type="hidden" name="item_id" value="your_item_id_value">
                                    <button type="submit" class="btn btn-primary btn-sm">View</button>
                                </form>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
    </section>
    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>
</html>