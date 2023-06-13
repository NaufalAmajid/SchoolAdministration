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

                        <a href="javascript:;" class="btn btn-sm btn-outline-primary" onclick="OpenModal('contents/student/form-create-student.php', 'modal-create-student')"><span class="tf-icons bx bx-folder-plus"></span>&nbsp; Tambah Siswa</a>
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
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Tahun <br> Ajaran</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0" id="list-teaching-year">
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
        // ListTeachingYear();
    });
</script>