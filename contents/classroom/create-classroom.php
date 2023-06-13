<?php
include '../../functions/function.php';

$connect = Connection();

// select last code_class from table classrooms
$sql = "SELECT code_class FROM classrooms ORDER BY code_class DESC LIMIT 1";
$result = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($result);
if ($data) {
    $code_class = $data['code_class'];
} else {
    $code_class = 'C00';
}

// delete character C from code_class
$code_class = substr($code_class, 1);
$new_code_class = $code_class + 1;
if (strlen($new_code_class) == 1) {
    $new_code_class = '0' . $new_code_class;
}

// data to insert
if (!preg_match('/-/i', $_POST['classroom'])) {
    echo 'error, you must use - to separate name and type class';
    exit;
}
$classroom = explode('-', $_POST['classroom']);
$name_class = $classroom[0];
$type_class = $classroom[1];
$data = [
    'code_class'     => 'C' . $new_code_class,
    'name_class'   => $name_class,
    'type_class'   => $type_class,
    'created_by'    => $_COOKIE['code_user'],
];

// save data to table clas
$insert = Insert($connect, 'classrooms', $data);

if ($insert) {
    echo 'success';
} else {
    echo 'error ' . mysqli_error($connect);
}
