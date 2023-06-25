<?php
include '../../functions/function.php';

$connect = Connection();

$codeStudent = $_COOKIE['code_student'];
$passOld = md5($_POST['password_old']);
$passNew = md5($_POST['password_new']);
$passNewConfirm = md5($_POST['password_new_confirm']);

// check confirm password
if ($passNew != $passNewConfirm) {
    echo json_encode(['status' => 'warning', 'title' => 'Gagal', 'message' => 'Konfirmasi password tidak sesuai']);
    exit;
}

// check password old
$checkPassword = Select($connect, 'students', ['code_student' => $codeStudent, 'password' => $passOld]);
if (!$checkPassword) {
    echo json_encode(['status' => 'danger', 'title' => 'Gagal', 'message' => 'Password lama tidak sesuai']);
    exit;
}

// update password
$update = "UPDATE students SET password='$passNew' WHERE code_student='$codeStudent'";
$result = mysqli_query($connect, $update);
if ($result) {
    echo json_encode(['status' => 'success', 'title' => 'Berhasil', 'message' => 'Password berhasil diubah']);
} else {
    echo json_encode(['status' => 'danger', 'title' => 'Gagal', 'message' => 'Password gagal diubah']);
}

mysqli_close($connect);
