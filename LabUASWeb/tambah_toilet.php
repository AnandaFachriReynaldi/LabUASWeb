<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
    $toilet_id = $_POST['toilet_id'];
    $keterangan = $_POST['keterangan'];

    $sql = 'INSERT INTO toilet (id, keterangan) ';
    $sql .= "VALUE ('{$toilet_id}', '{$keterangan}')";
    $result = mysqli_query($conn, $sql);
    header('location: laporan.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Toilet Checklist</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="container">
        <header>
            <h1>Sistem Checklist Toilet</h1>
        </header>
        <nav>
            <a href="index.php?page=1">Home</a>
            <a href="laporan.php">Laporan</a>
        </nav>
        <div class="container">
        <h2>Tambah Data Toilet</h2><br>
        <div class="main">
            <form method="post" action="tambah_toilet.php" enctype="multipart/form-data">
                <div class="input">
                    <label for="toilet_id" class="form-label">Toilet ID</label>
                    <input type="text" class="form-control" name="toilet_id" id="toilet_id" value="">
                </div>
                <div class="input">
                    <label>Keterangan</label>
                    <select class="form-select" aria-label="Default select example" name="keterangan">
                        <option value=""></option>
                        <option value="Sudah">Sudah</option>
                        <option value="Belum">Belum</option>
                    </select>
                </div> <br>
                <div class="submit">
                    <input type="submit" name="submit" value="Simpan" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>