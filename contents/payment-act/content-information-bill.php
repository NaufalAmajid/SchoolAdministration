<?php
include '../../functions/function.php';

$connect = Connection();
$setting = Setting($connect);
$query = "SELECT
            a.id,
            d.code_student,
            d.name_student,
            d.parent_student,
            d.phone_student,
            d.nisn_student,
            CONCAT( c.name_class, '-', c.type_class ) AS classroom,
            b.description AS name_bill,
            b.nominal,
            e.description AS ty,
            SUBSTRING_INDEX( a.code_bill, '_',- 1 ) AS month,
            SUBSTR( SUBSTRING_INDEX( a.code_bill, '|',- 1 ), 1, 4 ) AS year,
            a.status_bill 
            FROM
            transactions a
            JOIN payments b ON a.code_payment = b.code_payment
            JOIN classrooms c ON a.code_class = c.code_class
            JOIN students d ON a.code_student = d.code_student
            JOIN teaching_year e ON d.code_year = e.code_year 
            WHERE
            a.id = '$_POST[id]'";
$sql = mysqli_query($connect, $query);
$exec = mysqli_fetch_assoc($sql);
?>
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form id="form-create-student">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Informasi Tagihan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <textarea name="message_info" id="message_info" class="form-control" cols="30" rows="10">
                        <?php 
                            $changeNameStudent = str_replace('(name_student)', $exec['name_student'], $setting['message_dependent']);
                            $changeNISNtudent = str_replace('(nisn_student)', $exec['nisn_student'], $changeNameStudent);
                            $changeNameParent = str_replace('(parent_student)', $exec['parent_student'], $changeNISNtudent);
                            $changeClass = str_replace('(name_class)', $exec['classroom'], $changeNameParent);
                            $changeTeachingYear = str_replace('(teaching_year)', $exec['ty'], $changeClass);
                            $changeNameSchool = str_replace('(name_school)', $setting['name_school'], $changeTeachingYear);
                            // content
                            $billing = strtoupper($exec['name_bill']) .' '. DescriptionMonthIndo($exec['month']) .'-'. $exec['year'];
                            $nominal = 'Rp. '. FormatRupiah($exec['nominal']) . ',-';
                            $inWord  = ucwords(InWord($exec['nominal']));
                            $content = str_replace('(content)', 'Tagihan : '.$billing.'\nSebesar: '.$nominal.'\nTerbilang: ' . $inWord, $changeNameSchool);
                            $content = str_replace('\n', chr(10), $content);
                            echo $content;
                        ?> 
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" id="button-cancel-modal-student">
                    Batal
                </button>
                <button type="button" class="btn btn-success" onclick="SendWhatsapp('<?= $exec['phone_student'] ?>')"><i class="bx bx-mail-send"></i> Kirim WhatsApp</button>
            </div>
        </form>
    </div>
</div>