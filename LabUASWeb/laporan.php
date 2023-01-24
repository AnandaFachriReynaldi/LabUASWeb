<?php
include("koneksi.php");

$q = "";
if (isset($_GET['submit']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where = "WHERE keterangan LIKE '%".$q."%' or lokasi LIKE '%".$q."%'";
}
$title = 'Toilet';
$sql = 'SELECT * FROM toilet ';
if (isset($sql_where))
    $sql .= $sql_where;
$result = mysqli_query($conn, $sql);
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
            <tr>
                <a href="tambah_toilet.php?id=" class="buttontambah">Tambah Data Toilet</a> <br><br><br>
            </tr>
            <form action="" method="get">
                <label for="q">Cari Data </label>
                <input type="text" id="q" name="q" class="input-q" value="<?php echo $q ?>">
                <input type="submit" name="submit" value="Cari" class="buttoncari"> <br><br>
            </form>
        <h2>Data Toilet</h2> <br>
        <div class="main">
            <table class="table table-striped table-hover">
            <tr>
                <th>Toilet ID</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php if($result): ?>
            <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td><?= $row['id'];?></td>
                <td><?= $row['keterangan'];?></td>
                <td>
                    <a class="button2" href="hapus_toilet.php?id=<?= $row['id'];?>">Hapus</a></button>
                </td>
            </tr>
            <?php endwhile; else: ?>
            <tr>
                <td style="color: #FFFFFF;" colspan="7">Belum Ada Data</td>
            </tr>
            <?php endif; ?>
            </table>
        </div><br>
    </div>
    <footer> 
        <p>&copy; 2023, Teknik Informatika, Universitas Pelita Bangsa</p>
    </footer>
</body>
</html>
