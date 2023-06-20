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
