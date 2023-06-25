<?php
include '../../functions/function.php';

$connect = Connection();

$nisn = $_POST['nisn_student'];
$password = md5($_POST['password_student']);

$login = "SELECT * FROM students WHERE nisn_student='$nisn' AND password='$password'";
$result = mysqli_query($connect, $login);
$row = mysqli_fetch_assoc($result);

if ($row) {
    if ($row['isactive'] == 0) {
        echo json_encode(['status' => 'failed', 'message' => 'Akun dengan NISN ' . $row['nisn_student'] . ' atas nama ' . $row['name_student'] . ' anda tidak aktif']);
        exit;
    } else {
        setcookie('code_student', $row['code_student'], time() + 86400, '/');
        setcookie('nisn', $row['nisn_student'], time() + 86400, '/');
        setcookie('code_class', $row['code_class'], time() + 86400, '/');
        setcookie('name_student', $row['name_student'], time() + 86400, '/');
        setcookie('gender', $row['gender_student'], time() + 86400, '/');
        echo json_encode(['status' => 'success', 'message' => 'Berhasil login']);
    }
} else {
    echo json_encode(['status' => 'failed', 'message' => 'NISN atau password tidak valid']);
}

mysqli_close($connect);