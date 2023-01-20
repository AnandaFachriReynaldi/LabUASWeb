<?php
include("koneksi.php");

//Query untuk menampilkan, mencari data
$q = "";
if (isset($_GET['submit']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where = "WHERE tanggal LIKE '%".$q."%' or toilet_id LIKE '%".$q."%' or kloset LIKE '%".$q."%' or wastafel LIKE '%".$q."%' or lantai LIKE '%".$q."%' or dinding LIKE '%".$q."%' or sabun LIKE '%".$q."%' or bau LIKE '%".$q."%' or users_id LIKE '%".$q."%'" ;


}
$title = 'Checklist Toilet';
$sql = 'SELECT * FROM checklist ';
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
    <div>
        <header>
            <h1>Sistem Checklist Toilet</h1>
        </header>
        <nav>
            <a href="index.php?page=1" li class=active>Home</a>
            <a href="laporan.php">Laporan</a>
        </nav>
        <div class="container">
            <tr>
                <a href="tambah.php?id=" class="buttontambah">Tambah Data Toilet</a> <br><br><br>
            </tr>
            <form action="" method="get">
                <label for="q">Cari Data </label>
                <input type="text" id="q" name="q" class="input-q" value="<?php echo $q ?>">
                <input type="submit" name="submit" value="Cari" class="buttoncari"> <br><br>
            </form>
            <table class="table table-striped table-hover">
            <tr>
                <th>Tanggal</th>
                <th>ID Toilet</th>
                <th>ID Petugas</th>
                <th>Kloset</th>
                <th>Wastafel</th>
                <th>Lantai</th>
                <th>Dinding</th>
                <th>Kaca</th>
                <th>Bau</th>
                <th>Sabun</th>
                <th>Aksi</th>
            </tr>
            <?php if($result): ?>
            <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td><?= $row['tanggal'];?></td>
                <td><?= $row['toilet_id'];?></td>
                <td><?= $row['users_id'];?></td>
                <td><?= $row['kloset'];?></td>
                <td><?= $row['wastafel'];?></td>
                <td><?= $row['lantai'];?></td>
                <td><?= $row['dinding'];?></td>
                <td><?= $row['kaca'];?></td>
                <td><?= $row['bau'];?></td>
                <td><?= $row['sabun'];?></td>
                <td>
                    <a class="button1" href="ubah.php?id=<?= $row['id'];?>">Ubah</a>
                    <a class="button2" href="hapus.php?id=<?= $row['id'];?>">Hapus</a> 
                </td>
            </tr>
            <?php endwhile; else: ?>
            <tr>
                <td colspan="7">Belum ada data</td>
            </tr>
            <?php endif; ?>
            </table><br>
        </div>
        <footer>
            <p>&copy; 2023, Teknik Informatika, Universitas Pelita Bangsa</p>
        </footer>
    </div>
</body>
</html>