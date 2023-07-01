<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Data Tahun Ajaran 👩🏻‍💻👨🏻‍💻</h5>
                        <p class="mb-4">
                            Menu management Tahun Ajaran.
                        </p>
                        <?php if ($_COOKIE['role'] == 'admin') : ?>
                            <div class="col-7 mb-0">
                                <div class="input-group">
                                    <input type="text" id="teaching-year" class="form-control form-control-sm" placeholder="tambah tahun ajaran ..." autofocus />
                                    <button class="btn btn-sm btn-outline-primary" type="button" id="button-teaching-year" onclick="CreateTeachingYear()">Simpan</button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="libraries/assets/img/illustrations/teaching_year.png" height="160" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
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
                                        <th>Deskripsi</th>
                                        <th>Kode</th>
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
<script src="functions/js/teaching-year.js"></script>
<script>
    $(document).ready(function() {
        ListTeachingYear();
    });
</script>