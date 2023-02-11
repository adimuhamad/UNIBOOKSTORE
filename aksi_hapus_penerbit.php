<?php

// koneksi database
require_once("database/config.php");

// menangkap data id yang di kirim dari url
$id_penerbit = $_GET['id_penerbit'];
 
// menghapus data dari database
mysqli_query($mysqli,"delete from penerbit where id_penerbit='$id_penerbit'");

// mengalihkan halaman kembali ke index.php
header("location:penerbit.php");

?>