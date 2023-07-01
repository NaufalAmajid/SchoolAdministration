<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Data Ruang Kelas 👩🏻‍💻👨🏻‍💻</h5>
                        <p class="mb-4">
                            Perhatikan format untuk penambahan nama kelas.
                        </p>
                        <?php if ($_COOKIE['role'] == 'admin') : ?>
                            <div class="col-7 mb-0">
                                <div class="input-group">
                                    <input type="text" id="classroom" class="form-control form-control-sm" placeholder="tambah kelas ..." autofocus />
                                    <button class="btn btn-outline-primary btn-sm" type="button" id="button-classroom" onclick="CreateClassroom()">Simpan</button>
                                </div>
                                <div id="defaultFormControlHelp" class="form-text">
                                    <i>*format pengisian: kelas-kelompok (contoh: I-A)</i>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="libraries/assets/img/illustrations/classrooms.png" height="160" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
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
                                        <th>Kelas</th>
                                        <th>Kode</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0" id="list-classroom">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="functions/js/classroom.js"></script>
<script>
    $(document).ready(function() {
        ListClassroom();
    });
</script>