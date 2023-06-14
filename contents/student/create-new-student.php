<?php
include '../../functions/function.php';

$connect = Connection();

$data = $_POST;
$data['password'] = md5('12345');
$data['created_by']       = $_COOKIE['code_user'];

$check = Select($connect, 'students', ['nisn_student' => $data['nisn_student']]);
if (count($check) > 0) {
    echo 'NISN sudah terdaftar';
} else {
    $insert = Insert($connect, 'students', $data);
    if ($insert) {
        echo 'success';
    } else {
        echo 'error ' . mysqli_error($connect);
    }
}
