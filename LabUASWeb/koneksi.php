<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_checklist";
$conn = mysqli_connect($host, $user, $pass, $db);

if ($conn == false)
{
    echo "Koneksi ke Server Gagal.";
    die();
} #else echo "Koneksi Berhasil";
?>