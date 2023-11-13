<?php
    include 'php/dbConnect.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header ("Location: login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Invoice</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" />
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 5px;
    }

    .invoice-title {
      font-size: 24px;
    }

    .invoice-header {
      margin-bottom: 50px;
      width: 100%;
      height: 100px;
    }

    .invoice-body {
      margin-bottom: 50px;
    }

    .invoice-footer {
      margin-bottom: 50px;
    }

    .left{
        float: left;
        width: 50%;
    }

    .right{
        float: right;
        width: 50%;
        text-align: right;
    }

    .top{
        text-align: center;
    }
  </style>
</head>
<body class="container mt-5 border pb-5">
    <div class="top mb-5">
        <h2>Local Xplorer</h2>
        <h3>CONTACT: +6767667767</h3>
        <h3>WEBSITE: www.localxplorer.com</h3>
    </div>
    <div class="row">
      <div class="invoice-header mb-5">
    <div class="left">
        <?php
            global $dbConnection;
            $id = $_POST['purchase_id'];
            $sql = "SELECT
            purchase.PurchaseID,
            purchase.Date,
            purchase.BillDate,
            customer.FirstName,
            customer.LastName,
            customer.Email,
            customer.Phone
        FROM
            purchase
        JOIN
            customer ON purchase.CustID = customer.CustID
        WHERE PurchaseID='$id';";
            $purchaseQ = mysqli_query($dbConnection,$sql);
            if($purchaseQ){
                $purchase = mysqli_fetch_assoc($purchaseQ);

            }
        ?>
        <h4>Customer</h4>
        <p>NAME: <?php echo $purchase['LastName'].' '.$purchase['FirstName']; ?></p>
        <p>PHONE: <?php echo $purchase['Phone']; ?></p>
        <p>EMAIL: <?php echo $purchase['Email']; ?></p>
    </div>
    <div class="right">
        <p>BILL NUMBER: <?php echo "INV".$purchase['PurchaseID']; ?></p>
        <p>BILL DATE: <?php echo $purchase['BillDate']; ?></p>
    </div>
  </div>
    </div>
  

  <div class="invoice-title top my-5">
    <h1>Invoice</h1>
  </div>

  <div class="invoice-body">
    <table>
      <thead>
        <tr>
          <th>Item</th>
          <th>Description</th>
          <th>Start Date</th>
          <th>Pax</th>
          <th>Price</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $sql = "SELECT
            purchase.Date,
            purchase.Total,
            purchase.Pax,
            purchase.Date,
            product.Name,
            product.Description,
            product.Price
        FROM
            purchase
        JOIN
            product ON purchase.ProductID = Product.ProductID
            WHERE PurchaseID='$id';";
        $purchaseQ = mysqli_query($dbConnection,$sql);
        
        if($purchaseQ){
            $purchase = mysqli_fetch_assoc($purchaseQ);
            $ellipsis = "...";
            $description = substr($purchase['Description'], 0, 100 - strlen($ellipsis)) . $ellipsis;
        }
        ?>
        <tr>
          <td><?php echo $purchase['Name'] ?></td>
          <td><?php echo $description ?></td>
          <td><?php echo $purchase['Date'] ?></td>
          <td><?php echo $purchase['Pax'] ?></td>
          <td>RM <?php echo $purchase['Price'] ?></td>
          <td>RM <?php echo $purchase['Total'] ?></td>
        </tr>
        
      </tbody>
    </table>
  </div>

  <div class="invoice-footer">
    <p>Total: RM <?php echo $purchase['Total']  ?></p>
  </div>

  <?php
    echo '<div class="back-button text-center">';
    echo '<a class="btn btn-primary-round btn-round mx-3" href="purchaseHistory_Customer.php">Back</a>';
    echo '</div>';

    ?>

</body>
</html>
