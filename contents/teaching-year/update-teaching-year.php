<?php
include '../../functions/function.php';

$connect = Connection();

$data = [
    'description'   => $_POST['description'],
    'created_by'    => 'Admin',
];

$category = [
    'id'    => $_POST['id']
];

$update = Update($connect, 'teaching_year', $data, $category);

if ($update) {
    echo 'success';
} else {
    echo 'error ' . mysqli_error($connect);
}
