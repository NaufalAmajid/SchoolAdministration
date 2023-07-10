<?php
include '../../functions/function.php';

$connect = Connection();
$select  = Select($connect, 'users', ['isactive' => '1']);
$num     = 1;

?>

<?php foreach ($select as $val) : ?>
    <tr>
        <td><?= $num++ ?></td>
        <td><?= $val['fullname'] ?></td>
        <td><?= strtoupper($val['role']) ?></td>
        <td>
            <?php if ($_COOKIE['role'] == 'admin') : ?>
                <button type="button" class="btn rounded-pill btn-icon btn-outline-danger btn-sm" onclick="NonActiveUser('<?= $val['id'] ?>')">
                    <span class="tf-icons bx bx-user-x"></span>
                </button>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>