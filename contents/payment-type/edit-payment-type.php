<?php
include '../../functions/function.php';

$connect = Connection();

// data to update
$query = "SELECT * FROM payments WHERE id = '$_POST[id]'";
$execute = mysqli_query($connect, $query);
$select = mysqli_fetch_array($execute);
?>

<div class="row">
    <div class="col-lg-4">
        <label for="description" class="form-label">Nama Pembayaran</label>
        <input type="text" id="description" name="description" class="form-control" value="<?= $select['description'] ?>" placeholder="nama pembayaran..." autofocus required />
    </div>
    <div class="col-lg-3">
        <label for="type_payment" class="form-label">Tipe Payment</label>
        <select name="type_payment" id="type_payment" class="form-control">
            <option value="">- Pilih Tipe Pembayaran -</option>
            <option value="wajib" <?= $select['type_payment'] == 'wajib' ? 'selected' : '' ?>>Wajib</option>
            <option value="optional" <?= $select['type_payment'] == 'optional' ? 'selected' : '' ?>>Optional</option>
        </select>
    </div>
    <div class="col-lg-2">
        <label for="nominal" class="form-label">Nominal</label>
        <input type="text" id="nominal" name="nominal" value="<?= FormatRupiah($select['nominal']) ?>" class="form-control" placeholder="nominal..." required />
    </div>
    <div class="col-lg-3">
        <label for="button-save" class="form-label"></label>
        <div class="my-3">
            <button type="button" onclick="UpdatePaymentType('<?= $select['id'] ?>')" class="btn btn-primary btn-sm"><span class="tf-icons bx bx-edit"></span> Update</button>
            <button type="button" onclick="location.reload()" class="btn btn-warning btn-sm"><span class="tf-icons bx bx-rotate-left"></span> Batal</button>
        </div>
    </div>
</div>