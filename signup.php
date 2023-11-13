<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
    <link href="css/theme.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
        .custom-switch-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .custom-switch-text1 {
            margin-right: 2rem; /* Adjust the margin as needed */
        }

        .custom-switch-text2 {
            margin-left: 0.5rem; /* Adjust the margin as needed */
        }

        .form-check-input:checked{
            background-color:#ef3139!important;
            border-color:#ef3139!important;
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <section class="hero-banner position-relative custom-pt-1 custom-pb-2 bg-dark"
            data-bg-img="assets/images/bg/02.png">
            <div class="container">
                <div class="row text-white text-center z-index-1">
                    <div class="col">
                        <h1 class="text-white">Sign Up</h1>
                    </div>
                </div>
            </div>
            <div class="shape-1 bottom">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 300">
                    <path fill="#fff" fill-opacity="1"
                        d="M0,288L48,288C96,288,192,288,288,266.7C384,245,480,203,576,208C672,213,768,267,864,245.3C960,224,1056,128,1152,96C1248,64,1344,96,1392,112L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>
            </div>
        </section>
        <div class="page-content">
            <section class="register">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8 col-md-12">
                            <div class="mb-5">
                                <h2><span class="font-w-4">Simple And</span> Easy To Sign Up</h2>
                            </div>
                        </div>
                    </div>

                    <div class="custom-switch-container mb-5">
                        <span class="custom-switch-text1" style="color: #022d62; font-weight: bold;" id="textCustomer">Customer</span>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 4em; height: 2em;">
                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                        </div>
                        <span class="custom-switch-text2" id="textMerchant">Merchant</span>
                    </div>

        

                    <div class="row">
                        <div class="col-lg-8 col-md-10 ms-auto me-auto">
                            <div class="register-form text-center">
                                <form id="customerForm" method="POST" action="php/functions.php?op=customerSignUp" onsubmit="return validatePassword()">
                                    <div class="messages"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="form_name" type="text" name="name" class="form-control"
                                                    placeholder="First name" required="required"
                                                    data-error="Firstname is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="form_lastname" type="text" name="surname"
                                                    class="form-control" placeholder="Last name" required="required"
                                                    data-error="Lastname is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="form_email" type="email" name="email" class="form-control"
                                                    placeholder="Email" required="required"
                                                    data-error="Valid email is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="form_phone" type="tel" name="phone" class="form-control"
                                                    placeholder="Phone" required="required"
                                                    data-error="Phone is required">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="form_password" type="password" name="password"
                                                    class="form-control" placeholder="Password" required="required"
                                                    data-error="password is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="form_password1" type="password" name="confirmPassword"
                                                    class="form-control" placeholder="Confirm Password"
                                                    required="required" data-error="Confirm Password is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control" name="gender">
                                                    <option selected>Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-3"></div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="remember-checkbox clearfix mb-4">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input float-none"
                                                        id="customCheck1" required>
                                                    <label class="form-check-label" for="customCheck1">I agree to the
                                                        term of use and privacy policy</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary">Create Account</button>
                                            <span class="mt-4 d-block">Have An Account ? <a href="login.php"><i>Sign
                                                        In!</i></a></span>
                                        </div>
                                    </div>
                                </form>

                                <form id="merchantForm" method="post" action="php/functions.php?op=merchantSignup" enctype="multipart/form-data" style="display: none;">
                                    <div class="messages"></div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input id="form_name" type="text" name="name" class="form-control"
                                                    placeholder="Merchant Name" required="required"
                                                    data-error="Firstname is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="form_email" type="email" name="email" class="form-control"
                                                    placeholder="Email" required="required"
                                                    data-error="Valid email is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="form_phone" type="tel" name="phone" class="form-control"
                                                    placeholder="Contact No" required="required"
                                                    data-error="Phone is required">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control" type="description" name="description"
                                                    aria-label="With textarea" placeholder="Company Description"
                                                    required="required"
                                                    data-error="Valid description is required."></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="form_email" type="text" name="filename" class="form-control"
                                                    placeholder="Filename" required="required"
                                                    data-error="Valid filename is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            
                                            <div>
                                                <label for="formFileLg" class="form-label">Upload your license or testimonial in image(jpg,jpeg,png)</label>
                                                <input class="form-control form-control-lg" id="formFileLg" name="file" type="file" required>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="remember-checkbox clearfix mb-4">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input float-none"
                                                        id="customCheck1" required>
                                                    <label class="form-check-label" for="customCheck1">I agree to the
                                                        term of use and privacy policy</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary">Create Account</button>
                                            <span class="mt-4 d-block">Have An Account ? <a href="login.php"><i>Sign
                                                        In!</i></a></span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
    const toggleSwitch = document.getElementById('flexSwitchCheckDefault');
    const merchantForm = document.getElementById('merchantForm');
    const customerForm = document.getElementById('customerForm');
    const customer = document.getElementById('textCustomer');
    const merchant = document.getElementById('textMerchant');

    toggleSwitch.addEventListener('change', function () {
        if (toggleSwitch.checked) {
        merchantForm.style.display = 'block';
        customerForm.style.display = 'none';
        merchant.style.fontWeight = 'bold';
        merchant.style.color = '#022d62';
        customer.style.fontWeight = 'normal';
        customer.style.color = '#717185';
        } else {
        merchantForm.style.display = 'none';
        customerForm.style.display = 'block';
        customer.style.fontWeight = 'bold';
        customer.style.color = '#022d62';
        merchant.style.fontWeight = 'normal';
        merchant.style.color = '#717185';
        }
    });
</script>
</body>

</html>