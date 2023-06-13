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
