<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
    $id = $_POST['id'];
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
    
    $sql = "UPDATE checklist SET tanggal = '$tanggal', toilet_id = '$toilet_id', users_id = '$users_id', kloset = '$kloset', 
    wastafel = '$wastafel', lantai = '$lantai', dinding = '$dinding', kaca = '$kaca', 
    bau = '$bau', sabun = '$sabun'";
    $sql .= "WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);

    header('location: index.php');
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM checklist WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);
    if (!$result) die('Error: Data tidak tersedia');
    $data = mysqli_fetch_array($result); 

    function is_select($var, $val) {
        if ($var == $val) return 'selected="selected"';
        return false;
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
            <h2>Ubah Data Toilet</h2><br>
            <div class="main">
                <form method="post" action="ubah.php"
                enctype="multipart/form-data">
                <div class="input">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input class="form-control" type="date" name="tanggal" data-date-format="DD/MMM/YYYY" placeholder="dd/mm/yyyy" value = "<?php echo $data['tanggal'];?>"/>
                </div><br>
                <div class="input">
                    <label for="toilet_id" class="form-label">Toilet ID</label>
                    <input type="text" class="form-control" name="toilet_id" id="toilet_id" value="<?php echo $data['toilet_id'];?>"/>
                </div>
                <div class="input">
                    <label for="users_id" class="form-label">ID Petugas</label>
                    <input type="text" class="form-control" name="users_id" id="users_id" value="<?php echo $data['users_id'];?>"/>
                </div>
                <div class="input">
                    <select class="form-select form-select mb-3" name="kloset" aria-label=".form-select-lg example">
                        <option selected>Kondisi Kloset</option>
                        <option <?php echo is_select ('Bersih', $data['kloset']);?> value="Bersih">Bersih</option>
                        <option <?php echo is_select ('Kotor', $data['kloset']);?> value="Kotor">Kotor</option>
                        <option <?php echo is_select ('Rusak', $data['kloset']);?> value="Rusak">Rusak</option>
                    </select>
                </div><br>
                <div class="input">
                    <select class="form-select form-select mb-3" name="wastafel" aria-label=".form-select-lg example">
                        <option selected>Kondisi Wastafel</option>
                        <option <?php echo is_select ('Bersih', $data['wastafel']);?> value="Bersih">Bersih</option>
                        <option <?php echo is_select ('Kotor', $data['wastafel']);?> value="Kotor">Kotor</option>
                        <option <?php echo is_select ('Rusak', $data['wastafel']);?> value="Rusak">Rusak</option>
                    </select>
                </div><br>
                <div class="input">
                    <select class="form-select form-select mb-3" name="lantai" aria-label=".form-select-lg example">
                        <option selected>Kondisi Lantai</option>
                        <option <?php echo is_select ('Bersih', $data['lantai']);?> value="Bersih">Bersih</option>
                        <option <?php echo is_select ('Kotor', $data['lantai']);?> value="Kotor">Kotor</option>
                        <option <?php echo is_select ('Rusak', $data['lantai']);?> value="Rusak">Rusak</option>
                    </select>
                </div><br>
                <div class="input">
                    <select class="form-select form-select mb-3" name="dinding" aria-label=".form-select-lg example">
                        <option selected>Kondisi Dinding</option>
                        <option <?php echo is_select ('Bersih', $data['dinding']);?> value="Bersih">Bersih</option>
                        <option <?php echo is_select ('Kotor', $data['dinding']);?> value="Kotor">Kotor</option>
                        <option <?php echo is_select ('Rusak', $data['dinding']);?> value="Rusak">Rusak</option>
                    </select>
                </div><br>
                <div class="input">
                    <select class="form-select form-select mb-3" name="kaca" aria-label=".form-select-lg example">
                        <option selected>Kondisi Kaca</option>
                        <option <?php echo is_select ('Bersih', $data['kaca']);?> value="Bersih">Bersih</option>
                        <option <?php echo is_select ('Kotor', $data['kaca']);?> value="Kotor">Kotor</option>
                        <option <?php echo is_select ('Rusak', $data['kaca']);?> value="Rusak">Rusak</option>
                    </select>
                </div><br>
                <div class="input">
                    <select class="form-select form-select mb-3" name="bau" aria-label=".form-select-lg example">
                        <option selected>Bau</option>
                        <option <?php echo is_select ('Ya', $data['bau']);?> value="Ya">Ya</option>
                        <option <?php echo is_select ('Tidak', $data['bau']);?> value="Tidak">Tidak</option>
                    </select>
                </div><br>
                <div class="input">
                    <select class="form-select form-select mb-3" name="sabun" aria-label=".form-select-lg example">
                        <option selected>Sabun</option>
                        <option <?php echo is_select ('Ada', $data['sabun']);?> value="Ada">Ada</option>
                        <option <?php echo is_select ('Habis', $data['sabun']);?> value="Habis">Habis</option>
                        <option <?php echo is_select ('Hilang', $data['sabun']);?> value="Hilang">Hilang</option>
                    </select>
                </div><br>
                <div class="submit">
                    <input type="hidden" name="id" value="<?php echo 
                    $data['id'];?>" />
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
