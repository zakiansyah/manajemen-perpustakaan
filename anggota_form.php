<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>anggota-form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <?php
        include "nav.php";
    ?>

    <?php
        if (@$_GET['id']) {
            include "koneksi.php";

            $id = $_GET['id'];
            $query = "SELECT * FROM anggota WHERE id_anggota = '$id'";
            $anggota = mysqli_fetch_array(mysqli_query($koneksi, $query));
        }
    ?>

    <div class="container mt-3">
        <h3>Anggota Perpustakaan</h3>
    </div>

    <form action="anggota_act2.php" method="post" class="container mt-5">
        <div class="row mb-3">
            <div class="col-4">
                <label for="nama_anggota">Nama Anggota</label>
            </div>
            <div class="col-lg-4">
                <input type="text" name="nama_anggota" id="nama_anggota" class="form-control" value="<?=@$anggota['nama_anggota'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="alamat">Alamat</label>
            </div>
            <div class="col-lg-4">
                <input type="text" name="alamat" id="alamat" class="form-control" value="<?=@$anggota['alamat'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="email">Email</label>
            </div>
            <div class="col-lg-4">
                <input type="email" name="email" id="email" class="form-control" value="<?=@$anggota['email'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="telp">Telp</label>
            </div>
            <div class="col-lg-4">
                <input type="tel" name="telp" id="telp" class="form-control" value="<?=@$anggota['telp'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="jk">Jenis Kelamin</label>
            </div>
            <div class="col-lg-4">
                <input type="radio" name="jk" id="jk_p" value="P" <?=(@$anggota['jk'] == 'P') ? 'Checked' : '' ?>"> Perempuan
                <input type="radio" name="jk" id="jk_l" value="L" <?=(@$anggota['jk'] == 'L') ? 'Checked' : '' ?>"> Laki - Laki
            </div>
        </div>

        <div class="col-lg-4">
            <input type="hidden" name="id_anggota" value="<?=@$anggota['id_anggota'] ?>">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
</body>

</html>