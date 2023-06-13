<?php
include '../../functions/function.php';

$connect = Connection();

$category = ['id' => $_POST['id']];
$data     = ['isactive' => 0, 'created_by' => $_COOKIE['code_user']];
$delete   = Update($connect, 'payments', $data, $category);

if ($delete) {
    echo 'success';
} else {
    echo 'error ' . mysqli_error($connect);
}
