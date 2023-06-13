function ListUsers() {
    $.ajax({
        url: "contents/users/list-users.php",
        type: "POST",
        success: function (data) {
            $('#list-users').html(data);
        }
    });
}

function CreateUsers() {
    var form = $('#formUser').serializeArray();
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
            showConfirmButton: false,
            allowOutsideClick: false
        });

        return false;
    }

    if (data.password != data.repassword) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: 'Password and Confirm Password not match',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false
        });

        return false;
    }

    $.ajax({
        url: "contents/users/create-users.php",
        type: "POST",
        data: data,
        success: function (data) {
            if (data == 'success') {
                $('#formUser')[0].reset();
                $('#collapseUsers').removeClass('show');
                ListUsers();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: data,
                    timer: 2000,
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            }
        }
    });
}