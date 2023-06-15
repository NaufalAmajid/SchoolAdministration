<?php
include '../../functions/function.php';

$connect = Connection();
?>
<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <form id="form-create-student">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Form Tambah Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3 mb-4">
                    <div class="col mb-0">
                        <label for="nisn_student" class="form-label">NISN</label>
                        <input type="text" id="nisn_student" name="nisn_student" class="form-control" placeholder="masukkan nisn..." autocomplete="off" />
                    </div>
                    <div class="col mb-0">
                        <label for="name_student" class="form-label">Nama Siswa</label>
                        <input type="text" id="name_student" name="name_student" class="form-control" placeholder="masukkan nama lengkap..." autocomplete="off" />
                    </div>
                    <div class="col mb-0">
                        <small class="text-light fw-semibold">Jenis Kelamin</small>
                        <div class="row g-2 mt-2">
                            <div class="col mb-0 form-check">
                                <input name="gender_student" class="form-check-input" type="radio" value="1" id="men" checked />
                                <label class="form-check-label" for="men">Laki - laki</label>
                            </div>
                            <div class="col mb-0 form-check" style="margin-left: -130px;">
                                <input name="gender_student" class="form-check-input" type="radio" value="2" id="women" />
                                <label class="form-check-label" for="women">Perempuan</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-2">
                    <div class="col mb-0">
                        <label for="date_birth_student" class="form-label">Tanggal Lahir Siswa</label>
                        <input type="date" id="date_birth_student" name="date_birth_student" class="form-control" autocomplete="off" />
                    </div>
                    <div class="col mb-0">
                        <label for="parent_student" class="form-label">Nama Orang Tua</label>
                        <input type="text" id="parent_student" name="parent_student" class="form-control" placeholder="nama orang tua..." autocomplete="off" />
                    </div>
                    <div class="col mb-0">
                        <label for="phone_student" class="form-label">Telephone Orang Tua</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-phone-student">+62</span>
                            <input type="text" id="phone_student" name="phone_student" class="form-control" placeholder="telephone orang tua..." autocomplete="off" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text">
                            <i>*format pengisian: 8123456789</i>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-4">
                    <div class="col mb-0">
                        <label for="code_class" class="form-label">Kelas</label>
                        <select name="code_class" id="code_class" class="form-control">
                            <option value="">-- Pilih Kelas --</option>
                            <?php
                            $classroom = ExecuteSelect($connect, "SELECT * FROM classrooms WHERE isactive = '1' ORDER BY name_class ASC");
                            $rowClassroom = [];
                            foreach ($classroom as $class) {
                                $rowClassroom[$class['name_class']][] = $class;
                            }
                            ?>
                            <?php foreach ($rowClassroom as $name => $type) : ?>
                                <optgroup label="<?= $name ?>">
                                    <?php foreach ($type as $val) : ?>
                                        <option value="<?= $val['code_class'] ?>"><?= $val['name_class'] . '-' . $val['type_class'] ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col mb-0">
                        <label for="code_year" class="form-label">Tahun Ajaran</label>
                        <select name="code_year" id="code_year" class="form-control">
                            <option value="">-- Pilih Tahun Ajaran --</option>
                            <?php
                            $teachingyear = ExecuteSelect($connect, "SELECT * FROM teaching_year WHERE isactive = '1' ORDER BY description ASC");
                            ?>
                            <?php foreach ($teachingyear as $year) : ?>
                                <option value="<?= $year['code_year'] ?>"><?= $year['description'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col mb-0">
                        <label for="address_student" class="form-label">Alamat</label>
                        <textarea name="address_student" id="address_student" class="form-control" placeholder="masukkan alamat..." autocomplete="off"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" id="button-cancel-modal-student">
                    Batal
                </button>
                <button type="button" class="btn btn-primary" onclick="CreateStudent()"><i class="bx bx-share"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#phone_student').on('keypress', function(e) {
            //only number and max length 12
            var charCode = (e.which) ? e.which : e.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57) || $(this).val().length > 10) return false;
        });
    })
</script>