<?php 
// koneksi database
include 'config.php';

// menangkap data yang di kirim dari form
$id_penerbit = $_POST['id_penerbit'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$telepon = $_POST['telepon'];

// menginput data ke database
mysqli_query($mysqli,"insert into penerbit values('$id_penerbit','$nama','$alamat','$kota','$telepon')");

// mengalihkan halaman kembali ke index.php
header("location:admin.php");

?>