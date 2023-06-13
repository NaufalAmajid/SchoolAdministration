<?php
include '../../functions/function.php';

$connect = Connection();

// select last code_year from table teaching_year
$sql = "SELECT code_year FROM teaching_year ORDER BY code_year DESC LIMIT 1";
$result = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($result);
if ($data) {
    $code_year = $data['code_year'];
} else {
    $code_year = 'TY00';
}

// delete character TY from code_year
$code_year = substr($code_year, 2);
$new_code_year = $code_year + 1;
if (strlen($new_code_year) == 1) {
    $new_code_year = '0' . $new_code_year;
}

// data to insert
$data = [
    'code_year'     => 'TY' . $new_code_year,
    'description'   => $_POST['description'],
    'created_by'    => 'Admin',
];

// save data to table teaching_year
$insert = Insert($connect, 'teaching_year', $data);

if ($insert) {
    echo 'success';
} else {
    echo 'error ' . mysqli_error($connect);
}
