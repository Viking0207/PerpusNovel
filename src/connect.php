<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_perpusnovel";

$conect = mysqli_connect($host, $user, $pass, $db);
if (!$conect) {
    die("Tidak bisa terkoneksi ke database");
}
?>