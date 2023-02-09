<!DOCTYPE html>
<html lang="en">

<?php
  include_once("database/config.php");
  $page = isset($_GET['page']) ? $_GET['page'] : 'admin';
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UNIBOOKSTORE | TAMBAH BUKU</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
</head>

<body>

  <?php
    include_once("layouts/navbar.php");
  ?>

  <div class="container">
    <form method="post" action="aksi_tambah_penerbit.php">
      <div class="mb-3">
        <label class="form-label">ID Penerbit</label>
        <input type="text" class="form-control" id="id_penerbit" name="id_penerbit" placeholder="ID Buku" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Nama Penerbit</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penerbit" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Kota</label>
        <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Telepon</label>
        <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon" required>
      </div>

      <button type="submit" class="btn btn-sm btn-success mb-5" value="Simpan"><i class="fa-solid fa-save"></i><b> Simpan</b></button>
    </form>
  </div>

</body>

</html>