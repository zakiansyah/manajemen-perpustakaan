<?php

include "koneksi.php";

$nama_anggota = $_POST['nama_anggota'] ?? null;
$alamat = $_POST['alamat'] ?? null;
$email = $_POST['email'] ?? null;
$telp = $_POST['telp'] ?? null;
$jk = $_POST['jk'] ?? null;



if (@$_GET['id_anggota']) {
    $id = $_GET['id_anggota'];
    mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota = '$id'") 
    or die (mysqli_error($koneksi));
    header('Location: anggota_read.php');
} elseif (@$_POST['id_anggota']) {
    $id = $_POST['id_anggota'];
    $query = "UPDATE anggota SET
        nama_anggota = '$nama_anggota',
        alamat = '$alamat',
        email = '$email',
        telp = '$telp',
        jk = '$jk'
        WHERE id_anggota = '$id'
    ";
    mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
    header('Location: anggota_read.php');
} else {
    $query = "INSERT INTO anggota (nama_anggota, alamat, email, telp, jk) VALUES ('$nama_anggota', '$alamat', '$email', '$telp', '$jk')";
    mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
    header('Location: anggota_read.php');
}

?>