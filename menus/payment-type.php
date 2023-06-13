<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <h5 class="card-header text-primary">Data Jenis Pembayaran</h5>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-11 mx-5">
                    <form id="form-payment-type">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="description" class="form-label">Nama Pembayaran</label>
                                <input type="text" id="description" name="description" class="form-control" placeholder="nama pembayaran..." autofocus required />
                            </div>
                            <div class="col-lg-3">
                                <label for="type_payment" class="form-label">Tipe Payment</label>
                                <select name="type_payment" id="type_payment" class="form-control">
                                    <option value="">- Pilih Tipe Pembayaran -</option>
                                    <option value="wajib">Wajib</option>
                                    <option value="optional">Optional</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label for="nominal" class="form-label">Nominal</label>
                                <input type="text" id="nominal" name="nominal" class="form-control" placeholder="nominal..." required />
                            </div>
                            <div class="col-lg-2">
                                <label for="button-save" class="form-label"></label>
                                <div class="my-1">
                                    <button type="button" onclick="AddPaymentType()" class="btn btn-info"><span class="tf-icons bx bx-save"></span> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                        <th>Tipe Pembayaran</th>
                                        <th>Nominal</th>
                                        <th>Pembuat</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0" id="list-payment-type">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="functions/js/payment-type.js"></script>
<script>
    $(document).ready(function() {
        $('#nominal').on('keyup', function() {
            // format rupiah
            $(this).val(FormatRupiah($(this).val()));
        });
        ListPaymentType();
    });
</script>