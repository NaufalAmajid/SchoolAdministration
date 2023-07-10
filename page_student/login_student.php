<?php
if (isset($_COOKIE['code_student'])) {
    header('location: index_student.php');
}
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../libraries/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Administrasi Sekolah</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../libraries/assets/img/icons/brands/logoSchool.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../libraries/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../libraries/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../libraries/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../libraries/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../libraries/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../libraries/assets/vendor/css/pages/page-auth.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../libraries/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../libraries/assets/js/config.js"></script>
    <script src="../libraries/assets/js/sweetalert2@11.js"></script>
</head>

<body>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.php" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="../libraries/assets/img/icons/brands/logoSchool.png" alt="logo" width="50" height="50">
                                </span>
                                <!-- <span class="app-brand-text demo text-body fw-bolder">Sekolah</span> -->
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2 mt-4">Login</h4>
                        <p class="mb-3"><i>*Silahkan login menggunakan NISN masing-masing, jika tidak tahu NISN tanyakan kepada <b>Admin</b></i></p>

                        <form id="form-login-student" class="mb-3">
                            <div class="mb-3">
                                <label for="nisn_student" class="form-label">NISN</label>
                                <input type="text" class="form-control" id="nisn_student" name="nisn_student" placeholder="Silahkan Masukkan NISN Anda ..." autofocus autocomplete="off" />
                            </div>
                            <div class="mb-3">
                                <label for="password_student" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password_student" name="password_student" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                            </div>
                            <div class="mb-4">
                                <label class="form-check-label" for="terms-conditions">
                                    Untuk Password Default
                                    <a href="javascript:void(0);"><i>12345</i></a>
                                    anda dapat mengganti password dihalaman <a href="javascript:void(0);">Setting</a>
                                </label>
                            </div>
                            <button class="btn btn-primary w-100" onclick="LoginStudent()"><i class="bx bx-log-in"></i> Login</button>
                        </form>

                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>
    <!-- Content wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../libraries/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../libraries/assets/vendor/libs/popper/popper.js"></script>
    <script src="../libraries/assets/vendor/js/bootstrap.js"></script>
    <script src="../libraries/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../libraries/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../libraries/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        function LoginStudent() {
            $('#form-login-student').submit((e) => {
                e.preventDefault();
                var data = $('#form-login-student').serializeArray();
                $.ajax({
                    url: 'functions_student/login_student.php',
                    type: 'POST',
                    data: data,
                    success: function(data) {
                        var res = JSON.parse(data);
                        if (res.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Login Berhasil',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.href = 'index_student.php?menu=profile_student';
                            })
                        } else {
                            $('#form-login-student')[0].reset()
                            $('#nisn_student').focus()
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: res.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                })
            })
        }
    </script>
</body>

</html>