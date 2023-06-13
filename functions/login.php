<?php
include 'function.php';

$connect = Connection();

$username = $_POST['username'];
$password = md5($_POST['password']);

$login = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($connect, $login);
$row = mysqli_fetch_assoc($result);

if ($row) {
    setcookie('code_user', $row['code_users'], time() + 3600, '/');
    setcookie('username', $row['username'], time() + 3600, '/');
    setcookie('name', $row['fullname'], time() + 3600, '/');
    setcookie('role', $row['role'], time() + 3600, '/');
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'failed', 'message' => 'Username atau password salah']);
}
