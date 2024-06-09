<?php
include "koneksi.php";

$id_buku = $_POST['id_buku'];
$id_anggota = $_POST['id_anggota'];
$tanggal_transaksi = $_POST['tanggal_pinjam']; 
$tanggal_kembali = $_POST['tanggal_kembali'];

if (@$_GET['id']) {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '$id'") 
    or die (mysqli_error($koneksi));
    header('Location: transaksi_read.php');
} else {
    $query = "INSERT INTO transaksi (id_buku, id_anggota, tanggal_pinjam, tanggal_kembali) VALUES ('$id_buku', '$id_anggota', '$tanggal_transaksi', '$tanggal_kembali')";
    mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    header('Location: transaksi_read.php');
}

?>

