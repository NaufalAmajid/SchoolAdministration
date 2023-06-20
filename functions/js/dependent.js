function CreateDependent() {
    var form = $('#form-create-dependent-class').serializeArray();
    var bill_name = $('#bill_name').find(':selected').text();
    var data = {};
    var msg = '';

    $(form).each((i, field) => {
        if (field.value == '') {
            msg += field.name + ' is required <br>';
        }else{
            data[field.name] = field.value;
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
            console.log(json);
        }
    })
}