<?php
include 'dbConnect.php';

if ($_GET['op'] == 'testing') {
    $fileCount = count($_FILES['file']['name']);
    
    for ($i = 0; $i < $fileCount; $i++) {
        $img_name = $_FILES['file']['name'][$i];
        $img_size = $_FILES['file']['size'][$i];
        $tmp_name = $_FILES['file']['tmp_name'][$i];
        
        $error = $_FILES['file']['error'][$i];
        
        // Your file processing logic here
        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '-' . time() . '.' . $img_ex_lc;
                $img_upload_path = '../uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $sql = "INSERT INTO image (Image) VALUES ('$new_img_name')";

                if ($dbConnection->query($sql) === true) {
                    echo "File uploaded";
                } else {
                    echo "Error";
                }
            } else {
                echo "Invalid file type.";
            }
        } else {
            echo "Unknown error occurred. Please try again.";
        }
    }
}

?>
