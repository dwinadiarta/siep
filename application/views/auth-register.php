<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Register | Pelindo Inventory Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-primary bg-pattern">
        <div class="home-btn d-none d-sm-block">
            <a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <a href="index.html" class="logo"><img src="assets/images/logo-light.png" height="24" alt="logo"></a>
                            <h5 class="font-size-16 text-white-50 mb-4">Responsive Bootstrap 4 Admin Dashboard</h5>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-xl-5 col-sm-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="mb-5 text-center">Register Account to Xoric.</h5>
                                    <form class="form-horizontal" action="<?=base_url('register/postRegister')?>" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="username" name="username" required>
                                                    <label for="username">Username</label>
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="email" class="form-control" id="useremail" name="email" required>
                                                    <label for="useremail">Email</label> 
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="userfull_name" name="full_name" required>
                                                    <label for="userfull_name">Full name</label> 
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="number" class="form-control" id="userphone" name="phone" required>
                                                    <label for="userphone">Phone</label> 
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="password" class="form-control" id="userpassword" name="password" required>
                                                    <label for="userpassword">Password</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="term-conditionCheck" required>
                                                    <label class="custom-control-label font-weight-normal" for="term-conditionCheck">Saya terima <a href="#" class="text-primary">Syarat dan Ketentuan</a></label>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Daftar</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="<?= base_url('login') ?>" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Sudah punya akun?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>


        <script src="assets/js/app.js"></script>

    </body>
</html>
