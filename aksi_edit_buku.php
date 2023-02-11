<?php

// koneksi database
require_once("database/config.php");

// menangkap data yang di kirim dari form
$id_buku = $_POST['id_buku'];
$id_penerbit = $_POST['id_penerbit'];
$kategori = $_POST['kategori'];
$nama_buku = $_POST['nama_buku'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

// menginput data ke database
mysqli_query($mysqli,"update buku set id_penerbit='$id_penerbit',kategori='$kategori',nama_buku='$nama_buku',harga='$harga',stok='$stok' where id_buku='$id_buku'");

// mengalihkan halaman kembali ke index.php
header("location:buku.php");

?>