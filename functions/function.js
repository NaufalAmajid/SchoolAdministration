function FormatRupiah(nominal) {
    var number_string = nominal.toString().replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return rupiah;
}

function OpenModal(link, place, data = null) {
    $.ajax({
        url: link,
        type: 'POST',
        data: data,
        success: function (response) {
            $(`#${place}`).html(response);
            $(`#${place}`).modal('show');
        }
    });
}