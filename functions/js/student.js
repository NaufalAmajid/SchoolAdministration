function CreateStudent() {
    var form = $('#form-create-student').serializeArray();
    var data = {};
    var msg = '';

    $(form).each(function (index, obj) {
        if (obj.value == '') {
            msg += obj.name + ' is required <br>';
        } else {
            data[obj.name] = obj.value;
        }
    });

    if (msg != '') {
        AlertGlobal('danger', 'Peringatan Form Tambah Siswa', msg);
        return false;
    }

    $.ajax({
        url: 'contents/student/create-new-student.php',
        type: 'POST',
        data: data,
        success: function (response) {
            if (response == 'success') {
                AlertGlobal('success', 'Sukses', 'Berhasil menambahkan data siswa');
                setTimeout(() => {
                    location.reload();
                }, 2000)
            } else {
                AlertGlobal('danger', 'Peringatan', response);
            }
        }
    })
}

function NonActiveStudent(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You will delete this student!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#007bff',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'contents/student/non-active-student.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function (response) {
                    if (response == 'success') {
                        AlertGlobal('success', 'Sukses', 'Berhasil menonaktifkan siswa');
                        setTimeout(() => {
                            location.reload();
                        }, 2000)
                    } else {
                        AlertGlobal('danger', 'Peringatan', response);
                    }
                }
            })
        }
    });
}

function EditStudent(id) {
    OpenModal('contents/student/form-edit-student.php', 'modal-create-student', { id: id });
}

function UpdateStudent(id) {
    var form = $('#form-edit-student').serializeArray();
    var data = {};
    var msg = '';

    $(form).each(function (index, obj) {
        if (obj.value == '') {
            msg += obj.name + ' is required <br>';
        } else {
            data[obj.name] = obj.value;
        }
    });

    if (msg != '') {
        AlertGlobal('danger', 'Peringatan Form Tambah Siswa', msg);
        return false;
    }

    data['id'] = id;

    $.ajax({
        url: 'contents/student/update-student.php',
        type: 'POST',
        data: data,
        success: function (response) {
            if (response == 'success') {
                AlertGlobal('info', 'Sukses', 'Berhasil update data siswa');
                setTimeout(() => {
                    location.reload();
                }, 2000)
            } else {
                AlertGlobal('danger', 'Peringatan', response);
            }
        }
    })
}

function GenerateFaker() {
    var count = $('#input-faker-student').val();
    if (count == '' || count == 0) {
        AlertGlobal('danger', 'Peringatan', 'Jumlah data tidak boleh kosong atau 0');
        return false;
    }
    $.ajax({
        url: 'faker/faker.php',
        type: 'POST',
        data: {
            count: count,
            fakeStudent: true
        },
        beforeSend: function () {
            Swal.fire({
                title: 'Loading',
                html: 'Please wait...',
                allowOutsideClick: false,
                showCancelButton: false,
                showConfirmButton: false,
                timerProgressBar: true,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            })
        },
        success: function (response) {
            Swal.close();
            AlertGlobal('success', 'Sukses', `Berhasil menambahkan  ${response} data siswa`);
            setTimeout(() => {
                location.reload();
            }, 1500)
        }
    })
}