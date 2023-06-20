<?php
include '../../functions/function.php';

$connect = Connection();

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

$dataInsert = [];
$success = 0;
$failed = 0;
for ($i = $startMonth; $i <= $endMonth; $i++) {

    if (strlen($i) == 1) {
        $i = '0' . $i;
    }
    $dataInsert[] = [
        'code_bill'     => $codeBill . '_' . $i,
        'code_class'    => $_POST['post_code_class'],
        'code_payment'  => $_POST['bill_name'],
        'created_by'     => $_COOKIE['code_user'],
    ];

}

foreach ($dataInsert as $val) {
    $insert = Insert($connect, 'billing', $val);
    if ($insert) {
        $success++;
    } else {
        $failed++;
    }
}

echo json_encode([
    'success'   => $success,
    'failed'    => $failed,
]);