<?php
include '../../functions/function.php';

$connect = Connection();
$query  = "SELECT a.*, b.fullname FROM payments a JOIN users b ON a.created_by = b.code_users WHERE a.isactive = '1'";
$select = ExecuteSelect($connect, $query);
$num     = 1;
?>

<?php foreach ($select as $val) : ?>
    <tr>
        <td><?= $num++ ?></td>
        <td><?= $val['description'] ?></td>
        <td><?= strtoupper($val['type_payment']) ?></td>
        <td><?= FormatRupiah($val['nominal']) ?></td>
        <td><?= $val['code_payment'] ?></td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);" onclick="EditPaymentType('<?= $val['id'] ?>')"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="javascript:void(0);" onclick="DeletePaymentType('<?= $val['id'] ?>')"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
            </div>
        </td>
    </tr>
<?php endforeach; ?>