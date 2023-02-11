<?php 

// koneksi database
require_once("database/config.php");
if(isset($_POST['simpan'])) {
	// menangkap data yang di kirim dari form
	$id_buku = $_POST['id_buku'];
	$id_penerbit = $_POST['id_penerbit'];
	$kategori = $_POST['kategori'];
	$nama_buku = $_POST['nama_buku'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$duplicate = mysqli_query($mysqli,"select * from buku where id_buku='$id_buku'");
	if (!mysqli_num_rows($duplicate) > 0) {
		mysqli_query($mysqli,"insert into buku values('$id_buku','$id_penerbit','$kategori','$nama_buku','$harga','$stok')");
		header("location:buku.php");
	} else {
		$pesan = "Tidak dapat menyimpan, ID Buku sudah digunakan!";
		header("location:tambah_buku.php");
	}
}

?>