<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>buku-read</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
        <?php
            include "nav.php";
        ?>
        <div class="container mb-5">
            <div class="card">
                <div class="card-body">
                    <h1>Data Buku</h1>

                    <a href="buku_form.php" class="btn btn-info">Tambah Buku</a>

                    <?php
                        include "koneksi.php";
                        $buku = mysqli_query($koneksi,"SELECT * FROM buku");
                    ?>

                    <table class="table table-striped-columns">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <!-- data anggota -->
                        <?php
                            if (mysqli_num_rows($buku) > 0) {
                                foreach ($buku as $key => $value) {
                                    $no = $key + 1;
                        ?>
                                <tbody>
                                <tr>
                                    <th scope="row"><?= $no ?></th>
                                    <td><?= $value['judul_buku'] ?></td>
                                    <td><?= $value['tahun'] ?></td>
                                    <td><?= $value['pengarang'] ?></td>
                                    <td><?= $value['penerbit'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="buku_form.php?id=<?= $value['id_buku']?>" 
                                            class="btn btn-warning">Edit</a>
                                            <a href="buku_act.php?id_buku=<?= $value['id_buku']?>" 
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