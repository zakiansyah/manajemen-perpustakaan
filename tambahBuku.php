<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Peminjaman Buku</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php
  include 'nav.php';
  if(@$_GET['id']){
    include "koneksi.php";
  $id =$_GET['id'];
  $query = "SELECT * FROM buku WHERE id_buku = '$id'";
  $buku = mysqli_fetch_array(mysqli_query($koneksi, $query));
  }
  ?>

  
  <div class="container mt-5">
    <h1>form Tambah Buku</h1>
    <form action="buku_act.php" method="post">
      <div class="mb-3">
        <label for="namaBuku" class="form-label">Judul Buku</label>
        <input type="text" name="judul_buku" class="form-control" id="namaBuku" placeholder="Masukkan nama buku yang ingin dipinjam" value="@$buku['judul_buku']?">
      </div>
      <div class="mb-3">
        <label for="tahun" class="form-label">tahun</label>
        <input type="text" name="tahun" class="form-control" id="tahun" placeholder="Masukkan tahun" value="@$buku['tahun']?">
      </div>
      <div class="mb-3">
        <label for="pengarang" class="form-label">Pengarang</label>
        <input type="text" name="Pengarang" class="form-control" id="pengarang" placeholder="pengarang" value="@$buku['pengarang']?">
      </div>
      <div class="mb-3">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="penerbit" name="penerbit" value="@$buku['penerbit']?">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      <input type="hidden" name="id_buku" value="<?=@$buku['id_buku'] ?>">
    </form>
  </div> 

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
