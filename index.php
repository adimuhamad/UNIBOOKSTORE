<!DOCTYPE html>
<html lang="en" class="h-100">

<?php
  require_once("database/config.php");
  $page = isset($_GET['page']) ? $_GET['page'] : 'home';
  $page2 = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<body class="d-flex flex-column h-100">

  <?php
    include("layouts/header.php");
    include("layouts/navbar.php");
  ?>

  <div class="container">

    <form action="index.php" method="get">
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
        <input type="text" name="cari" class="form-control" placeholder="Nama Buku">
        <input class="btn btn-outline-secondary" type="submit" value="Cari">
      </div>
    </form>

    <?php 
    if(isset($_GET['cari'])){
      $cari = $_GET['cari'];
      echo "<b>Hasil pencarian nama buku : ".$cari."</b>";
    }
    ?>

    <table class="table table-striped ">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kategori</th>
          <th scope="col">Nama Buku</th>
          <th scope="col">Harga</th>
          <th scope="col">Stok</th>
          <th scope="col">Penerbit</th>
        </tr>
      </thead>
      <tbody>
        
      <?php 
      if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $data = mysqli_query($mysqli, "select a.*, b.* from buku a inner join penerbit b on a.id_penerbit=b.id_penerbit where nama_buku like '%".$cari."%' order by id_buku asc");
      }else{
        $data = mysqli_query($mysqli, "select a.*, b.* from buku a inner join penerbit b on a.id_penerbit=b.id_penerbit order by id_buku asc");
      }
      
      $no = 1;
      $fmt = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
      while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['kategori']; ?></td>
        <td><?php echo $d['nama_buku']; ?></td>
        <td><?php echo $fmt->formatCurrency($d['harga'], "IDR"); ?></td>
        <td><?php echo $d['stok']; ?></td>
        <td><?php echo $d['nama']; ?></td>
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