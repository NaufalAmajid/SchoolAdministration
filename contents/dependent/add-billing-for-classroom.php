<?php
include '../../functions/function.php';

$connect = Connection();

if(!isset($_COOKIE['code_user'])) {
    echo json_encode([
        'status' => 'danger',
        'message' => 'Session expired! Please login again.',
    ]);
    exit;
}

// create code from start month and end month
$generateStartMonth = explode('-', $_POST['start_month']);
$generateEndMonth = explode('-', $_POST['end_month']);
$generateStartEndMonth = $generateStartMonth[0] . $generateStartMonth[1] . '|' . $generateEndMonth[0] . $generateEndMonth[1];

// create code from code class and code payment
$generateCodeClassPayment = $_POST['post_code_class'] . $_POST['bill_name'];

// create end of code_bill from start month and end month
$startMonth = (int) $generateStartMonth[1];
$endMonth = (int) $generateEndMonth[1];

// create code_bill
$codeBill = $generateCodeClassPayment . '-' . $generateStartEndMonth;

// get students from class
$getStudents = Select($connect, 'students', ['code_class' => $_POST['post_code_class'], 'isactive' => 1]);

// insert data to table billing and transactions
$dataInsertBilling = [
    'code_bill' => $codeBill,
    'code_class' => $_POST['post_code_class'],
    'code_payment' => $_POST['bill_name'],
    'created_by' => $_COOKIE['code_user']
];
$dataInsertTransactions = [];

// notifications
$success = 0;
$failed = 0;

// insert $dataInsertBilling to table billing
$insertToBilling = Insert($connect, 'billing', $dataInsertBilling);

// insert data to table transactions
if ($insertToBilling) {

    foreach ($getStudents as $student) {
        for ($i = $startMonth; $i <= $endMonth; $i++) {
            if ($i < 10) {
                $i = '0' . $i;
            }
            $dataInsertTransactions[] = [
                'code_bill'  => $codeBill . '_' . $i,
                'code_payment' => $_POST['bill_name'],
                'code_class' => $_POST['post_code_class'],
                'code_student' => $student['code_student'],
            ];
        }
    }

    foreach ($dataInsertTransactions as $data) {
        $insertToTransactions = Insert($connect, 'transactions', $data);
        if ($insertToTransactions) {
            $success++;
        } else {
            $failed++;
        }
    }
} else {
    $failed += 1000;
}

if ($success > 0 && $failed == 0) {
    echo json_encode([
        'status' => 'success',
        'message' => 'Berhasil menambahkan tagihan untuk kelas ' . $_POST['post_name_class'] . '!',
    ]);
} else {
    echo json_encode([
        'status' => 'danger',
        'message' => 'Gagal menambahkan tagihan untuk kelas ' . $_POST['post_name_class'] . '!',
    ]);
}
