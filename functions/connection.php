<?php

$host       = 'localhost';
$dbname     = 'db_spp';
$username   = 'root';
$password   = '';

$connect = mysqli_connect($host, $username, $password, $dbname);

if (!$connect) {
    die('Connection Failed: ' . mysqli_connect_error());
}
