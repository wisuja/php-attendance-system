<?php
session_start();

if ($_SESSION["status"] !== "admin") {
  header("Location: ../index.php?msg=notlogin");
}

require('../koneksi.php');

if (isset($_GET["page"])) {
  $page = $_GET["page"];
} else {
  $page = "dashboard";
}

$nama = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Absensi Karyawan</title>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="../chartjs/Chart.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.25.3/moment.min.js" integrity="sha256-C66CaAImteEKZPYvgng9j10J/45e9sAuZyfPYCwp4gE=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

</head>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>Absensi Karyawan</h3>
      </div>

      <ul class="list-unstyled components">
        <p class="lead text-primary font-weight-bold">Welcome, <?php echo $nama; ?>!</p>
        <li class="active">
          <a href="index.php?page=dashboard"> <i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
        </li>
        <li class="active">
          <a href="#karyawanSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-user-friends mr-2"></i>Karyawan</a>
          <ul class="collapse list-unstyled" id="karyawanSubMenu">
            <li>
              <a href="index.php?page=karyawan">Data Karyawan</a>
            </li>
            <li>
              <a href="index.php?page=departemen">Departemen Karyawan</a>
            </li>
            <li>
              <a href="index.php?page=shift">Shift Karyawan</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="index.php?page=lokasi"><i class="fas fa-user-alt mr-2"></i> Lokasi Absensi</a>
        </li>
        <li>
          <a href="index.php?page=absensi"><i class="fas fa-list-alt mr-2"></i> Laporan Absensi</a>
        </li>
        <li>
          <a href="index.php?page=akun"><i class="fas fa-user-alt mr-2"></i> Akun</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">
            <button class="btn btn-outline-warning"><i class="fas fa-sign-out-alt mr-2"></i>Logout</button>
          </a>
        </li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
      <!-- Navbar Toggler -->
      <nav class="navbar navbar-toggle navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-toggle">
            <i class="fas fa-align-left"></i>
          </button>
        </div>
      </nav>
      <!-- End of Navbar Toggler -->

      <!-- Content -->
      <div class="container-fluid">
        <?php
        switch ($page) {
          case "dashboard":
            include "halaman/dashboard.php";
            break;
          case "karyawan":
            include "halaman/karyawan.php";
            break;
          case "departemen":
            include "halaman/departemen.php";
            break;
          case "shift":
            include "halaman/shift.php";
            break;
          case "lokasi":
            include "halaman/lokasi.php";
            break;
          case "akun":
            include "halaman/akun.php";
            break;
          case "absensi":
            include "halaman/absensi.php";
            break;
          default:
            echo "<h3 class='mt-2'>Halaman ini belum tersedia</h3>";
            break;
        }
        ?>
      </div>
      <!-- End of Content -->

      <!-- Footer -->
      <footer class="text-center py-3 bg-light">
        &copy; Will 2020. All rights reserved.
      </footer>
      <!-- End of Footer -->
    </div>
  </div>


  <script type="text/javascript">
    $(document).ready(function() {
      $("#sidebar").mCustomScrollbar({
        theme: "minimal"
      });

      $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
    });
  </script>

</body>

</html>