<?php

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

include "koneksi.php";

$judul_buku = $_POST['judul_buku'] ?? null;
$tahun = $_POST['tahun'] ?? null;
$pengarang = $_POST['pengarang'] ?? null;
$penerbit = $_POST['penerbit'] ?? null;

// if (@$_GET['id_anggota']) {
//     $id = $_GET['id_anggota'];
//     mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota = '$id'");
// } elseif (@$_POST['id_anggota']){
//     $id = $_POST['id_anggota'];
//     $query = "UPDATE anggota SET
//         nama_anggota = '$nama_anggota',
//         alamat = '$alamat',
//         email = '$email',
//         telp = '$telp',
//         jk = '$jk'
//         WHERE id_anggota = '$id'
//     ";
//     mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
// } else {
//     $query = "INSERT INTO anggota (nama_anggota, alamat, email, telp, jk) VALUES ('$nama_anggota', '$alamat', '$email', '$telp', '$jk')";
//     mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
// }

// header('Location:anggota_read.php');
//


if (@$_GET['id_buku']) {
    $id = $_GET['id_buku'];
    mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku = '$id'") 
    or die (mysqli_error($koneksi));
    header('Location: buku_read.php');
} elseif (@$_POST['id_buku']) {
    $id = $_POST['id_buku'];
    $query = "UPDATE buku SET
        judul_buku = '$judul_buku',
        tahun = '$tahun',
        pengarang = '$pengarang',
        penerbit = '$penerbit'
        WHERE id_buku = '$id'
    ";
    mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
    header('Location: buku_read.php');
} else {
    $query = "INSERT INTO buku (judul_buku, tahun, pengarang, penerbit) 
    VALUES ('$judul_buku', '$tahun', '$pengarang', '$penerbit')";
    mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
    header('Location: buku_read.php');
}

?>