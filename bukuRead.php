<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

  <?php
  include 'nav.php';
  ?>
  <div class="container mb-5">
    <div class="text-center pb-3">
      <h2>Data buku</h2>
    </div>
    <a href="tambahBuku.php" class="btn btn-primary mb-3">Tambah Data</a>

    <?php
    include "koneksi.php";
    $buku = mysqli_query($koneksi, "SELECT * FROM buku")


    ?>
    <table class="table">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Judul Buku</th>
        <th scope="col">Tahun</th>
        <th scope="col">Pengarang</th>
        <th scope="col">Penerbit</th>
        <th scope="col">Aksi</th>

      </tr>
      <?php
      foreach ($buku as $key => $value) {
        $no = $key + 1;

      ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $value['judul_buku'] ?></td>
          <td><?= $value['tahun'] ?></td>
          <td><?= $value['pengarang'] ?></td>
          <td><?= $value['penerbit'] ?></td>
          <td>
            <div class="btn-group">
              <a href="tambahBuku.php?id=<?= $value['id_buku'] ?>" class="btn btn-warning">Edit</a>
              <a href="buku_act.php?id_buku=<?= $value['id_buku'] ?>" class="btn btn-danger">Delete</a>
            </div>
          </td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>
</body>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>