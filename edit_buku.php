<!DOCTYPE html>
<html lang="en" class="h-100">

<?php
  require_once("database/config.php");
  $page = isset($_GET['page']) ? $_GET['page'] : 'admin';
  $page2 = isset($_GET['page']) ? $_GET['page'] : 'admin';
  $id_buku = $_GET['id_buku'];
  $penerbit = mysqli_query($mysqli, "select * from penerbit");
  $result = mysqli_query($mysqli, "select a.*, b.* from buku a inner join penerbit b on a.id_penerbit=b.id_penerbit where id_buku='$id_buku'");
?>

<body class="d-flex flex-column h-100">

  <?php
    include("layouts/header.php");
    include("layouts/navbar.php");
  ?>

  <div class="container">
    <?php while($data = mysqli_fetch_array($result)) { ?>
      <form method="post" action="aksi_edit_buku.php">
        <input type="hidden" class="form-control" id="id_buku" name="id_buku" value="<?php echo $data['id_buku']; ?>">

        <label class="form-label">Penerbit</label>
        <select class="form-select mb-3" id="id_penerbit" name="id_penerbit" required>
          <option value="<?php echo $data['id_penerbit']; ?>"><?php echo $data['nama']; ?></option>
          <?php while($pnrbt = mysqli_fetch_array($penerbit)) { ?>
            <option value="<?php echo $pnrbt['id_penerbit']; ?>"><?php echo $pnrbt['nama']; ?></option>
          <?php } ?>
        </select>

        <label class="form-label">Kategori</label>
        <select class="form-select mb-3" id="kategori" name="kategori" required>
          <option value="<?php echo $data['kategori']; ?>"><?php echo $data['kategori']; ?></option>
          <option value="bisnis">Bisnis</option>
          <option value="keilmuan">Keilmuan</option>
          <option value="novel">Novel</option>
        </select>

        <div class="mb-3">
          <label class="form-label">Nama Buku</label>
          <input type="text" class="form-control" id="nama_buku" name="nama_buku" placeholder="Nama Buku" value="<?php echo $data['nama_buku']; ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Harga</label>
          <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" value="<?php echo $data['harga']; ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Stok</label>
          <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok" value="<?php echo $data['stok']; ?>" required>
        </div>

        <div class="mb-5">
          <button type="submit" class="btn btn-sm btn-success" name="simpan" value="Simpan"><i class="fa-solid fa-save me-2"></i><b>Simpan</b></button>
          <a href="buku" class="btn btn-sm btn-danger"><i class="fa-solid fa-close me-2"></i><b>Batal</b></a>
        </div>
      </form>
    <?php } ?>
  </div>

  <?php
    include("layouts/footer.php");
  ?>

</body>

</html>