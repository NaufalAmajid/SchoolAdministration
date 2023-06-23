<?php
include '../../functions/function.php';

$connect = Connection();

$deleteBilling = "DELETE FROM billing WHERE id = '$_POST[id]'";
$deleted = mysqli_query($connect, $deleteBilling);

if ($deleted) {
    echo json_encode([
        'status' => 'success',
        'message' => 'Data berhasil dihapus!'
    ]);
} else {
    echo json_encode([
        'status' => 'danger',
        'message' => 'Data gagal dihapus!'
    ]);
}
