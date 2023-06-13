<?php
include '../../functions/function.php';

$connect = Connection();

// select last code_users from table users
$sql = "SELECT code_users FROM users ORDER BY code_users DESC LIMIT 1";
$result = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($result);
if ($data) {
    $code_users = $data['code_users'];
} else {
    $code_users = 'USR00';
}

// delete character USR from code_users
$code_users = substr($code_users, 3);
$new_code_users = $code_users + 1;
if (strlen($new_code_users) == 1) {
    $new_code_users = '0' . $new_code_users;
}

// data to insert
$data = [
    'code_users'     => 'USR' . $new_code_users,
    'fullname'       => $_POST['fullname'],
    'username'       => $_POST['username'],
    'password'       => md5($_POST['password']),
    'role'           => $_POST['roleuser'],
    'created_by'     => $_COOKIE['code_user'],
];

// save data to table users
$insert = Insert($connect, 'users', $data);

if ($insert) {
    echo 'success';
} else {
    echo 'error ' . mysqli_error($connect);
}
