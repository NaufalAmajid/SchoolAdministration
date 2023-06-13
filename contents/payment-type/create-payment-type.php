<?php
include '../../functions/function.php';

$connect = Connection();

// select last code_payment from table payments
$sql = "SELECT code_payment FROM payments ORDER BY code_payment DESC LIMIT 1";
$result = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($result);
if ($data) {
    $code_payment = $data['code_payment'];
} else {
    $code_payment = 'PY00';
}

// delete character PY from code_payment
$code_payment = substr($code_payment, 2);
$new_code_payment = $code_payment + 1;
if (strlen($new_code_payment) == 1) {
    $new_code_payment = '0' . $new_code_payment;
}

// data to insert
$data = [
    'code_payment'     => 'PY' . $new_code_payment,
    'type_payment'     => $_POST['type_payment'],
    'description'      => $_POST['description'],
    'nominal'          => (int) str_replace('.', '', $_POST['nominal']),
    'created_by'       => $_COOKIE['code_user'],
];

// save data to table payments
$insert = Insert($connect, 'payments', $data);

if ($insert) {
    echo 'success';
} else {
    echo 'error ' . mysqli_error($connect);
}
