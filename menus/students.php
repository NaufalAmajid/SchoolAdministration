<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Data Siswa 👩🏻‍💻👨🏻‍💻</h5>
                        <p class="mb-4">
                            Pastikan mengisi data siswa dengan benar.
                        </p>
                        <?php if ($_COOKIE['role'] == 'admin') : ?>
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <a href="javascript:;" class="btn btn-sm btn-outline-primary" onclick="OpenModal('contents/student/form-create-student.php', 'modal-create-student')"><span class="tf-icons bx bx-folder-plus"></span>&nbsp; Tambah Siswa</a>
                                </div>
                                <div class="col mb-0">
                                    <div class="input-group" style="margin-left: -130px;">
                                        <input type="number" class="form-control form-control-sm" id="input-faker-student" placeholder="jumlah yang diiginkan ..." />
                                        <button class="btn btn-outline-primary btn-sm" type="button" id="button-addon2" onclick="GenerateFaker()"><i class="bx bx-ghost"></i> Fake Data</button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="libraries/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped display nowrap" id="table-students">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Tahun <br> Ajaran</th>
                                        <th>Kode</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0" id="list-student">
                                    <?php
                                    $connect = Connection();
                                    $query   = "SELECT 
                                                    a.*, 
                                                    b.description, 
                                                    c.name_class, 
                                                    c.type_class, 
                                                    d.fullname 
                                                FROM students a 
                                                JOIN teaching_year b ON a.code_year = b.code_year 
                                                JOIN classrooms c ON a.code_class = c.code_class 
                                                JOIN users d ON a.created_by = d.code_users 
                                                WHERE a.isactive = 1 ORDER BY c.name_class, c.type_class ASC";
                                    $student = ExecuteSelect($connect, $query);
                                    $no      = 1;
                                    ?>
                                    <?php foreach ($student as $s) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $s['nisn_student'] ?></td>
                                            <td><?= $s['name_student'] ?></td>
                                            <td><?= $s['name_class'] . '-' . $s['type_class'] ?></td>
                                            <td><?= $s['description'] ?></td>
                                            <td><?= $s['code_student'] ?></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-outline-info" onclick="EditStudent('<?= $s['id'] ?>')">
                                                        <i class="tf-icons bx bx-happy-alt"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-danger" onclick="NonActiveStudent('<?= $s['id'] ?>')">
                                                        <i class="tf-icons bx bx-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-create-student" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"></div>
<script src="functions/js/student.js"></script>
<script>
    $(document).ready(function() {
        $('#table-students').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>