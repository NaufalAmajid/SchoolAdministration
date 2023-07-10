<?php
if (!isset($_COOKIE['code_user'])) {
  header('location: login.php');
}

date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
include 'functions/sidebar.php';
include 'functions/function.php';

$menu = $_GET['menu'];
$subMasterData = ['teachings-year', 'classrooms', 'students', 'payment-type', 'users'];
$subMenuTransaction = ['dependent', 'payment-act'];
$subMenuReport = ['report-payment'];
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="libraries/assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dashboard - School Administration</title>

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

  <link rel="stylesheet" href="libraries/assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="libraries/assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="libraries/assets/js/config.js"></script>
  <script src="libraries/assets/vendor/libs/jquery/jquery-3.5.1.js"></script>
  <!-- datatable -->
  <link rel="stylesheet" href="libraries/assets/vendor/libs/datatables/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="libraries/assets/vendor/libs/datatables/buttons.dataTables.min.css" />
  <script src="libraries/assets/vendor/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="libraries/assets/vendor/libs/datatables/dataTables.buttons.min.js"></script>
  <script src="libraries/assets/vendor/libs/datatables/jszip.min.js"></script>
  <script src="libraries/assets/vendor/libs/datatables/pdfmake.min.js"></script>
  <script src="libraries/assets/vendor/libs/datatables/vfs_fonts.js"></script>
  <script src="libraries/assets/vendor/libs/datatables/buttons.html5.min.js"></script>
  <script src="libraries/assets/vendor/libs/datatables/buttons.print.min.js"></script>
  <!-- end datatable -->
  <script src="libraries/assets/js/sweetalert2@11.js"></script>
  <script src="libraries/assets/js/excellentexport.min.js"></script>
  <script src="libraries/assets/js/ui-toasts.js"></script>
  <script src="functions/function.js"></script>
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
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img src="libraries/assets/img/icons/brands/logoSchool.png" alt="logo" width="50" height="50">
            </span>
            <span class="demo menu-text fw-bolder ms-2">MI Tahassus Ma'arif NU</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item <?= isset($_GET['menu']) ? '' : 'active' ?>">
            <a href="index_admin.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>
          <li class="menu-item <?= MenuDropdown($subMasterData) ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Layouts"><?= $_COOKIE['role'] == 'kepsek' ? 'List' : 'Master' ?> Data</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item <?= MenuActive('teachings-year') ?>">
                <a href="?menu=teachings-year" class="menu-link">
                  <div data-i18n="teachings-year">Tahun Ajaran</div>
                </a>
              </li>
              <li class="menu-item <?= MenuActive('classrooms') ?>">
                <a href="?menu=classrooms" class="menu-link">
                  <div data-i18n="classrooms">Kelas</div>
                </a>
              </li>
              <li class="menu-item <?= MenuActive('students') ?>">
                <a href="?menu=students" class="menu-link">
                  <div data-i18n="students">Siswa</div>
                </a>
              </li>
              <li class="menu-item <?= MenuActive('payment-type') ?>">
                <a href="?menu=payment-type" class="menu-link">
                  <div data-i18n="Fluid">Jenis Pembayaran</div>
                </a>
              </li>
              <li class="menu-item <?= MenuActive('users') ?>">
                <a href="?menu=users" class="menu-link">
                  <div data-i18n="Blank">User</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Menu -->
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu</span>
          </li>
          <?php if ($_COOKIE['role'] != 'kepsek') : ?>
            <li class="menu-item <?= MenuDropdown($subMenuTransaction) ?>">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-credit-card"></i>
                <div data-i18n="Account Settings">Transaksi</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item <?= MenuActive('dependent') ?>">
                  <a href="?menu=dependent" class="menu-link">
                    <div data-i18n="Account">Tanggungan</div>
                  </a>
                </li>
                <li class="menu-item <?= MenuActive('payment-act') ?>">
                  <a href="?menu=payment-act&sub=payment-transaction" class="menu-link">
                    <div data-i18n="Notifications">Pembayaran</div>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif; ?>
          <li class="menu-item <?= MenuDropdown($subMenuReport) ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bxs-report"></i>
              <div data-i18n="Authentications">Laporan</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item <?= MenuActive('report-payment') ?>">
                <a href="?menu=report-payment" class="menu-link">
                  <div data-i18n="Basic">Laporan</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Authentication -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Authentications</span></li>
          <!-- Cards -->
          <li class="menu-item">
            <a href="functions/logout.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-log-out"></i>
              <div data-i18n="Basic">Logout</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              <li class="nav-item lh-1 me-3">
                <span><?= $_COOKIE['name'] ?></span>
              </li>

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="libraries/assets/img/avatars/admin.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="libraries/assets/img/avatars/admin.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block"><?= $_COOKIE['username'] ?></span>
                          <small class="text-muted"><?= strtoupper($_COOKIE['role']) ?></small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li> -->
                  <li>
                    <a class="dropdown-item" href="functions/logout.php">
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
            <?php
            if (isset($_GET['menu'])) {
              include('menus/' . $menu . '.php');
            } else {
              include('menus/dashboard.php');
            }
            ?>
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
                , made with 😎 by
                <!-- ❤️ -->
                <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">Nanzy</a>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js libraries/assets/vendor/js/core.js -->
  <script src="libraries/assets/vendor/libs/popper/popper.js"></script>
  <script src="libraries/assets/vendor/js/bootstrap.js"></script>
  <script src="libraries/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="libraries/assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="libraries/assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="libraries/assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="libraries/assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>