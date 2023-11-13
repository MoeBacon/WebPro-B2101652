<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'phpmailer/src/Exception.php';
// require 'phpmailer/src/PHPMailer.php';
// require 'phpmailer/src/SMTP.php';

// $mail = new PHPMailer(true);

// $mail->isSMTP();
// $mail->Host = 'smtp.gmail.com';
// $mail->SMTPAuth = true;
// $mail->Username = 'localxplorerphp@gmail.com';
// $mail->Password = 'oxrn owtv pkgy yzim';
// $mail->SMTPSecure = 'ssl';
// $mail->Port = 465;

// $mail->setFrom('localxplorerphp@gmail.com');
// $mail->addAddress('weichenheng22@gmail.com');

// $mail->isHTML(true);

// $mail->Subject = 'Testing';
// $mail->Body = 'HELLO This is a testing message';

// $mail->send();

// echo "<script>alert('Sent Successful');</script>";
include 'dbConnect.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
        include 'dbConnect.php';

          $sql = "SELECT * FROM image";

          $res = mysqli_query($dbConnection,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="alb">
             	<img src="../uploads/<?=$images['Image']?>">
             </div>
          		
    <?php } }
    
    ?>
</body>
</html>