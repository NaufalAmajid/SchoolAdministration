function ViewReport() {
    var form = $('#form-search-reporting').serializeArray();
    $('#table-report-payment').DataTable().destroy();
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
            $('#table-report-payment').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: 'Laporan Pembayaran',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Laporan Pembayaran',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'print',
                    title: 'Laporan Pembayaran',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                }
                ]
            });
        }
    })
}