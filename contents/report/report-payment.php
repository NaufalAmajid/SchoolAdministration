<?php
include '../../functions/function.php';

$connect = Connection();

$query = "SELECT
            a.payment_date,
            b.name_student,
            b.nisn_student,
            d.description,
            d.nominal,
            d.type_payment,
            CONCAT(c.name_class,'-',c.type_class) AS classroom
            FROM
            transactions a
            JOIN students b ON a.code_student = b.code_student
            JOIN classrooms c ON a.code_class = c.code_class
            JOIN payments d ON a.code_payment = d.code_payment 
            WHERE
            a.status_bill = 1 
            AND CAST(a.payment_date AS DATE) BETWEEN CAST('$_POST[first_date]' AS DATE) 
	        AND CAST('$_POST[second_date]' AS DATE)";
$sql = mysqli_query($connect, $query);
$row = [];
$no = 1;
$totalNominal = 0;
while ($data = mysqli_fetch_array($sql)) {
    $row[] = $data;
}
?>


<?php foreach ($row as $value) : ?>
    <?php $totalNominal += $value['nominal'] ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $value['nisn_student'] ?></td>
        <td><?= $value['name_student'] ?></td>
        <td><?= $value['classroom'] ?></td>
        <td><?= $value['description'] ?></td>
        <td><?= FormatRupiah($value['nominal']) ?></td>
    </tr>
<?php endforeach ?>
<tr>
    <td colspan="5" class="text-right"><b>Total Pembayaran</b></td>
    <td><b><?= FormatRupiah($totalNominal) ?></b></td>
</tr>