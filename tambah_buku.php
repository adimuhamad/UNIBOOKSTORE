<!DOCTYPE html>
<html lang="en">

<?php
  include_once("config.php");
  $result = mysqli_query($mysqli, "select * from penerbit");
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UNIBOOKSTORE | TAMBAH BUKU</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="index">UNIBOOKSTORE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" aria-current="page" href="index">HOME</a>
          <a class="nav-link" href="admin">ADMIN</a>
          <a class="nav-link" href="pengadaan">PENGADAAN</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <form method="post" action="aksi_tambah_buku.php">
      <div class="mb-3">
        <label class="form-label">ID Buku</label>
        <input type="text" class="form-control" id="id_buku" name="id_buku" placeholder="ID Buku" required>
      </div>

      <label class="form-label">Penerbit</label>
      <select class="form-select mb-3" id="id_penerbit" name="id_penerbit" required>
        <option selected>Pilih Penerbit</option>
        <?php while($data = mysqli_fetch_array($result)) { ?>
          <option value="<?php echo $data['id_penerbit']; ?>"><?php echo $data['nama']; ?></option>
        <?php } ?>
      </select>

      <label class="form-label">Kategori</label>
      <select class="form-select mb-3" id="kategori" name="kategori" required>
        <option selected>Pilih Kategori</option>
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

      <button type="submit" class="btn btn-sm btn-success mb-5" value="Simpan"><i class="fa-solid fa-save"></i><b> Simpan</b></button>
    </form>
  </div>

</body>

</html>