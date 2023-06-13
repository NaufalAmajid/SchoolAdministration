function ListTeachingYear() {
    $.ajax({
        url: "contents/teaching-year/list-teaching-year.php",
        type: "POST",
        success: function (data) {
            $("#list-teaching-year").html(data);
        }
    });
}

function CreateTeachingYear() {
    var description = $('#teaching-year').val();
    if (description == '') {
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Please enter description',
            timer: 1000,
            showConfirmButton: false,
        });
    } else {
        $.ajax({
            url: "contents/teaching-year/create-teaching-year.php",
            type: "POST",
            data: {
                description: description
            },
            success: function (data) {
                if (data == 'success') {
                    ListTeachingYear();
                    $('#teaching-year').val('');
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

function EditTeachingYear(id, description) {
    $('#teaching-year').val(description);
    $('#teaching-year').focus();
    $('#button-teaching-year').attr('onclick', `UpdateTeachingYear(${id})`);
    $('#button-teaching-year').html('Update');
    $('#button-teaching-year').removeClass('btn-outline-primary');
    $('#button-teaching-year').addClass('btn-outline-info');
}

function UpdateTeachingYear(id) {
    var description = $('#teaching-year').val();
    if (description == '') {
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Please enter description',
            timer: 1000,
            showConfirmButton: false,
        });
    } else {
        $.ajax({
            url: "contents/teaching-year/update-teaching-year.php",
            type: "POST",
            data: {
                id: id,
                description: description
            },
            success: function (data) {
                if (data == 'success') {
                    ListTeachingYear();
                    $('#teaching-year').val('');
                    $('#button-teaching-year').attr('onclick', 'CreateTeachingYear()');
                    $('#button-teaching-year').html('Simpan');
                    $('#button-teaching-year').removeClass('btn-outline-info');
                    $('#button-teaching-year').addClass('btn-outline-primary');
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

function DeleteTeachingYear(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You will delete this teaching year!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#007bff',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "contents/teaching-year/delete-teaching-year.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function (data) {
                    if (data == 'success') {
                        ListTeachingYear();
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