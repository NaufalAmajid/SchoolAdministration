function ViewReport() {
    var form = $('#form-search-reporting').serializeArray();
    var data = {};
    $(form).each((index, item) => {
        data[item.name] = item.value;
    })
    $.ajax({
        url: 'contents/report/report-payment.php',
        type: 'POST',
        data: data,
        success: function (response) {
            $('#content-report').html(response);
        }
    })
}