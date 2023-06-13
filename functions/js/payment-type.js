function ListPaymentType() {
    $.ajax({
        url: "contents/payment-type/list-payment-type.php",
        type: "POST",
        success: function (data) {
            $('#list-payment-type').html(data);
        }
    })
}

function AddPaymentType() {
    var form = $('#form-payment-type').serializeArray();
    var data = {};
    var msg = '';

    $(form).each(function (i, field) {
        if (field.value == '') {
            msg += field.name + ' is required <br>';
        } else {
            data[field.name] = field.value;
        }
    });

    if (msg != '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: msg,
            timer: 2000,
            showConfirmButton: false
        });

        return false;
    } else {

        $.ajax({
            url: "contents/payment-type/create-payment-type.php",
            type: "POST",
            data: data,
            success: function (data) {
                if (data == 'success') {
                    ListPaymentType();
                    $('#form-payment-type')[0].reset();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: data,
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            }
        })

    }
}

function EditPaymentType(id) {
    $.ajax({
        url: "contents/payment-type/edit-payment-type.php",
        type: "POST",
        data: { id: id },
        beforeSend: function () {
            $('#form-payment-type')[0].reset();
            $('#form-payment-type').html('');
        },
        success: function (data) {
            $('#form-payment-type').html(data);
            $('#nominal').on('keyup', function () {
                $(this).val(FormatRupiah($(this).val()));
            });
        }
    })
}

function UpdatePaymentType(id) {
    var form = $('#form-payment-type').serializeArray();
    var data = {};
    var msg = '';

    $(form).each(function (i, field) {
        if (field.value == '') {
            msg += field.name + ' is required <br>';
        } else {
            data[field.name] = field.value;
        }
    });

    if (msg != '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: msg,
            timer: 2000,
            showConfirmButton: false
        });

        return false;
    } else {

        $.ajax({
            url: "contents/payment-type/update-payment-type.php",
            type: "POST",
            data: { id: id, data: data },
            success: function (data) {
                if (data == 'success') {
                    location.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: data,
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            }
        })

    }
}

function DeletePaymentType(id) {
    $.ajax({
        url: "contents/payment-type/delete-payment-type.php",
        type: "POST",
        data: { id: id },
        success: function (data) {
            if (data == 'success') {
                ListPaymentType();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: data,
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        }
    })
}