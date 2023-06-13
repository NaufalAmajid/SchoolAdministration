function ListClassroom() {
    $.ajax({
        url: "contents/classroom/list-classroom.php",
        type: "POST",
        success: function (data) {
            $("#list-classroom").html(data);
        }
    });
}

function CreateClassroom() {
    var classroom = $('#classroom').val();
    if (classroom == '') {
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Please enter classroom',
            timer: 1000,
            showConfirmButton: false,
        });
    } else {
        $.ajax({
            url: "contents/classroom/create-classroom.php",
            type: "POST",
            data: {
                classroom: classroom
            },
            success: function (data) {
                if (data == 'success') {
                    ListClassroom();
                    $('#classroom').val('');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data,
                        timer: 2000,
                        showConfirmButton: false,
                    });
                }
            }
        });
    }
}

function EditClassroom(id, description) {
    $('#classroom').val(description);
    $('#classroom').focus();
    $('#button-classroom').attr('onclick', `UpdateClassroom(${id})`);
    $('#button-classroom').html('Update');
    $('#button-classroom').removeClass('btn-outline-primary');
    $('#button-classroom').addClass('btn-outline-info');
}

function UpdateClassroom(id) {
    var classroom = $('#classroom').val();
    if (classroom == '') {
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Please enter classroom',
            timer: 1000,
            showConfirmButton: false,
        });
    } else {
        $.ajax({
            url: "contents/classroom/update-classroom.php",
            type: "POST",
            data: {
                id: id,
                classroom: classroom
            },
            success: function (data) {
                if (data == 'success') {
                    ListClassroom();
                    $('#classroom').val('');
                    $('#button-classroom').attr('onclick', 'CreateClassroom()');
                    $('#button-classroom').html('Simpan');
                    $('#button-classroom').removeClass('btn-outline-info');
                    $('#button-classroom').addClass('btn-outline-primary');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data,
                        timer: 1500,
                        showConfirmButton: false,
                    });
                }
            }
        });
    }
}

function DeleteClassroom(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You will delete this classroom!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#007bff',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "contents/classroom/delete-classroom.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function (data) {
                    if (data == 'success') {
                        ListClassroom();
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            timer: 1500,
                            showConfirmButton: false,
                            allowOutsideClick: false,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data,
                            timer: 1500,
                            showConfirmButton: false,
                        });
                    }
                }
            });
        }
    })
}