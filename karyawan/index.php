<?php
session_start();

if ($_SESSION["status"] !== "karyawan") {
  header("Location: ../index.php?msg=notlogin");
}

require('../koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Absensi Karyawan</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto align-items-center">
          <li class="nav-item mr-4">
            <p class="font-weight-bold lead mt-3">Halo, <?php echo $_SESSION["username"]; ?></p>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-warning text-white px-3" href="../logout.php">
              <i class="fas fa-sign-out-alt mr-1"></i>
              Log out
            </a>
          </li>
        </ul>
      </div>
  </nav>
  <!-- End of Navbar -->

  <!-- Content -->
  <div class="container">
    <div class="row karyawan-container">
      <div class="col-md-6 absen-container">
        <div class="card absen-card text-center my-3" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Jam: <div id="timestamp"></div>
            </h5>
          </div>
        </div>
        <div class="card absen-card" style="width: 18rem;">
          <div class="card-body">
            <h4 class="card-title text-center">Absen di sini</h4>
            <form action="aksi_tambah.php" method="POST" enctype="multipart/form-data">
              <div class="text-center">
                <button type="submit" name="absen" class="btn-absen">
                  <i class="fas fa-fingerprint"></i>
                </button>
              </div>
              <div class="form-group mt-3">
                <label for="lokasi">Pilih lokasi</label>
                <select class="form-control" id="lokasi" name="lokasi">
                  <?php
                  $data = mysqli_query($koneksi, "SELECT nama FROM lokasi");
                  while ($d = mysqli_fetch_assoc($data)) :
                  ?>
                    <option value="<?php echo $d["nama"] ?>"><?php echo $d["nama"] ?></option>
                  <?php endwhile; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="upload">Upload Gambar</label>
                <input type="file" class="form-control-file" id="upload" name="gambar" required>
              </div>
              <div class="form-group">
                <label for="pesan">Pesan</label>
                <textarea class="form-control" name="pesan" id="pesan" rows="3" required></textarea>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6 text-center">
        <img src="../img/karyawan_illustration.png" alt="ilustrasi" class="illustration">
        <h3 class="text-muted">Work hard, Play Hard</h3>
      </div>
    </div>
  </div>
  <!-- End of Content -->

  <!-- Footer -->
  <footer class="text-center py-3 bg-light">
    &copy; Will 2020. All rights reserved.
  </footer>
  <!-- End of Footer -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
      console.log("test");
      setInterval(timestamp, 1000);
    });

    function timestamp() {
      $.ajax({
        url: 'http://localhost/absensi_karyawan/karyawan/timestamp.php',
        success: function(data) {
          $('#timestamp').html(data);
        },
      });
    }
  </script>
</body>

</html>