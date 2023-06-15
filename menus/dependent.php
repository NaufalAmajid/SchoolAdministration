<?php
$connect = Connection();
?>
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Tanggungan Siswa 💳📠</h5>
                        <p class="mb-4">
                            Menu manajemen tanggungan, yang harus dibayar oleh siswa yang ditampilkan berdasarkan perkelas.
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
<?php
$query = "SELECT a.code_class,
            a.name_class,
            a.type_class,
            COUNT( b.code_student ) AS total_student 
            FROM
            classrooms a
            RIGHT JOIN students b ON a.code_class = b.code_class 
            WHERE
            a.isactive = 1 
            GROUP BY
            a.code_class,
            a.name_class,
            a.type_class 
            ORDER BY
            a.name_class,
            a.type_class ASC";
$rows = ExecuteSelect($connect, $query);
$no   = 1;
$classroom = [];
foreach ($rows as $item) {
    $classroom[$item['name_class']][] = $item;
}
?>
<div class="row">
    <div class="col-lg-12 col-md-4 order-1">
        <?php foreach ($classroom as $name => $data) : ?>
            <div class="row">
                <h5 class="mt-4">Kelas <?= $name ?></h5>
                <?php foreach ($data as $item) : ?>
                    <?php
                    $random = rand(0, 6);
                    $color = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
                    ?>
                    <div class="col-lg-2 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-<?= $color[$random] ?>"><i class="bx bx-smile"></i></span>
                                    </div>
                                    <div class="dropdown">
                                        <?php
                                        $codeclass = $item['code_class'];
                                        $nameclass = $item['name_class'] . "-" . $item['type_class'];
                                        ?>
                                        <button class="btn p-0" type="button" id="btn-cart-<?= $no++ ?>" onclick="OpenModal('contents/dependent/content-dependent-classroom.php', 'modal-dependent', '<?= $codeclass .'#'. $nameclass ?>')">
                                            <i class="bx bx-cart"></i>
                                        </button>
                                    </div>
                                </div>
                                <h3 class="fw-semibold d-block mb-1"><?= $item['name_class'] . '-' . $item['type_class'] ?></h3>
                                <h6 class="card-title mb-2 text-<?= $color[$random] ?>"><?= $item['total_student'] ?> Siswa</h6>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="modal fade" id="modal-dependent" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"></div>