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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        /* Basic CSS styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .receipt {
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #333;
        }

        p {
            margin: 10px 0;
        }

        .back-button {
            margin-top: 20px;
            text-align: center;
        }

        .back-button a {
            text-decoration: none;
            background-color: #0074d9;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .back-button a:hover {
            background-color: #0056b3;
        }

        .receipt {
    position: relative;
}

.payment-text {
    position: absolute;
    bottom: 0px;
    right: 5px;
    font-size: 12px;
    color: green;
}

    </style>
</head>
<body>
    <div class="receipt">
        <h2>Receipt</h2>
        <?php
            global $dbConnection;
            $id = $_POST['purchase_id'];
            $sql = "SELECT purchase.Date, purchase.Pax, purchase.Total, purchase.ProductID, product.Name
            FROM purchase
            JOIN product ON purchase.ProductID = product.ProductID
            WHERE PurchaseID='$id';";
            $purchaseQ = mysqli_query($dbConnection,$sql);
            if($purchaseQ){
                $purchase = mysqli_fetch_assoc($purchaseQ);
                echo '<p>Product Name: <span id="product-name">' . $purchase['Name'] . '</span></p>';
                echo '<p>Number of Persons: <span id="num-persons">' . $purchase['Pax'] . '</span></p>';
                echo '<p>Start Date: <span id="start-date">' . $purchase['Date'] . '</span></p>';
                echo '<p>Total: <span id="total">RM ' . $purchase['Total'] . '</span></p>';
                echo '<div class="back-button">';
                echo '<a href="purchaseHistory_Customer.php">Back</a>';
                echo '</div>';
            }
        ?>
        <p class="payment-text">Payment Done</p>
    </div>
</body>
</html>

