<?php
session_start();

if ($_SESSION["status"] !== "karyawan") {
  header("Location: ../index.php?msg=notlogin");
}

require('../koneksi.php');

$id = $_SESSION["id"];
$nama = $_SESSION["name"];
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
        <ul class="navbar-nav mr-auto align-items-center">
          <li>
            <a href="index.php" class="text-white py-3 px-3 rounded"><i class="fas fa-chevron-left mr-1"></i> Back</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto align-items-center">
          <li class="nav-item mr-4">
            <p class="font-weight-bold lead mt-3">Halo, <?php echo $nama; ?></p>
          </li>
          <li class="nav-item">
            <a class="nav-link btn mr-4 text-white" href="pengaturan.php">
              Pengaturan Akun
            </a>
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
  <div class="container my-4">
    <h3 class="text-center">Ubah data karyawan</h3>
    <form action="edit_akun.php" method="POST" enctype="multipart/form-data">
      <?php
      $data = mysqli_query($koneksi, "SELECT id, nama, jenis_kelamin, no_ktp, email, no_telp, alamat, foto FROM karyawan WHERE id = $id");
      while ($d = mysqli_fetch_assoc($data)) :
      ?>
        <input type="hidden" name="id" id="id" value="<?= $d["id"]; ?>">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input required type="text" class="form-control" id="nama" name="nama" value="<?= $d["nama"]; ?>">
        </div>
        <div class="form-group">
          <label for="jenis_kelamin">Jenis Kelamin</label>
          <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
            <option value="L" <?php if ($d["jenis_kelamin"] == "L") echo 'selected'; ?>>Laki-laki</option>
            <option value="P" <?php if ($d["jenis_kelamin"] == "P") echo 'selected'; ?>>Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="no_ktp">No. KTP</label>
          <input required type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?= $d["no_ktp"]; ?>">
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input required type="email" class="form-control" id="email" name="email" value="<?= $d["email"]; ?>">
        </div>
        <div class="form-group">
          <label for="no_telp">No. Telepon</label>
          <input required type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $d["no_telp"]; ?>">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input required type="text" class="form-control" id="alamat" name="alamat" value="<?= $d["alamat"]; ?>">
        </div>
        <div class="form-group">
          <img src="../img/uploaded_img/<?= $d["foto"]; ?>" id="foto" width="150px" class="mb-1">
          <label for="upload" class="d-block">Upload Foto</label>
          <input type="file" class="form-control-file" id="upload" name="foto" required>
        </div>
      <?php endwhile; ?>
      <button type="submit" class="btn btn-primary" name="ubah" id="buttonSubmit">Edit</button>
    </form>
  </div>
  <!-- End of Content -->

  <!-- Footer -->
  <footer class="text-center mt-5 py-3 bg-light">
    &copy; Will 2020. All rights reserved.
  </footer>
  <!-- End of Footer -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>