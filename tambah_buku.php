<!DOCTYPE html>
<html lang="en" class="h-100">

<?php
  require_once("database/config.php");
  $page = isset($_GET['page']) ? $_GET['page'] : 'admin';
  $page2 = isset($_GET['page']) ? $_GET['page'] : 'admin';
  $result = mysqli_query($mysqli, "select * from penerbit");
?>

<body class="d-flex flex-column h-100">

  <?php
    include("layouts/header.php");
    include("layouts/navbar.php");
  ?>

  <div class="container">
    <form method="post" action="aksi_tambah_buku.php">
      <p><?php echo isset($pesan) ? $pesan : "" ?></p>
      <div class="mb-3 mt-3">
        <label class="form-label">ID Buku</label>
        <input type="text" class="form-control" id="id_buku" name="id_buku" placeholder="ID Buku" required>
      </div>

      <label class="form-label">Penerbit</label>
      <select class="form-select mb-3" id="id_penerbit" name="id_penerbit" required>
        <option selected disabled value="">Pilih Penerbit</option>
        <?php while($data = mysqli_fetch_array($result)) { ?>
          <option value="<?php echo $data['id_penerbit']; ?>"><?php echo $data['nama']; ?></option>
        <?php } ?>
      </select>

      <label class="form-label">Kategori</label>
      <select class="form-select mb-3" id="kategori" name="kategori" required>
        <option selected disabled value="">Pilih Kategori</option>
        <option value="bisnis">Bisnis</option>
        <option value="keilmuan">Keilmuan</option>
        <option value="novel">Novel</option>
      </select>

      <div class="mb-3">
        <label class="form-label">Nama Buku</label>
        <input type="text" class="form-control" id="nama_buku" name="nama_buku" placeholder="Nama Buku" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok" required>
      </div>

      <div class="mb-5">
        <button type="submit" class="btn btn-sm btn-success" name="simpan" value="Simpan"><i class="fa-solid fa-save me-2"></i><b>Simpan</b></button>
        <a href="buku" class="btn btn-sm btn-danger"><i class="fa-solid fa-close me-2"></i><b>Batal</b></a>
      </div>
    </form>
  </div>

  <?php
    include("layouts/footer.php");
  ?>

</body>

<style>
  input:required {
    color: #9B757D;
  }
  select:required {
    color: #9B757D;
  }
  option[value=""][disabled] {
    display: none;
  }
  option {
    color: #000000;
  }
</style>

</html>