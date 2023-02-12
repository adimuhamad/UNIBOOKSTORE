<!DOCTYPE html>
<html lang="en" class="h-100">

<?php
  require_once("database/config.php");
  $page = isset($_GET['page']) ? $_GET['page'] : 'admin';
  $page2 = isset($_GET['page']) ? $_GET['page'] : 'buku';
  $result = mysqli_query($mysqli, "select a.*, b.* from buku a inner join penerbit b on a.id_penerbit=b.id_penerbit order by id_buku asc");
  $result2 = mysqli_query($mysqli, "select * from penerbit order by id_penerbit asc");
?>

<body class="d-flex flex-column h-100">

  <?php
    include("layouts/header.php");
    include("layouts/navbar.php");
  ?>

  <div class="container mb-4">
    <h3>Data Buku</h3>
    <a class="btn btn-sm btn-primary mb-2" href="tambah_buku"><i class="fa-solid fa-plus"></i><b> Tambah Data</b></a>
    <table class="table table-striped display" id="myTable">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">ID</th>
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
            <a href="edit_buku.php?id_buku=<?php echo $data['id_buku']; ?>" class="badge bg-warning mb-3"><i class="fa-solid fa-pencil me-1"></i>Edit</a>
            <a href="aksi_hapus_buku.php?id_buku=<?php echo $data['id_buku']; ?>" class="badge bg-danger mb-3" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash me-1"></i>Hapus</a>
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

<script>
  $(document).ready(function() {
    $('#myTable').DataTable( {
      dom: '<"row"<"col"B><"col"f>rt<"col"i><"col"p>>',
      lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'All rows' ]
      ],
      buttons: [
      'pageLength',
        { extend: 'excel',
          text: '<i class="fas fa-file-excel me-2"></i>Export Excel',
          title: 'Data Buku',
          pageSize: 'A4',
          orientation: 'portrait',
          exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6 ] }
        },
        { extend: 'pdf', 
          text: '<i class="fas fa-file-pdf me-2"></i>Export PDF',
          title: 'Data Buku',
          pageSize: 'A4',
          orientation: 'portrait',
          exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6 ] }
        }
      ]
    } );
  } );
</script>

</html>