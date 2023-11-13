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
    <title>Edit</title>
    <link rel="stylesheet" href="css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/swiper/swiper.min.css" />
    <link rel="stylesheet" href="css/animate/animate.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
        .preview-images-zone {
            width: 100%;
            border: 1px solid #ddd;
            min-height: 180px;
            /* display: flex; */
            padding: 5px 5px 0px 5px;
            position: relative;
            overflow: auto;
        }

        .preview-images-zone>.preview-image:first-child {
            height: 185px;
            width: 185px;
            position: relative;
            margin-right: 5px;
        }

        .preview-images-zone>.preview-image {
            height: 90px;
            width: 90px;
            position: relative;
            margin-right: 5px;
            float: left;
            margin-bottom: 5px;
        }

        .preview-images-zone>.preview-image>.image-zone {
            width: 100%;
            height: 100%;
        }

        .preview-images-zone>.preview-image>.image-zone>img {
            width: 100%;
            height: 100%;
        }

        .preview-images-zone>.preview-image>.tools-edit-image {
            position: absolute;
            z-index: 100;
            color: #fff;
            bottom: 0;
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
            display: none;
        }

        .preview-images-zone>.preview-image>.image-cancel {
            font-size: 18px;
            position: absolute;
            top: 0;
            right: 0;
            font-weight: bold;
            margin-right: 10px;
            cursor: pointer;
            display: none;
            z-index: 100;
        }

        .preview-image:hover>.image-zone {
            cursor: move;
            opacity: .5;
        }

        .preview-image:hover>.tools-edit-image,
        .preview-image:hover>.image-cancel {
            display: block;
        }

        .ui-sortable-helper {
            width: 90px !important;
            height: 90px !important;
        }
    </style>
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
            <form class="container" method="post" action="php/functions.php?op=merchantUpload" enctype="multipart/form-data">
                <div class="package-detail my-3">
                    <div class="package-header"> 
                        <h2>Name</h3>
                        <input style="width: 30%;" tpype="text" name="name" required></input>
                    </div>
                    <div class="my-5">
                        <h3>Upload images</h2>
                        <div>
                            <label for="formFileLg" class="form-label">Upload all images in single selection(jpg,jpeg,png)</label>
                            <input class="form-control form-control-lg" id="formFileLg" name="file[]" type="file" multiple required>
                        </div>
                        <ul id="fileList"></ul>
                       
                    </div>
                    <br>
                    
                    <div class="package-description my-2">
                        <h3>Description</h3>
                        <textarea name="description" style="width:100%" rows="5" required></textarea>
                    </div>
                    <label class="form-label">Please separate your points by pressing the Enter key after each point.</label>
                    <div class="package-highlights my-3">
                        <h3>Highlights</h3>
                        <textarea name="highlight" rows="7" cols="80" required></textarea>
                    </div>
                    <div class="package-inclusions my-3">
                        <h3>Package Inclusions</h3>
                        <textarea name="package" rows="5" cols="80" required></textarea>
                    </div>
                    <div class="package-price my-3">
                        <h3>Price</h3>
                        <input type="number" step="0.01" min="0" name="price" required></input>
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary-round btn-round mx-3" data-toggle="modal"
                            data-target="#addNewItemModal">Save</button>
                        <a href="merchant_product_list.php"><button type="button" class="btn btn-primary-round btn-round mx-3" data-toggle="modal"
                            data-target="#addNewItemModal">Cancel</button></a>
                    </div>
                </div>
            </form>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
//         $(document).ready(function() {
//     document.getElementById('pro-image').addEventListener('change', readImage, false);
    
//     $( ".preview-images-zone" ).sortable();
    
//     $(document).on('click', '.image-cancel', function() {
//         let no = $(this).data('no');
//         $(".preview-image.preview-show-"+no).remove();
//     });
// });



// var num = 4;
// function readImage() {
//     if (window.File && window.FileList && window.FileReader) {
//         var files = event.target.files; //FileList object
//         var output = $(".preview-images-zone");

//         for (let i = 0; i < files.length; i++) {
//             var file = files[i];
//             if (!file.type.match('image')) continue;
            
//             var picReader = new FileReader();
            
//             picReader.addEventListener('load', function (event) {
//                 var picFile = event.target;
//                 var html =  '<div class="preview-image preview-show-' + num + '">' +
//                             '<div class="image-cancel" data-no="' + num + '">x</div>' +
//                             '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                            
//                             '</div>';

//                 output.append(html);
//                 num = num + 1;
//             });

//             picReader.readAsDataURL(file);
//         }
//         $("#pro-image").val('');
//     } else {
//         console.log('Browser not support');
//     }
// }
    </script>
    <script>
    // Get the file input field
    var fileInput = document.getElementById('formFileLg');
    
    // Add an event listener to the file input field to listen for the "change" event
    fileInput.addEventListener('change', displaySelectedFiles);
    
    // Function to display the selected files
    function displaySelectedFiles() {
      // Get the list of selected files
      var selectedFiles = fileInput.files;
    
      // Get the existing file list element
      var fileList = document.getElementById('fileList');
    
      // Append the new file names to the file list element
      for (var i = 0; i < selectedFiles.length; i++) {
        var file = selectedFiles[i];
        var listItem = document.createElement('li');
        listItem.textContent = file.name;
        fileList.appendChild(listItem);
      }
    }
    </script>
</body>

</html>