<?php

error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $stat = $_POST['stat'];
    $rol = $_POST['rol'];

    $sql = 'INSERT INTO users ( username, pass, nama, email, stat, rol)';
    $sql .= "VALUE ('$username', '$pass', '$nama', '$email', '$stat', '$rol')";
    $result = mysqli_query($conn, $sql);
    header('location: login.php');
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
        <h2>Tambah Akun</h2><br><br>
        <div class="main">
            <form method="post" action="tambah_login.php" enctype="multipart/form-data">    
                <div class="input">
                    <label for="toilet_id" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="">
                </div>
                <div class="input">
                    <label for="toilet_id" class="form-label">Password</label>
                    <input type="password" class="form-control" name="pass" id="pass" value="">
                </div>
                <div class="input">
                    <label for="toilet_id" class="form-label">Nama</label>
                    <input type="password" class="form-control" name="nama" id="nama" value="">
                </div>
                <div class="input">
                    <label for="toilet_id" class="form-label">Email</label>
                    <input type="password" class="form-control" name="email" id="email" value="">
                </div>
                <div class="input">
                <select class="form-select form-select mb-3" name="stat" aria-label=".form-select-lg example">
                    <option selected>Pilih Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Nonaktif">Non Aktif</option>
                </select>
                <div class="input">
                <select class="form-select form-select mb-3" name="rol" aria-label=".form-select-lg example">
                    <option selected>Pilih Role</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
                </div>
                <div class="submit">
                <input type="submit" name="submit" value="Simpan" />
            </div>
            </form>
        </div>
    </div>
</body>
</html>