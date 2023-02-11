<!DOCTYPE html>
<html lang="en" class="h-100">

<?php
  require_once("database/config.php");
  $page = isset($_GET['page']) ? $_GET['page'] : 'pengadaan';
  $page2 = isset($_GET['page']) ? $_GET['page'] : 'pengadaan';
  $result = mysqli_query($mysqli, "select a.*, b.* from buku a inner join penerbit b on a.id_penerbit=b.id_penerbit where stok <= 10 order by stok asc");
?>

<body class="d-flex flex-column h-100">

  <?php
    include("layouts/header.php");
    include("layouts/navbar.php");
  ?>

  <div class="container">
  <h3>Data Buku Dengan Stok Kurang Dari Atau Sama Dengan 10</h3>
    <table class="table table-striped ">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Buku</th>
          <th scope="col">Penerbit</th>
          <th scope="col">Stok</th>
        </tr>
      </thead>
      <tbody>
        
      <?php
      $no = 1;
      while($data = mysqli_fetch_array($result)) { ?>     
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $data['nama_buku']; ?></td>
          <td><?php echo $data['nama']; ?></td>
          <td><?php echo $data['stok']; ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>

  <?php
    include("layouts/footer.php");
  ?>

</body>

</html>