<?php
include '../../functions/function.php';

$connect = Connection();
$select  = Select($connect, 'teaching_year', ['isactive' => '1']);
$num     = 1;
?>


<?php foreach ($select as $val) : ?>
    <tr>
        <td><?= $num++ ?></td>
        <td><?= $val['description'] ?></td>
        <td><?= $val['created_by'] ?></td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);" onclick="EditTeachingYear('<?= $val['id'] ?>', '<?= $val['description'] ?>')"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="javascript:void(0);" onclick="DeleteTeachingYear('<?= $val['id'] ?>')"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
            </div>
        </td>
    </tr>
<?php endforeach; ?>