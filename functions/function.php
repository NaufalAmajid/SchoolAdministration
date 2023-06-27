<?php
date_default_timezone_set('Asia/Jakarta');

function Connection()
{
    $host       = 'localhost';
    $dbname     = 'db_spp';
    $username   = 'root';
    $password   = '';

    $connect = mysqli_connect($host, $username, $password, $dbname);

    if (!$connect) {
        die('Connection Failed: ' . mysqli_connect_error());
    }

    return $connect;
}

function Select($connect, $tabel, $category)
{
    $sql = "SELECT * FROM $tabel WHERE ";
    foreach ($category as $field => $value) {
        $sql .= "" . $field . "='" . mysqli_real_escape_string($connect, $value) . "' AND ";
    }
    $sql = rtrim($sql, ' AND ');
    $result = mysqli_query($connect, $sql);
    $row = [];
    while ($data = mysqli_fetch_array($result)) {
        $row[] = $data;
    }
    return $row;
}

function Insert($connect, $tabel, array $data)
{
    $sql = "INSERT INTO " . $tabel . " SET ";
    foreach ($data as $field => $value) {
        $sql .= "" . $field . "='" . mysqli_real_escape_string($connect, $value) . "',";
    }
    $sql = rtrim($sql, ',');
    $result = mysqli_query($connect, $sql);
    return $result;
}

function Update($connect, $tabel, $data, $category)
{
    $sql = "UPDATE $tabel SET ";
    foreach ($data as $field => $value) {
        $sql .= "" . $field . "='" . mysqli_real_escape_string($connect, $value) . "', ";
    }
    $sql = rtrim($sql, ', ');
    $sql .= " WHERE ";
    foreach ($category as $field => $value) {
        $sql .= "" . $field . "='" . mysqli_real_escape_string($connect, $value) . "' AND ";
    }
    $sql = rtrim($sql, ' AND ');
    $result = mysqli_query($connect, $sql);
    return $result;
}

function ExecuteSelect($connect, $sql)
{
    $result = mysqli_query($connect, $sql);
    $row = [];
    while ($data = mysqli_fetch_array($result)) {
        $row[] = $data;
    }
    return $row;
}

function FormatRupiah($nominal)
{
    $rupiah = number_format($nominal, 0, ',', '.');
    return $rupiah;
}

function DescriptionMonthIndo($month)
{
    $monthIndo = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ];
    return $monthIndo[$month];
}

function CompressForm($data = [])
{
    $send = [];
    foreach ($data as $key => $value) {
        $send[$value['name']] = $value['value'];
    }
    return $send;
}

function ExtractCodeBill($codeBill)
{
    $cutCodeBill = substr($codeBill, strpos($codeBill, '-') + 1);
    $cutCodeBill = explode('|', $cutCodeBill);
    $monthStart = substr($cutCodeBill[0], 4);
    $monthEnd = substr($cutCodeBill[1], 4);
    $yearStart = substr($cutCodeBill[0], 0, 4);
    $yearEnd = substr($cutCodeBill[1], 0, 4);
    if ($yearStart == $yearEnd) {
        if ($monthStart == $monthEnd) {
            $declareMonth = DescriptionMonthIndo($monthStart) . ' ' . $yearStart;
        } else {
            $declareMonth = DescriptionMonthIndo($monthStart) . ' - ' . DescriptionMonthIndo($monthEnd) . ' ' . $yearEnd;
        }
    } else {
        $declareMonth = DescriptionMonthIndo($monthStart) . ' ' . $yearStart . ' - ' . DescriptionMonthIndo($monthEnd) . ' ' . $yearEnd;
    }
    return $declareMonth;
}

function ExtractCodeBillEachMountAndYear($codeBill)
{
    $cutCodeBill = substr($codeBill, strpos($codeBill, '-') + 1);
    $cutCodeBill = explode('|', $cutCodeBill);
    $year  = substr($cutCodeBill[0], 0, 4);
    $month = explode('_', $cutCodeBill[1]);
    $output = DescriptionMonthIndo($month[1]) . ' ' . $year;
    $output2 = $year . '-' . $month[1];
    return [$output, $output2];
}

function Setting($connect)
{
    $sql = "SELECT * FROM settings";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function Denominator($price)
{
    $price = abs($price);
    $angka = array(
        "",
        "Satu",
        "Dua",
        "Tiga",
        "Empat",
        "Lima",
        "Enam",
        "Tujuh",
        "Delapan",
        "Sembilan",
        "Sepuluh",
        "Sebelas"
    );
    $temp = "";

    if ($price < 12) {
        $temp = "" . $angka[$price];
    } elseif ($price < 20) {
        $temp = Denominator($price - 10) . " Belas ";
    } elseif ($price < 100) {
        $temp = Denominator($price / 10) . " Puluh " . Denominator($price % 10);
    } elseif ($price < 200) {
        $temp = " Seratus " . Denominator($price - 100);
    } elseif ($price < 1000) {
        $temp = Denominator($price / 100) . " Ratus " . Denominator($price % 100);
    } elseif ($price < 2000) {
        $temp = " Seribu " . Denominator($price - 1000);
    } elseif ($price < 1000000) {
        $temp = Denominator($price / 1000) . " Ribu " . Denominator($price % 1000);
    } elseif ($price < 1000000000) {
        $temp = Denominator($price / 1000000) . " Juta " . Denominator($price % 1000000);
    } elseif ($price < 1000000000000) {
        $temp = Denominator($price / 1000000000) . " Milyar " . Denominator(fmod($price, 1000000000));
    } elseif ($price < 1000000000000000) {
        $temp = Denominator($price / 1000000000000) . " Trilyun " . Denominator(fmod($price, 1000000000000));
    }

    return $temp;
}

function InWord($price)
{
    $price = $price == -0 ? 0 : $price;

    if ($price < 0) {
        $result = " Minus " . trim(Denominator($price));
    } else if ($price == 0) {
        $result = " Nol Rupiah ";
    } else {
        $result = trim(Denominator($price)) . " Rupiah ";
    }
    return $result;
}
