<?php
$url = $_SERVER['REQUEST_URI'];
$explodeUrl = explode('&', $url);
$connect = Connection();
?>
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Pembayaran Siswa 💳📠</h5>
                        <p class="mb-4">
                            Lakukan pembayaran dihalaman transaksi dan untuk melihat riwayat pembayaran ada dihalaman riwayat.
                        </p>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="libraries/assets/img/illustrations/payment.png" height="140" alt="Payment Student" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link <?= $_GET['sub'] == 'payment-transaction' ? 'active' : '' ?>" href="<?= $explodeUrl[0] ?>&sub=payment-transaction"><i class="bx bx-credit-card me-1"></i> Transaksi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $_GET['sub'] == 'payment-history' ? 'active' : '' ?>" href="<?= $explodeUrl[0] ?>&sub=payment-history"><i class="bx bx-book-bookmark me-1"></i> Riwayat</a>
            </li>
        </ul>
        <div class="card">
            <?php
            if ($_GET['sub'] == 'payment-transaction') {
                include 'payment-act-transaction.php';
            } elseif ($_GET['sub'] == 'payment-history') {
                include 'payment-act-history.php';
            } else {
                include 'payment-act-transaction.php';
            }
            ?>
        </div>
    </div>
</div>