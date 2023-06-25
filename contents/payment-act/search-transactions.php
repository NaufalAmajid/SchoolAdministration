<?php
include '../../functions/function.php';

$connect = Connection();

$sql = "SELECT
        a.id,
        d.name_student, 
        d.nisn_student, 
        CONCAT(c.name_class, '-', c.type_class) AS classroom, 
        b.description, 
        b.nominal, 
        SUBSTRING_INDEX(a.code_bill, '_',-1) AS month,
        SUBSTR(SUBSTRING_INDEX(a.code_bill, '|',-1), 1,4) AS year,
        a.status_bill
        FROM 
        transactions a 
        JOIN payments b ON a.code_payment = b.code_payment 
        JOIN classrooms c ON a.code_class = c.code_class 
        JOIN students d ON a.code_student = d.code_student 
        WHERE 
        a.code_payment LIKE '%$_POST[bill_name]%' 
        AND a.code_class LIKE '%$_POST[code_class]%' 
        AND (
        d.name_student LIKE '%$_POST[name_student]%' 
        OR d.nisn_student LIKE '%$_POST[name_student]%'
        )";
$exec = ExecuteSelect($connect, $sql);

$data = [];

// content
$button = '<div class="btn-group" role="group" aria-label="First group">
            <button type="button" class="btn btn-outline-success">
            <i class="tf-icons bx bx-credit-card"></i>
            </button>
            <button type="button" class="btn btn-outline-info">
            <i class="tf-icons bx bx-info-circle"></i>
            </button>
            <button type="button" class="btn btn-outline-danger">
            <i class="tf-icons bx bx-trash"></i>
            </button>
        </div>';
$status = function($status) {
    if ($status == 0) {
        return '<span class="badge bg-danger">Belum Bayar</span>';
    } elseif ($status == 1) {
        return '<span class="badge bg-warning">Menunggu Konfirmasi</span>';
    } elseif ($status == 2) {
        return '<span class="badge bg-success">Lunas</span>';
    } else {
        return '<span class="badge bg-secondary">Tidak Diketahui</span>';
    }
};

foreach ($exec as $value) {
    $data[] = [
        "id" => $value['id'],
        "name" => $value['name_student'],
        "nisn" => $value['nisn_student'],
        "class" => $value['classroom'],
        "bill"  => $value['description'],
        "status_bill" => $status($value['status_bill']),
        "button" => $button
    ];
}

echo json_encode(['data' => $data]);
// echo json_encode($_POST);