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
            <label for="code_class" class="form-label">Kelas</label>
            <select name="code_class" id="code_class" class="form-control">
                <option value=""> Pilih Kelas </option>
                <?php
                $classroom = ExecuteSelect($connect, "SELECT * FROM classrooms WHERE isactive = '1' ORDER BY name_class, type_class ASC");
                $rowClassroom = [];
                foreach ($classroom as $class) {
                    $rowClassroom[$class['name_class']][] = $class;
                }
                ?>
                <?php foreach ($rowClassroom as $name => $type) : ?>
                    <optgroup label="<?= $name ?>">
                        <?php foreach ($type as $val) : ?>
                            <option value="<?= $val['code_class'] ?>"><?= $val['name_class'] . '-' . $val['type_class'] ?></option>
                        <?php endforeach; ?>
                    </optgroup>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col mb-0">
            <label for="name_student" class="form-label">NISN / Nama Siswa</label>
            <input type="text" name="name_student" class="form-control" placeholder="Masukkan NISN / Nama Siswa ...">
        </div>
        <div class="col mb-0 my-5">
            <button type="button" class="btn btn-info btn-sm align-items-end" id="button-create-dependent" onclick="SearchTransactions()"><i class="bx bx-search"></i> Cari</button>
        </div>
    </div>
</form>
<div class="row mt-4 mx-2 mb-4">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="table-list-transactions">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">🙍🏻‍♂️ Nama Siswa</th>
                        <th class="text-nowrap text-center">📟 NISN</th>
                        <th class="text-nowrap text-center">📝 Kelas</th>
                        <th class="text-nowrap text-center">📠 Tagihan</th>
                        <th class="text-nowrap text-center">📇 Status</th>
                        <th class="text-nowrap text-center">action</th>
                    </tr>
                </thead>
                <tbody id="list-transactions"></tbody>
            </table>
        </div>
    </div>
</div>