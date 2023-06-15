<?php
include '../../functions/function.php';

$connect = Connection();

$data = explode('#', $_POST['data']);
?>
<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <form id="form-create-student">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Daftar Tagihan Kelas <?= $data[1] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <form id="form-create-dependent-class">
                        <div class="col mb-0">
                            <label for="bill_name" class="form-label">Tagihan</label>
                            <select name="bill_name" id="bill_name" class="form-control"></select>
                        </div>
                        <div class="col mb-0 mt-5">
                            <div class="input-group">
                                <span class="input-group-text">First and last name</span>
                                <input type="text" aria-label="First name" class="form-control" />
                                <input type="text" aria-label="Last name" class="form-control" />
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" id="button-cancel-modal-student">
                    Keluar
                </button>
            </div>
        </form>
    </div>
</div>