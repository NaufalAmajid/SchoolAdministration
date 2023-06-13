<?php
include '../../functions/function.php';

$connect = Connection();

$category = ['id' => $_POST['id']];
$data     = ['isactive' => 0, 'created_by' => 'Admin'];
$delete   = Update($connect, 'classrooms', $data, $category);

if ($delete) {
    echo 'success';
} else {
    echo 'error ' . mysqli_error($connect);
}
