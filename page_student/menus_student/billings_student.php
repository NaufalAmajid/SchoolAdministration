<div class="col-md-6 col-12 mb-md-0 mb-4">
    <div class="card">
        <h5 class="card-header">Tagihan Siswa</h5>
        <div class="card-body">
            <p>Berikut Daftar Tagihan Siswa <?= $_COOKIE['name_student'] ?></p>
            <!-- Connections -->
            <div class="row mt-2">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tagihan</th>
                                <th>Nominal</th>
                                <th>Bulan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryBill = "SELECT 
                                                a.id, 
                                                a.code_bill, 
                                                a.status_bill, 
                                                a.payment_date, 
                                                b.type_payment, 
                                                b.description, 
                                                b.nominal 
                                            FROM 
                                                transactions a 
                                                JOIN payments b ON a.code_payment = b.code_payment 
                                            WHERE 
                                                a.code_student = '$_COOKIE[code_student]' 
                                                AND a.status_bill = 0";
                            $billing = ExecuteSelect($connect, $queryBill);
                            $noBilling = 1;
                            $billings = [];
                            foreach ($billing as $bill) {
                                $billings[$bill['type_payment']][] = $bill;
                            }
                            ?>
                            <?php foreach ($billings as $type => $bills) : ?>
                                <tr>
                                    <td colspan="5"><b><?= strtoupper($type) ?></b></td>
                                </tr>
                                <?php foreach ($bills as $b) : ?>
                                    <?php
                                    $declareMonth = ExtractCodeBillEachMountAndYear($b['code_bill']);
                                    ?>
                                    <tr>
                                        <td><?= $noBilling++ ?></td>
                                        <td><?= $b['description'] ?></td>
                                        <td><?= FormatRupiah($b['nominal']) ?></td>
                                        <td><?= $declareMonth[0] ?></td>
                                        <td>
                                            <?php if ($b['status_bill'] == 0) : ?>
                                                <span class="badge bg-danger">Belum Lunas</span>
                                            <?php else : ?>
                                                <span class="badge bg-success">Lunas</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /Connections -->
        </div>
    </div>
</div>
<div class="col-md-6 col-12">
    <div class="card">
        <h5 class="card-header">Riwayat Tagihan</h5>
        <div class="card-body">
            <p>Daftar Riwayat Tagihan Siswa <?= $_COOKIE['name_student'] ?></p>
            <div class="row mt-2">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Tagihan</td>
                                <td>Nominal</td>
                                <td>Bulan</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryBill = "SELECT 
                                                a.id, 
                                                a.code_bill, 
                                                a.status_bill, 
                                                a.payment_date, 
                                                b.type_payment, 
                                                b.description, 
                                                b.nominal 
                                            FROM 
                                                transactions a 
                                                JOIN payments b ON a.code_payment = b.code_payment 
                                            WHERE 
                                                a.code_student = '$_COOKIE[code_student]' 
                                                AND a.status_bill = 1";
                            $billing = ExecuteSelect($connect, $queryBill);
                            $noBilling = 1;
                            $billings = [];
                            foreach ($billing as $bill) {
                                $billings[$bill['type_payment']][] = $bill;
                            }
                            ?>
                            <?php foreach ($billings as $type => $bills) : ?>
                                <tr>
                                    <td colspan="5"><b><?= strtoupper($type) ?></b></td>
                                </tr>
                                <?php foreach ($bills as $b) : ?>
                                    <?php
                                    $declareMonth = ExtractCodeBillEachMountAndYear($b['code_bill']);
                                    ?>
                                    <tr>
                                        <td><?= $noBilling++ ?></td>
                                        <td><?= $b['description'] ?></td>
                                        <td><?= FormatRupiah($b['nominal']) ?></td>
                                        <td><?= $declareMonth[0] ?></td>
                                        <td>
                                            <?php if ($b['status_bill'] == 0) : ?>
                                                <span class="badge bg-danger">Belum Lunas</span>
                                            <?php else : ?>
                                                <span class="badge bg-success">Lunas</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>