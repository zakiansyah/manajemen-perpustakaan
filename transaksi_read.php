<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="bootstrap/assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    include "nav.php";
    ?>

    <div class="container mb-5">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h1>Data Transaksi</h1>

                    <a href="transaksi_form.php" class="btn btn-info">Tambah Transaksi</a>
                </div>

                <?php
include "koneksi.php";

$query = "SELECT * FROM transaksi 
            JOIN anggota ON anggota.id_anggota = transaksi.id_anggota
            JOIN buku ON buku.id_buku = transaksi.id_buku"; // Perbaikan JOIN

$transaksi = mysqli_query($koneksi, $query);
?>
<table class="table table-hover">
    <!-- judul table anggota -->
    <tr>
        <td>No</td>
        <td>Nama Anggota</td>
        <td>Nama Buku</td>
        <td>Tanggal Pinjam</td>
        <td>Tanggal Kembali</td>
        <td>Action</td>
    </tr>

    <!-- data anggota -->
    <?php
    foreach ($transaksi as $key => $value) {
        $no = $key + 1;
    ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $value['nama_anggota'] ?></td>
            <td><?= $value['judul_buku'] ?></td>
            <td><?= $value['tanggal_pinjam'] ?></td> <!-- Perbaikan kolom untuk tanggal pinjam -->
            <td><?= $value['tanggal_kembali'] ?></td> <!-- Perbaikan kolom untuk tanggal kembali -->
            <td>
                <div class="btn-group">
                    <a href="transaksi_act.php?id=<?= $value['id_transaksi'] ?>" class="btn btn-danger">Delete</a>
                </div>
            </td>
        </tr>
    <?php
    }
    ?>
</table>




    <script src="bootstrap/assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>