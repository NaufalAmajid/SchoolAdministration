<?php
$biodata = "SELECT 
            CONCAT(b.name_class, '-', b.type_class) AS class, 
            c.description AS ty,
            CASE WHEN a.gender_student = 1 THEN 'Laki-laki' ELSE 'Perempuan' END AS gender,  
            a.* 
            FROM 
            students a 
            JOIN classrooms b ON a.code_class = b.code_class 
            JOIN teaching_year c ON a.code_year = c.code_year 
            WHERE 
            a.code_student = '$_COOKIE[code_student]'";
$biodata = mysqli_fetch_assoc(mysqli_query($connect, $biodata));
?>
<div class="col-md-6 col-12 mb-md-0 mb-4">
    <div class="card">
        <h5 class="card-header">Biodata Siswa</h5>
        <div class="card-body">
            <p>Informasi mengenai biodata anda, jika ada yang kurang atau ada kekeliruan hubungi admin.</p>
            <!-- BIODATA -->
            <div class="d-flex mb-3">
                <div class="flex-shrink-0">
                    <img src="../libraries/assets/img/icons/brands/nisn.png" alt="nisn" class="me-3" height="30" />
                </div>
                <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">NISN</h6>
                        <small class="text-muted"><?= $biodata['nisn_student'] ?></small>
                    </div>
                </div>
            </div>
            <div class="d-flex mb-3">
                <div class="flex-shrink-0">
                    <img src="../libraries/assets/img/icons/brands/name.png" alt="name" class="me-3" height="30" />
                </div>
                <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Nama Lengkap</h6>
                        <small class="text-muted"><?= $biodata['name_student'] ?> (<?= $biodata['gender'] ?>)</small>
                    </div>
                </div>
            </div>
            <div class="d-flex mb-3">
                <div class="flex-shrink-0">
                    <img src="../libraries/assets/img/icons/brands/telephone.png" alt="telephone" class="me-3" height="30" />
                </div>
                <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Nomor Hp</h6>
                        <small class="text-muted"><?= $biodata['phone_student'] ?></small>
                    </div>
                </div>
            </div>
            <div class="d-flex mb-3">
                <div class="flex-shrink-0">
                    <img src="../libraries/assets/img/icons/brands/birth_day.png" alt="birth_day" class="me-3" height="30" />
                </div>
                <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Tanggal Lahir</h6>
                        <small class="text-muted"><?= $biodata['date_birth_student'] ?></small>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img src="../libraries/assets/img/icons/brands/address.png" alt="address" class="me-3" height="30" />
                </div>
                <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                        <h6 class="mb-0">Alamat</h6>
                        <small class="text-muted"><?= $biodata['address_student'] ?></small>
                    </div>
                </div>
            </div>
            <!-- /BIODATA -->
        </div>
    </div>
</div>
<div class="col-md-6 col-12">
    <div class="card">
        <h5 class="card-header">Info Kelas</h5>
        <div class="card-body">
            <!--CLASSROOM INFORMATIOIN -->
            <div class="d-flex mb-3">
                <div class="flex-shrink-0">
                    <img src="../libraries/assets/img/icons/brands/classroom.png" alt="classroom" class="me-3" height="30" />
                </div>
                <div class="flex-grow-1 row">
                    <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                        <h6 class="mb-0">Kelas</h6>
                        <small class="text-muted"><?= $biodata['class'] ?></small>
                    </div>
                </div>
            </div>
            <div class="d-flex mb-3">
                <div class="flex-shrink-0">
                    <img src="../libraries/assets/img/icons/brands/teaching_year.png" alt="teaching_year" class="me-3" height="30" />
                </div>
                <div class="flex-grow-1 row">
                    <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                        <h6 class="mb-0">Tahun Ajaran</h6>
                        <small class="text-muted"><?= $biodata['ty'] ?></small>
                    </div>
                </div>
            </div>
            <!-- CLASSROOM INFORMATIOIN -->
        </div>
    </div>
</div>