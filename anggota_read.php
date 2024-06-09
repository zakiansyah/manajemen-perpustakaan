<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>anggota-read</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    include "nav.php";
    ?>

    <div class="container mb-5">
        <div class="card">
            <div class="card-body">
                <h1>Data Anggota</h1>

                <a href="anggota_form.php" class="btn btn-info">Tambah Anggota</a>

                <?php
                include "koneksi.php";
                $anggota = mysqli_query($koneksi,"SELECT * FROM anggota");
                ?>

                <table class="table table-striped-columns">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <!-- data anggota -->
                    <?php
                    if (mysqli_num_rows($anggota) > 0) {
                        foreach ($anggota as $key => $value) {
                            $no = $key + 1;
                    ?>
                            <tbody>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $value['nama_anggota'] ?></td>
                                <td><?= $value['alamat'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['telp'] ?></td>
                                <td><?= $value['jk'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="anggota_form.php?id=<?= $value['id_anggota']?>" 
                                        class="btn btn-warning">Edit</a>
                                        <a href="anggota_act2.php?id_anggota=<?= $value['id_anggota']?>" 
                                        class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                    <?php
                    }
                    } else {
                        echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

   
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
    
</body>
</html>