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
        data: { data: data },
        success: function (response) {
            $(`#${place}`).html(response);
            $(`#${place}`).modal('show');
        }
    });
}


function AlertGlobal(bg, title, body, time = 2000) {
    $('#alert-global').removeClass('hide');
    $('#alert-global').addClass(`bg-${bg} show`);
    $('#alert-title-global').html(title);
    $('#alert-body-global').html(body);
    setTimeout(() => {
        $('#alert-global').addClass('hide');
        $('#alert-global').removeClass(`bg-${bg} show`);
    }, time);
}

function FormatMonthIndo(month){
    var monthIndo = [
        {month: 'Januari', number: '01'},
        {month: 'Februari', number: '02'},
        {month: 'Maret', number: '03'},
        {month: 'April', number: '04'},
        {month: 'Mei', number: '05'},
        {month: 'Juni', number: '06'},
        {month: 'Juli', number: '07'},
        {month: 'Agustus', number: '08'},
        {month: 'September', number: '09'},
        {month: 'Oktober', number: '10'},
        {month: 'November', number: '11'},
        {month: 'Desember', number: '12'},
    ]

    return monthIndo[month - 1].month;
}