<?php
include '../../functions/function.php';

$connect = Connection();

$data = explode('#', $_POST['data']);
?>
<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel4">Daftar Tagihan Kelas <?= $data[1] ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="form-create-dependent-class">
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
                            <input type="month" id="start_month" name="start_month" class="form-control" />
                            <input type="month" id="end_month" name="end_month" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-3">
                        <button type="button" class="btn btn-success btn-sm" onclick="CreateDependent()"><i class="bx bx-share"></i> Tambahkan</button>
                    </div>
                </div>
            </form>
            <div class="row mt-5"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" id="button-cancel-modal-student">
                Keluar
            </button>
        </div>
    </div>
</div>