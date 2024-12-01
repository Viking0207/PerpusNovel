<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_perpusnovel";

$connect = mysqli_connect($host, $user, $pass, $db);
if (!$connect) {
    die("Tidak bisa terkoneksi ke database");
}
?>