<?php
include '../../functions/function.php';

$connect = Connection();

$paydate = date('Y-m-d H:i:s');

$updateStatus = "UPDATE transactions SET status_bill = '1', payment_date = '$paydate' WHERE id = '$_POST[id]'";
$updateStatus = mysqli_query($connect, $updateStatus);
if ($updateStatus) {
    echo json_encode([
        'status' => 'success',
        'message' => 'Berhasil melakukan pembayaran'
    ]);
} else {
    echo json_encode([
        'status' => 'warning',
        'message' => 'Gagal melakukan pembayaran'
    ]);
}
