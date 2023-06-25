<?php
include '../../functions/function.php';

$connect = Connection();

$data = explode('#', $_POST['data']);
?>
<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel4">Daftar Tagihan Kelas <?= $data[1] ?></h5>
            <button type="button" class="btn-close" id="btn-close-dependent" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="form-create-dependent-class">
                <input type="hidden" name="post_code_class" value="<?= $data[0] ?>">
                <input type="hidden" name="post_name_class" value="<?= $data[1] ?>">
                <div class="row g-3">
                    <div class="col mb-0">
                        <label for="bill_name" class="form-label">Tagihan</label>
                        <select name="bill_name" id="bill_name" class="form-control">
                            <option value="">Pilih Tagihan</option>
                            <?php
                            $dependentSelect = Select($connect, 'payments', ['isactive' => 1]);
                            $typePayment = [];
                            foreach ($dependentSelect as $val) {
                                $typePayment[$val['type_payment']][] = $val;
                            }
                            foreach ($typePayment as $key => $val) :
                            ?>
                                <optgroup label="<?= strtoupper($key) ?>" class="text-info">
                                    <?php foreach ($val as $v) : ?>
                                        <option value="<?= $v['code_payment'] ?>" class="text-dark"><?= strtoupper($v['description']) ?> - <?= number_format($v['nominal'], 0, ',', '.') ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col mb-0">
                        <label for="dependenting" class="form-label">Ditagihkan Untuk Bulan</label>
                        <div class="input-group">
                            <input type="month" id="start_month" value="<?= date('Y-m') ?>" name="start_month" class="form-control" />
                            <span class="input-group-text">Sampai</span>
                            <input type="month" id="end_month" value="<?= date('Y-m') ?>" name="end_month" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-3">
                        <button type="button" class="btn btn-success btn-sm align-items-end" id="button-create-dependent" onclick="CreateDependent()"><i class="bx bx-share"></i> Tambahkan</button>
                    </div>
                </div>
            </form>
            <div class="row mt-3 px-4">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <td>No.</td>
                                <td>Tagihan</td>
                                <td>Nominal</td>
                                <td>Bulan</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $querySelectBill = "SELECT 
                                                    a.code_bill, 
                                                    a.id,
                                                    a.code_class, 
                                                    a.code_payment, 
                                                    b.description, 
                                                    b.nominal 
                                                FROM 
                                                    billing a 
                                                    JOIN payments b ON a.code_payment = b.code_payment 
                                                    JOIN classrooms c ON a.code_class = c.code_class 
                                                    JOIN users d ON a.created_by = d.code_users 
                                                WHERE 
                                                    a.code_class = '$data[0]' 
                                                ORDER BY 
                                                    a.code_bill ASC";
                            $exSelectBill = ExecuteSelect($connect, $querySelectBill);
                            $no = 1;
                            ?>
                            <?php foreach ($exSelectBill as $bill) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $bill['description'] ?></td>
                                    <td><?= FormatRupiah($bill['nominal']) ?></td>
                                    <td><?= ExtractCodeBill($bill['code_bill']) ?></td>
                                    <td align="center">
                                        <button type="button" class="btn rounded-pill btn-icon btn-outline-danger" onclick="DeleteDependent('<?= $bill['id'] ?>', '<?= $bill['code_class'] ?>')">
                                            <span class="tf-icons bx bx-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" id="button-cancel-modal-student">
                Keluar
            </button>
        </div>
    </div>
</div>