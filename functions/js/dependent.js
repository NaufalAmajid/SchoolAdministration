function CreateDependent() {
    var form = $('#form-create-dependent-class').serializeArray();
    var sender = {};
    var msg = '';

    $(form).each((i, field) => {
        if (field.value == '') {
            msg += field.name + ' is required <br>';
        } else {
            sender[field.name] = field.value;
        }
    });

    if (msg != '') {
        AlertGlobal('danger', 'Peringatan Form Tambah Dependent', msg);
        return false;
    }

    $.ajax({
        url: "contents/dependent/add-billing-for-classroom.php",
        type: "POST",
        data: form,
        beforeSend: function () {
            $('#button-create-dependent').html('Please wait...');
            $('#button-create-dependent').attr('disabled', true);
        },
        success: function (data) {
            $('#button-create-dependent').html('Tambahkan');
            $('#button-create-dependent').attr('disabled', false);
            $('#form-create-dependent-class')[0].reset();
            var json = JSON.parse(data);
            AlertGlobal(json.status, 'notifikasi', json.message);
            $(`#btn-cart-${sender.post_code_class}`).click();
        }
    })
}

function DeleteDependent(id, codeClass) {
    $('#modal-dependent').modal('hide');
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus data!',
        cancelButtonText: 'Tidak, batalkan!',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "contents/dependent/delete-billing-for-classroom.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function (data) {
                    var json = JSON.parse(data);
                    AlertGlobal(json.status, 'notifikasi', json.message);
                    $(`#btn-cart-${codeClass}`).click();
                }
            })
        } else {
            $('#modal-dependent').modal('show');
        }
    })
}