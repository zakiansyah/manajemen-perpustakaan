<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buku-form</title>
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
            $query = "SELECT * FROM buku WHERE id_buku = '$id'";
            $buku = mysqli_fetch_array(mysqli_query($koneksi, $query));
        }
    ?>

    <div class="container mt-3">
        <h3>Buku Perpustakaan</h3>
    </div>

    <form action="buku_act.php" method="post" class="container mt-5">
        <div class="row mb-3">
            <div class="col-4">
                <label for="judul_buku">Judul Buku</label>
            </div>
            <div class="col-lg-4">
                <input type="text" name="judul_buku" id="judul_buku" class="form-control" value="<?=@$buku['judul_buku'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="tahun">Tahun</label>
            </div>
            <div class="col-lg-4">
                <input type="text" name="tahun" id="tahun" class="form-control" value="<?=@$buku['tahun'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="email">Pengarang</label>
            </div>
            <div class="col-lg-4">
                <input type="text" name="pengarang" id="pengarang" class="form-control" value="<?=@$buku['pengarang'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="telp">Penerbit</label>
            </div>
            <div class="col-lg-4">
                <input type="text" name="penerbit" id="penerbit" class="form-control" value="<?=@$buku['penerbit'] ?>">
            </div>
        </div>

        <div class="col-lg-4">
            <input type="hidden" name="id_buku" value="<?=@$buku['id_buku'] ?>">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
</body>

</html>