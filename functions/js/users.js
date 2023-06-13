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


function NonActiveUser(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to non active this user?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, non active it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "contents/users/non-active-users.php",
                type: "POST",
                data: { id: id },
                success: function (data) {
                    if (data == 'success') {
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
    });
}