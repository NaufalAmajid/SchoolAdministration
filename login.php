<?php

if (isset($_COOKIE['code_user'])) {
    header('location: index_admin.php');
}

date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
session_start();

?>
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="libraries/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login Dashboard School Administration</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="libraries/assets/img/icons/brands/logoSchool.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="libraries/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="libraries/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="libraries/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="libraries/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="libraries/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="libraries/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="libraries/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="libraries/assets/js/config.js"></script>
    <script src="libraries/assets/js/sweetalert2@11.js"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index_admin.php" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="libraries/assets/img/icons/brands/logoSchool.png" alt="logo" width="50" height="50">
                                </span>
                                <!-- <span class="app-brand-text demo text-body fw-bolder">Sneat</span> -->
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Selamat Datang! 👋</h4>
                        <p class="mb-4">Sistem Administrasi MI Takhasus Ma'arif Kaligawe</p>

                        <form id="formAuthentication" class="mb-3">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autocomplete="off" autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit" onclick="Login()">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="libraries/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="libraries/assets/vendor/libs/popper/popper.js"></script>
    <script src="libraries/assets/vendor/js/bootstrap.js"></script>
    <script src="libraries/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="libraries/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="libraries/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        function Login() {
            $('#formAuthentication').submit(function(e) {
                e.preventDefault();
                var data = $(this).serializeArray();
                $.ajax({
                    url: 'functions/login.php',
                    type: 'POST',
                    data: data,
                    success: function(data) {
                        var res = JSON.parse(data);
                        if (res.status == 'success') {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Success',
                                timer: 1000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location.href = 'index_admin.php';
                                }
                            })
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Oops...',
                                text: res.message,
                                timer: 2000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location.href = 'login.php';
                                }
                            })

                        }
                    }
                })
            })
        }
    </script>
</body>

</html>