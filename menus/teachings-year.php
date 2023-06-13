<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <h5 class="card-header text-primary">Data Tahun Ajaran</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 mx-5">
                    <div class="input-group">
                        <input type="text" id="teaching-year" class="form-control" placeholder="tambah tahun ajaran ..." autofocus/>
                        <button class="btn btn-outline-primary" type="button" id="button-teaching-year" onclick="CreateTeachingYear()">Simpan</button>
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
                                        <th>Pembuat</th>
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