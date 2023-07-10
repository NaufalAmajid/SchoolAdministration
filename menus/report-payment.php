<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Laporan </h5>
                        <p class="mb-4">
                            Berikut laporan pembayaran yang telah dilakukan oleh siswa.
                            berdasarkan <span class="text-success">tanggal pembayaran</span>
                        </p>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="libraries/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <form id="form-search-reporting">
                            <div class="row g-3">
                                <div class="col mb-0">
                                    <label for="first_date" class="form-label">Tanggal Pembayaran</label>
                                    <input type="date" name="first_date" id="first_date" class="form-control" value="<?= date('Y-m-d') ?>">
                                </div>
                                <div class="col mb-0">
                                    <label for="second_date" class="form-label">&nbsp;</label>
                                    <input type="date" name="second_date" id="second_date" class="form-control" value="<?= date('Y-m-d') ?>">
                                </div>
                                <div class="col mb-0 my-5">
                                    <button class="btn btn-info btn-sm" type="button" onclick="ViewReport()">Tampilkan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <a class="btn btn-success text-white" download="laporan.xls" onclick="return ExcellentExport.excel(this, 'table-report-payment', 'Laporan');"> <i class="bx bx-file"></i> Simpan ke Excel</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table-report-payment">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Murid</th>
                                        <th>Kelas</th>
                                        <th>Pembayaran</th>
                                        <th>Nominal</th>
                                    </tr>
                                </thead>
                                <tbody id="content-report">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="functions/js/report-payment.js"></script>