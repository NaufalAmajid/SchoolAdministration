<?php
include '../../functions/function.php';

$connect = Connection();

// compress data
$post = [];
foreach ($_POST['data'] as $key => $value) {
    $post[$key] = $value;
}

// data to update
$category = ['id' => $_POST['id']];
$data     = [
    'type_payment'     => $post['type_payment'],
    'description'      => $post['description'],
    'nominal'          => (int) str_replace('.', '', $post['nominal']),
    'created_by'       => $_COOKIE['code_user'],
];

$update = Update($connect, 'payments', $data, $category);

if ($update) {
    echo 'success';
} else {
    echo 'error ' . mysqli_error($connect);
}
