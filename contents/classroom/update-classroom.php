<?php
include '../../functions/function.php';

$connect = Connection();

if (!preg_match('/-/i', $_POST['classroom'])) {
    echo 'error, you must use - to separate name and type class';
    exit;
}
$classroom = explode('-', $_POST['classroom']);
$name_class = $classroom[0];
$type_class = $classroom[1];
$data = [
    'name_class'   => $name_class,
    'type_class'   => $type_class,
    'created_by'    => $_COOKIE['code_user'],
];

$category = [
    'id'    => $_POST['id']
];

$update = Update($connect, 'classrooms', $data, $category);

if ($update) {
    echo 'success';
} else {
    echo 'error ' . mysqli_error($connect);
}
