<!DOCTYPE html>
<html lang="en">

<?php
  include_once("database/config.php");
  $page = isset($_GET['page']) ? $_GET['page'] : 'admin';
  $result = mysqli_query($mysqli, "select a.*, b.* from buku a inner join penerbit b on a.id_penerbit=b.id_penerbit order by id_buku asc");
  $result2 = mysqli_query($mysqli, "select * from penerbit order by id_penerbit asc");
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UNIBOOKSTORE | ADMIN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
</head>

<body>

  <?php
    include_once("layouts/navbar.php");
  ?>

  <div class="container">
    <h3>Data Buku</h3>
    <a class="btn btn-sm btn-primary mb-3" href="tambah_buku"><i class="fa-solid fa-plus"></i><b> Tambah Data</b></a>
    <table class="table table-striped ">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">ID Buku</th>
          <th scope="col">Kategori</th>
          <th scope="col">Nama Buku</th>
          <th scope="col">Harga</th>
          <th scope="col">Stok</th>
          <th scope="col">Penerbit</th>
          <th scope="col" style="width: 15%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        
      <?php
      $no = 1;
      $fmt = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
      while($data = mysqli_fetch_array($result)) { ?>     
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $data['id_buku']; ?></td>
          <td><?php echo $data['kategori']; ?></td>
          <td><?php echo $data['nama_buku']; ?></td>
          <td><?php echo $fmt->formatCurrency($data['harga'], "IDR"); ?></td>
          <td><?php echo $data['stok']; ?></td>
          <td><?php echo $data['nama']; ?></td>
          <td>
            <a href="edit_buku.php?id_buku=<?php echo $data['id_buku']; ?>" class="badge bg-warning mb-3"><i class="fa-solid fa-pencil"></i> Edit</a>
            <a href="aksi_hapus_buku.php?id_buku=<?php echo $data['id_buku']; ?>" class="badge bg-danger mb-3" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i> Hapus</a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

    <br><h3>Data Penerbit</h3>
    <a class="btn btn-sm btn-primary mb-3" href="tambah_penerbit"><i class="fa-solid fa-plus"></i><b> Tambah Data</b></a>
    <table class="table table-striped ">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">ID Penerbit</th>
          <th scope="col">Nama</th>
          <th scope="col">Alamat</th>
          <th scope="col">Kota</th>
          <th scope="col">Telepon</th>
          <th scope="col" style="width: 15%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        
      <?php
      $no = 1;
      while($data2 = mysqli_fetch_array($result2)) { ?>     
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $data2['id_penerbit']; ?></td>
          <td><?php echo $data2['nama']; ?></td>
          <td><?php echo $data2['alamat']; ?></td>
          <td><?php echo $data2['kota']; ?></td>
          <td><?php echo $data2['telepon']; ?></td>
          <td>
            <a href="edit_penerbit.php?id_penerbit=<?php echo $data2['id_penerbit']; ?>" class="badge bg-warning mb-3"><i class="fa-solid fa-pencil"></i> Edit</a>
            <a href="aksi_hapus_penerbit.php?id_penerbit=<?php echo $data2['id_penerbit']; ?>" class="badge bg-danger mb-3" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i> Hapus</a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>

</body>

<style>
  .badge, .badge:hover {
    text-decoration: none;
    color: white;
  }
</style>

</html>