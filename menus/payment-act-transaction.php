<!-- TRANSACTIONS -->
<h5 class="card-header">Transaksi</h5>
<div class="card-body">
    <span>Silahkan Cari Data Berdasarkan Form Dibawah ini.</span>
    <br>
    <span class="notificationRequest"><strong>Jangan lupa untuk mencetak nota</strong></span>
</div>
<form id="form-search-transactions">
    <div class="row g-3 mx-3">
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
        <div class="col mb-0 my-5">
            <button type="button" class="btn btn-info btn-sm align-items-end" id="button-create-dependent" onclick="CreateDependent()"><i class="bx bx-search"></i> Cari</button>
        </div>
    </div>
</form>
<div class="row mt-4 mx-2 mb-4">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-nowrap">Type</th>
                        <th class="text-nowrap text-center">✉️ Email</th>
                        <th class="text-nowrap text-center">🖥 Browser</th>
                        <th class="text-nowrap text-center">👩🏻‍💻 App</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<!-- /TRANSACTIONS -->