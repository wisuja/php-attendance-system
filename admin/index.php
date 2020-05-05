<?php
session_start();

if ($_SESSION["status"] !== "admin") {
  header("Location: ../index.php?msg=notlogin");
}

require("../koneksi.php");

if (isset($_GET["page"])) {
  $page = $_GET["page"];
} else {
  $page = "home";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dasbor Admin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.php?page=home"><strong>Absensi Karyawan</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto align-items-center">
          <li class="nav-item <?php if ($page == "home") echo 'active' ?>">
            <a class="nav-link" href="index.php?page=home">Home</span></a>
          </li>
          <li class="nav-item dropdown <?php if ($page == "karyawan" || $page == "departemen" || $page == "shift") echo 'active' ?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Karyawan
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item <?php if ($page == "karyawan") echo 'active' ?>" href="index.php?page=karyawan">Data Karyawan</a>
              <a class="dropdown-item <?php if ($page == "departemen") echo 'active' ?>" href="index.php?page=departemen">Departemen Karyawan</a>
              <a class="dropdown-item <?php if ($page == "shift") echo 'active' ?>" href="index.php?page=shift">Shift Karyawan</a>
            </div>
          </li>
          <li class="nav-item <?php if ($page == "absensi") echo 'active' ?>">
            <a class="nav-link" href="index.php?page=absensi">Laporan Absensi</a>
          </li>
          <li class="nav-item <?php if ($page == "akun") echo 'active' ?>">
            <a class="nav-link" href="index.php?page=akun">Akun</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../logout.php"><button class="btn btn-outline-warning">Logout</button></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End of Navbar -->

  <!-- Content -->
  <div class="container text-center">
    <?php
    switch ($page) {
      case "home":
        include "halaman/home.php";
        break;
      case "karyawan":
        include "halaman/karyawan.php";
        break;
      default:
        echo "<h3 class='mt-2'>Halaman ini belum tersedia</h3>";
        break;
    }
    ?>
  </div>
  <!-- End of Content -->

  <!-- Footer -->
  <footer class="fixed-bottom text-center bg-light">
    <p class="text-muted pt-3">William Surya Jaya 1831164 &copy; 2020</p>
  </footer>
  <!-- End of Footer -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>