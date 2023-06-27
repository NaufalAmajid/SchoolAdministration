<?php
if (!isset($_COOKIE['code_student'])) {
    header('location: login_student.php');
}

date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
include '../functions/function.php';

$connect = Connection();
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../libraries/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Administrasi Sekolah</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../libraries/assets/img/favicon/favicon.ico" />

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

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../libraries/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../libraries/assets/js/config.js"></script>
    <script src="../libraries/assets/js/sweetalert2@11.js"></script>
    <style>
        @media (max-width: 575.98px) {
            #header-greating {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <!-- ALERT -->
    <div id="alert-global" class="bs-toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1000">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold" id="alert-title-global"></div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="alert-body-global"></div>
    </div>
    <!-- END ALERT -->

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center mt-2">
                                <h3 id="header-greating">Selamat Datang, Aplikasi Administrasi Sekolah</h3>
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            <li class="nav-item lh-1 me-3">
                                <a class="github-button" href="#" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"><?= $_COOKIE['name_student'] ?></a>
                            </li>

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../libraries/assets/img/avatars/<?= $_COOKIE['gender'] == 1 ? 'men_student' : 'girl_student' ?>.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../libraries/assets/img/avatars/<?= $_COOKIE['gender'] == 1 ? 'men_student' : 'girl_student' ?>.png" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <?php
                                                    $classroom = "SELECT CONCAT(name_class, '-', type_class) AS class_student FROM classrooms WHERE code_class = '$_COOKIE[code_class]'";
                                                    $result = mysqli_query($connect, $classroom);
                                                    $classroom = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <span class="fw-semibold d-block"><?= $_COOKIE['name_student'] ?></span>
                                                    <small class="text-muted">Siswa <?= $classroom['class_student'] ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changePassword">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="functions_student/logout_student.php">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link <?= $_GET['menu'] == 'profile_student' ? 'active' : '' ?>" href="?menu=profile_student"><i class="bx bx-happy me-1"></i> Biodata Siswa</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= $_GET['menu'] == 'billing_student' ? 'active' : '' ?>" href="?menu=billing_student"><i class="bx bx-receipt me-1"></i> Tagihan</a>
                                    </li>
                                </ul>
                                <div class="row">
                                    <?php
                                    if ($_GET['menu'] == 'profile_student') {
                                        include 'menus_student/profile_student.php';
                                    } elseif ($_GET['menu'] == 'billing_student') {
                                        include 'menus_student/billings_student.php';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="https://www.github.com/naufalamajid" target="_blank" class="footer-link fw-bolder">Nanzy</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
    <div class="modal fade" id="changePassword" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Ganti Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="password_old" class="form-label">Password Lama</label>
                            <input type="password" id="password_old" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label class="form-label" for="password_new">Password Baru</label>
                            <input type="password" class="form-control" id="password_new" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        </div>
                        <div class="col mb-0">
                            <label for="password_new_confirm" class="form-label">Confirm Password</label>
                            <input id="password_new_confirm" type="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="button" class="btn btn-info" onclick="ChangePassword('<?= $_COOKIE['code_student'] ?>')">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- / Layout wrapper -->

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
    <script src="../functions/function.js"></script>
    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        function ChangePassword(codeStudent) {
            var passwordOld = $('#password_old').val();
            var passwordNew = $('#password_new').val();
            var passwordNewConfirm = $('#password_new_confirm').val();
            if (passwordOld == '' || passwordNew == '' || passwordNewConfirm == '') {
                AlertGlobal('warning', 'Gagal', 'Semua field harus diisi');
                return false;
            }
            $('#changePassword').modal('hide');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan mengubah password anda",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Ubah Password!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'functions_student/change_password.php',
                        type: 'POST',
                        data: {
                            code_student: codeStudent,
                            password_old: passwordOld,
                            password_new: passwordNew,
                            password_new_confirm: passwordNewConfirm
                        },
                        success: function(data) {
                            var response = JSON.parse(data);
                            $('#password_old').val('');
                            $('#password_new').val('');
                            $('#password_new_confirm').val('');
                            AlertGlobal(response.status, response.title, response.message);
                            if (response.status != 'success') {
                                $('#changePassword').modal('show');
                            }
                        }
                    })
                }
            })
        }
    </script>
</body>

</html>