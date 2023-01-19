<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
    $tanggal = $_POST['tanggal'];
    $toilet_id = $_POST['toilet_id'];
    $users_id = $_POST['users_id'];
    $kloset = $_POST['kloset'];
    $wastafel = $_POST['wastafel'];
    $lantai = $_POST['lantai'];
    $dinding = $_POST['dinding'];
    $kaca = $_POST['kaca'];
    $bau = $_POST['bau'];
    $sabun = $_POST['sabun'];

    $sql = 'INSERT INTO checklist (tanggal, toilet_id, kloset, wastafel, lantai, dinding, kaca, bau, sabun) ';
    $sql .= "VALUE ('{$tanggal}', '{$toilet_id}', '{$users_id}', '{$kloset}', '{$wastafel}', '{$lantai}', '{$dinding}', '{$kaca}', '{$bau}', '{$sabun}')";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Tambah Data Toilet</title>
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
                <form method="post" action="tambah.php"
                enctype="multipart/form-data">
                <div class="input">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input class="form-control" type="date" name="tanggal" data-date-format="DD/MMM/YYYY" placeholder="dd/mm/yyyy">
                </div><br>
                <div class="input">
                    <label for="toilet_id" class="form-label">ID Toilet</label>
                    <input type="text" class="form-control" name="toilet_id" id="toilet_id">
                </div>
                <div class="input">
                    <label for="toilet_id" class="form-label">ID Petugas</label>
                    <input type="text" class="form-control" name="users_id" id="users_id">
                </div>
                <div class="input">
                    <select class="form-select form-select mb-3" name="kloset" aria-label=".form-select-lg example">
                        <option selected>Kondisi Kloset</option>
                        <option value="1">Bersih</option>
                        <option value="2">Kotor</option>
                        <option value="3">Rusak</option>
                    </select>
                </div>
                <div class="input">
                    <select class="form-select form-select mb-3" name="wastafel" aria-label=".form-select-lg example">
                        <option selected>Kondisi Wastafel</option>
                        <option value="1">Bersih</option>
                        <option value="2">Kotor</option>
                        <option value="3">Rusak</option>
                    </select>
                </div>
                <div class="input">
                <select class="form-select form-select mb-3" name="lantai" aria-label=".form-select-lg example">
                    <option selected>Kondisi Lantai</option>
                    <option value="1">Bersih</option>
                    <option value="2">Kotor</option>
                    <option value="3">Rusak</option>
                </select>
            </div>
            <div class="input">
                <select class="form-select form-select mb-3" name="dinding" aria-label=".form-select-lg example">
                    <option selected>Kondisi Dinding</option>
                    <option value="1">Bersih</option>
                    <option value="2">Kotor</option>
                    <option value="3">Rusak</option>
                </select>
            </div>
            <div class="input">
                <select class="form-select form-select mb-3" name="kaca" aria-label=".form-select-lg example">
                    <option selected>Kondisi Kaca</option>
                    <option value="1">Bersih</option>
                    <option value="2">Kotor</option>
                    <option value="3">Rusak</option>
                </select>
            </div>
            <div class="input">
                <select class="form-select form-select mb-3" name="bau" aria-label=".form-select-lg example">
                    <option selected>Kondisi Bau</option>
                    <option value="1">Ya</option>
                    <option value="2">Tidak</option>
                </select>
            </div>
            <div class="input">
                <select class="form-select form-select mb-3" name="sabun" aria-label=".form-select-lg example">
                    <option selected>Kondisi Sabun</option>
                    <option value="1">Ada</option>
                    <option value="2">Habis</option>
                    <option value="3">Hilang</option>
                </select>
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="Simpan" />
            </div>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; 2023, Teknik Informatika, Universitas Pelita Bangsa</p>
    </footer>

</body>
</html>