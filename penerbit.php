<!DOCTYPE html>
<html lang="en" class="h-100">

<?php
  require_once("database/config.php");
  $page = isset($_GET['page']) ? $_GET['page'] : 'admin';
  $page2 = isset($_GET['page']) ? $_GET['page'] : 'penerbit';
  $result = mysqli_query($mysqli, "select a.*, b.* from buku a inner join penerbit b on a.id_penerbit=b.id_penerbit order by id_buku asc");
  $result2 = mysqli_query($mysqli, "select * from penerbit order by id_penerbit asc");
?>

<body class="d-flex flex-column h-100">

  <?php
    include("layouts/header.php");
    include("layouts/navbar.php");
  ?>

  <div class="container">
    <h3>Data Penerbit</h3>
    <a class="btn btn-sm btn-primary mb-3" href="tambah_penerbit"><i class="fa-solid fa-plus"></i><b> Tambah Data</b></a>
    <table class="table table-striped ">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">ID</th>
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
            <a href="edit_penerbit.php?id_penerbit=<?php echo $data2['id_penerbit']; ?>" class="badge bg-warning mb-3"><i class="fa-solid fa-pencil me-1"></i>Edit</a>
            <a href="aksi_hapus_penerbit.php?id_penerbit=<?php echo $data2['id_penerbit']; ?>" class="badge bg-danger mb-3" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash me-1"></i>Hapus</a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>

  <?php
    include("layouts/footer.php");
  ?>

</body>

<style>
  .badge, .badge:hover {
    text-decoration: none;
    color: white;
  }
</style>

</html>