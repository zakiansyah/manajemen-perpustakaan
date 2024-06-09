<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi</title>
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
                    <h1>Transaksi</h1>
                </div>

                <?php
                include "koneksi.php";
                $disabled = '';
                if (isset($_GET['id_transaksi'])) {
                    $id_transaksi = $_GET['id_transaksi'];

                    $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'");
                    $transaksi = mysqli_fetch_array($query);
                    $disabled = 'disabled';
                }

                $anggota_query = mysqli_query($koneksi, "SELECT * FROM anggota");
                $buku_query = mysqli_query($koneksi, "SELECT * FROM buku");
                ?>

                <form action="transaksi_act.php" method="post">
                    <div class="row mb-3">
                        <div class="col-lg-3 text-end">
                            <label for="id_anggota">Nama Anggota</label>
                        </div>

                        <div class="col-lg-3">
                            <select name="id_anggota" id="id_anggota" class="form-select" <?= $disabled ?>>
                                <?php
                                foreach ($anggota_query as $value) {
                                    ?>
                                    <option value="<?= $value['id_anggota'] ?>" <?= (@$transaksi['id_anggota'] == $value['id_anggota']) ? 'selected' : '' ?>><?= $value['nama_anggota'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3 text-end">
                            <label for="id_buku">Buku</label>
                        </div>

                        <div class="col-lg-3">
                            <select name="id_buku" id="id_buku" class="form-select" <?= $disabled ?>>
                                <?php
                                foreach ($buku_query as $value) {
                                    ?>
                                    <option value="<?= $value['id_buku'] ?>" <?= (@$transaksi['id_buku'] == $value['id_buku']) ? 'selected' : '' ?>><?= $value['judul_buku'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3 text-end">
                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                        </div>

                        <div class="col-lg-4">
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3 text-end">
                            <label for="tanggal_kembali">Tanggal Kembali</label>
                        </div>

                        <div class="col-lg-4">
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 offset-lg-3">
                            <input type="hidden" name="id_transaksi" value="<?= @$transaksi['id_transaksi'] ?>">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="bootstrap/assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
