<?php

session_start();
$title ='Login';
include_once 'koneksi.php';

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE username = '{$username}' AND pass = '{$pass}'";

    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_affected_rows($conn) !=0){
        $_SESSION['login'] = true;
        $_SESSION['username'] = mysqli_fetch_array($result);

        header('location: index.php?page=1');
    }else
    $errorMsg = "<p style=\"color:red;\">Gagal Login,
    Silakan Ulangi!</p>";
}

if (isset($errorMsg)) echo $errorMsg;
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
        <h1 class="tekslogin">Login</h1><br>
        <form method="post">
            <div class="input">
                <label>Username</label>
                <input type="text" name="username" />
            </div>
            <div class="input">
                <label>Password</label>
            <input type="password" name="pass" />
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="Login" />
            </div>
            <div>
            <a href="tambah_login.php" style="color: #000000;">Buat Akun</a>
            </div><br><br>
        </form>
        <footer>
            <p>&copy; 2023, Teknik Informatika, Universitas Pelita Bangsa</p>
        </footer>
</body>
</html>