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
                        <input type="text" id="nisn_student" name="nisn_student" class="form-control" placeholder="masukkan nisn..." autocomplete="off" autofocus/>
                    </div>
                    <div class="col mb-0">
                        <label for="name_student" class="form-label">Nama Siswa</label>
                        <input type="text" id="name_student" name="name_student" class="form-control" placeholder="masukkan nama lengkap..." autocomplete="off" />
                    </div>
                    <div class="col mb-0">
                        <small class="text-light fw-semibold">Jenis Kelamin</small>
                        <div class="row g-2 mt-2">
                            <div class="col mb-0 form-check">
                                <input name="gender_student" class="form-check-input" type="radio" value="2" id="men" checked />
                                <label class="form-check-label" for="men">Laki - laki</label>
                            </div>
                            <div class="col mb-0 form-check" style="margin-left: -130px;">
                                <input name="gender_student" class="form-check-input" type="radio" value="2" id="women" />
                                <label class="form-check-label" for="women">Perempuan</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-4">
                    <div class="col mb-0">
                        <label for="date_birth_student" class="form-label">Tanggal Lahir Siswa</label>
                        <input type="date" id="date_birth_student" name="date_birth_student" class="form-control" placeholder="<?= date('d/m/Y') ?>" autocomplete="off" />
                    </div>
                    <div class="col mb-0">
                        <label for="parent_student" class="form-label">Nama Orang Tua</label>
                        <input type="text" id="parent_student" name="parent_student" class="form-control" placeholder="nama orang tua..." autocomplete="off" />
                    </div>
                    <div class="col mb-0">
                        <label for="phone_student" class="form-label">Telephone Orang Tua</label>
                        <input type="text" id="phone_student" name="phone_student" class="form-control" placeholder="telephone orang tua..." autocomplete="off" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>