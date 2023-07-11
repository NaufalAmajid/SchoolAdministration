<?php
$connect = Connection();
?>
<div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
    <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between pb-0">
            <div class="card-title mb-0">
                <h5 class="m-0 me-2">Laporan</h5>
                <small class="text-muted">Total Pembayaran Bulan <?= FormatMontIndo(date('m')) ?></small>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex flex-column align-items-center gap-1">
                    <?php
                        $payment = "SELECT
                                        SUM(d.nominal) AS total_payment
                                    FROM
                                        transactions a
                                        JOIN payments d ON a.code_payment = d.code_payment 
                                    WHERE
                                        a.status_bill = 1
                                        AND MONTH(a.payment_date) = MONTH(NOW())";
                        $payment = mysqli_fetch_array(mysqli_query($connect, $payment));
                    ?>
                    <h2 class="mb-2"><?= FormatRupiah($payment['total_payment']) ?></h2>
                    <span>Total Pembayaran</span>
                </div>
            </div>
            <ul class="p-0 m-0">
                <li class="d-flex mb-4 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-grid"></i></span>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <h6 class="mb-0">Kelas</h6>
                            <small class="text-muted">Jumlah Kelas</small>
                        </div>
                        <div class="user-progress">
                            <small class="fw-semibold">
                                <?php
                                    $countClass = "SELECT COUNT(code_class) AS totalClass FROM classrooms WHERE isactive = 1";
                                    $countClass = mysqli_fetch_array(mysqli_query($connect, $countClass));
                                    echo $countClass['totalClass'];
                                ?>
                            </small>
                        </div>
                    </div>
                </li>
                <li class="d-flex mb-4 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-success"><i class="bx bx-user-voice"></i></span>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <h6 class="mb-0">Murid</h6>
                            <small class="text-muted">Total Murid</small>
                        </div>
                        <div class="user-progress">
                            <small class="fw-semibold">
                                <?php
                                    $countStudent = "SELECT COUNT(code_student) AS totalStudent FROM students WHERE isactive = 1";
                                    $countStudent = mysqli_fetch_array(mysqli_query($connect, $countStudent));
                                    echo $countStudent['totalStudent'];
                                ?>
                            </small>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>