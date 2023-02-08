<?php 
// koneksi database
include 'config.php';

// menangkap data yang di kirim dari form
$id_buku = $_POST['id_buku'];
$id_penerbit = $_POST['id_penerbit'];
$kategori = $_POST['kategori'];
$nama_buku = $_POST['nama_buku'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

// menginput data ke database
mysqli_query($mysqli,"insert into buku values('$id_buku','$id_penerbit','$kategori','$nama_buku','$harga','$stok')");

// mengalihkan halaman kembali ke index.php
header("location:admin.php");

?>