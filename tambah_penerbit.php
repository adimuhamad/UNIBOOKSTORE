<!DOCTYPE html>
<html lang="en" class="h-100">

<?php
  require_once("database/config.php");
  $page = isset($_GET['page']) ? $_GET['page'] : 'admin';
  $page2 = isset($_GET['page']) ? $_GET['page'] : 'admin';
?>

<body class="d-flex flex-column h-100">

  <?php
    include("layouts/header.php");
    include("layouts/navbar.php");
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

      <div class="mb-5">
        <button type="submit" class="btn btn-sm btn-success" name="simpan" value="Simpan"><i class="fa-solid fa-save me-2"></i><b>Simpan</b></button>
        <a href="penerbit" class="btn btn-sm btn-danger"><i class="fa-solid fa-close me-2"></i><b>Batal</b></a>
      </div>
    </form>
  </div>

  <?php
    include("layouts/footer.php");
  ?>

</body>

</html>