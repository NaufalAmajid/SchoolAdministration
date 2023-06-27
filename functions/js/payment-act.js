function SearchTransactions() {
    $('#table-list-transactions').DataTable().destroy();
    var form = $('#form-search-transactions').serializeArray();
    var send = {}
    $(form).each(function (i, field) {
        send[field.name] = field.value;
    });
    send['status'] = '0';
    $('#table-list-transactions').DataTable({
        "ajax": {
            "url": "contents/payment-act/search-transactions.php",
            "type": "POST",
            "data": function (d) {
                d.bill_name = send.bill_name;
                d.code_class = send.code_class;
                d.name_student = send.name_student;
                d.status = send.status;
            }
        },
        "columns": [{
            "data": "name"
        },
        {
            "data": "nisn"
        },
        {
            "data": "class"
        },
        {
            "data": "bill"
        },
        {
            "data": "status_bill"
        },
        {
            "data": "button"
        },
        ]
    });
}

function SearchHistoryTransactions() {
    $('#table-history-transactions').DataTable().destroy();
    var form = $('#form-search-history-transactions').serializeArray();
    var send = {}
    $(form).each(function (i, field) {
        send[field.name] = field.value;
    });
    send['status'] = '1';
    $('#table-history-transactions').DataTable({
        "ajax": {
            "url": "contents/payment-act/search-transactions.php",
            "type": "POST",
            "data": function (d) {
                d.bill_name = send.bill_name;
                d.code_class = send.code_class;
                d.name_student = send.name_student;
                d.status = send.status;
            }
        },
        "columns": [{
            "data": "name"
        },
        {
            "data": "nisn"
        },
        {
            "data": "class"
        },
        {
            "data": "bill"
        },
        {
            "data": "status_bill"
        },
        {
            "data": "button"
        },
        ]
    });
}

function InformationBilling($id) {
    $.ajax({
        url: "contents/payment-act/content-information-bill.php",
        type: "POST",
        data: { id: $id },
        success: function (data) {
            $('#modal-payment-act').html(data);
            $('#modal-payment-act').modal('show');
        }
    })
}

function PaymentBilling(id) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Lakukan Pembayaran Untuk Tagihan Ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Lanjutkan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "contents/payment-act/payment-billing.php",
                type: "POST",
                data: { id: id },
                success: function (data) {
                    var response = JSON.parse(data);
                    AlertGlobal(response.status, 'Notif', response.message);
                    window.open('printing/print_kwitansi.php?id=' + id, 'Pembayaran', 'width=800,height=600');
                    $('#button-create-dependent').click();
                }
            })
        }
    })
}

function PrintBilling(id) {
    window.open('printing/print_kwitansi.php?id=' + id, 'Pembayaran', 'width=800,height=600');
}