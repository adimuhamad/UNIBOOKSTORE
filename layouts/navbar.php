<nav class="navbar navbar-expand-lg navbar-dark bg-dark  mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="index">UNIBOOKSTORE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link <?php echo $page == "home" ? "active" :"" ?>" href="index">HOME</a>
        <a class="nav-link <?php echo $page == "admin" ? "active" :"" ?>" href="admin">ADMIN</a>
        <a class="nav-link <?php echo $page == "pengadaan" ? "active" :"" ?>" href="pengadaan">PENGADAAN</a>
      </div>
    </div>
  </div>
</nav>