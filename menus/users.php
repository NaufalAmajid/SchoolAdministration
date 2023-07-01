<!-- FORM USERS -->
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-12">
                <div class="collapse" id="collapseUsers">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h5 class="card-header" id="title-form">Create New User</h5>
                                <div class="card-body">
                                    <form id="formUser">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="fullname" class="form-label">Name</label>
                                                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="enter fullname user..." autofocus required />
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" id="username" name="username" class="form-control" placeholder="enter username for login..." required />
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-4">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" id="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="repassword" class="form-label">Confirm Password</label>
                                                <input type="password" id="repassword" name="repassword" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="roleuser" class="form-label">Role</label>
                                                <select name="roleuser" id="roleuser" class="form-control" required>
                                                    <option value="">-- Select Role --</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="kepsek">Kepala Sekolah</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-12">
                                                <button type="button" onclick="CreateUsers()" class="btn btn-info">Save</button>
                                                <button type="reset" class="btn btn-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- TABLE USERS -->
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Data User / Admin 👩🏻‍💻👨🏻‍💻</h5>
                        <p class="mb-4">
                            Menu Manajemen User / Admin.
                        </p>
                        <?php if ($_COOKIE['role'] == 'admin') : ?>
                            <div class="col mb-0">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers"><span class="tf-icons bx bx-user-plus"></span>&nbsp; Tambah User</button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="libraries/assets/img/illustrations/users.png" height="160" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
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
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0" id="list-users">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="functions/js/users.js"></script>
<script>
    $(document).ready(function() {
        ListUsers();
    });
</script>