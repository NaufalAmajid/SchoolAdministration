function SearchTransactions() {
    $('#table-list-transactions').DataTable().destroy();
    var form = $('#form-search-transactions').serializeArray();
    var send = {}
    $(form).each(function (i, field) {
        send[field.name] = field.value;
    });
    $('#table-list-transactions').DataTable({
        "ajax": {
            "url": "contents/payment-act/search-transactions.php",
            "type": "POST",
            "data": function (d) {
                d.bill_name = send.bill_name;
                d.code_class = send.code_class;
                d.name_student = send.name_student;
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
    // $.ajax({
    //     url: "contents/payment-act/search-transactions.php",
    //     type: "POST",
    //     data: send,
    //     success: function (data) {
    //         console.log(data);
    //     }
    // })
}