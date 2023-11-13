<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Merchant Account</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
    <link href="css/theme.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<style> 
    :root {
        --colorPrimaryNormal: #00b3bb;
        --colorPrimaryDark: #00979f;
        --colorPrimaryGlare: #00cdd7;
        --colorPrimaryHalf: #80d9dd;
        --colorPrimaryQuarter: #bfecee;
        --colorPrimaryEighth: #dff5f7;
        --colorPrimaryPale: #f3f5f7;
        --colorPrimarySeparator: #f3f5f7;
        --colorPrimaryOutline: #dff5f7;
        --colorButtonNormal: #00b3bb;
        --colorButtonHover: #00cdd7;
        --colorLinkNormal: #00979f;
        --colorLinkHover: #00cdd7;
    }

    .upload_dropZone {
        color: #0f3c4b;
        background-color: var(--colorPrimaryPale, #c8dadf);
        outline: 2px dashed var(--colorPrimaryHalf, #c1ddef);
        outline-offset: -12px;
        transition:
            outline-offset 0.2s ease-out,
            outline-color 0.3s ease-in-out,
            background-color 0.2s ease-out;
    }

    .upload_dropZone.highlight {
        outline-offset: -4px;
        outline-color: var(--colorPrimaryNormal, #0576bd);
        background-color: var(--colorPrimaryEighth, #c8dadf);
    }

    .upload_svg {
        fill: var(--colorPrimaryNormal, #0576bd);
    }

    .btn-upload {
        color: #fff;
        background-color: var(--colorPrimaryNormal);
    }

    .btn-upload:hover,
    .btn-upload:focus {
        color: #fff;
        background-color: var(--colorPrimaryGlare);
    }

    .upload_img {
        width: calc(33.333% - (2rem / 3));
        object-fit: contain;
    }
</style>

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
                    <div class="row">
                        <div class="col-lg-8 col-md-10 ms-auto me-auto">
                            <div class="register-form text-center">
                                <form id="contact-form" method="post" action="php/functions.php?op=merchantSignup" enctype="multipart/form-data">
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

    <svg style="display:none">
        <defs>
            <symbol id="icon-imageUpload" clip-rule="evenodd" viewBox="0 0 96 96">
                <path
                    d="M47 6a21 21 0 0 0-12.3 3.8c-2.7 2.1-4.4 5-4.7 7.1-5.8 1.2-10.3 5.6-10.3 10.6 0 6 5.8 11 13 11h12.6V22.7l-7.1 6.8c-.4.3-.9.5-1.4.5-1 0-2-.8-2-1.7 0-.4.3-.9.6-1.2l10.3-8.8c.3-.4.8-.6 1.3-.6.6 0 1 .2 1.4.6l10.2 8.8c.4.3.6.8.6 1.2 0 1-.9 1.7-2 1.7-.5 0-1-.2-1.3-.5l-7.2-6.8v15.6h14.4c6.1 0 11.2-4.1 11.2-9.4 0-5-4-8.8-9.5-9.4C63.8 11.8 56 5.8 47 6Zm-1.7 42.7V38.4h3.4v10.3c0 .8-.7 1.5-1.7 1.5s-1.7-.7-1.7-1.5Z M27 49c-4 0-7 2-7 6v29c0 3 3 6 6 6h42c3 0 6-3 6-6V55c0-4-3-6-7-6H28Zm41 3c1 0 3 1 3 3v19l-13-6a2 2 0 0 0-2 0L44 79l-10-5a2 2 0 0 0-2 0l-9 7V55c0-2 2-3 4-3h41Z M40 62c0 2-2 4-5 4s-5-2-5-4 2-4 5-4 5 2 5 4Z" />
            </symbol>
        </defs>
    </svg>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>