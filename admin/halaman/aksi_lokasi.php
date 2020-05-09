<?php
require('../../koneksi.php');

if (isset($_POST["tambah"])) {
  $lokasi = $_POST["lokasi"];

  mysqli_query($koneksi, "INSERT INTO lokasi VALUES ('', '$lokasi')");

  if (mysqli_affected_rows($koneksi) > 0) {
    echo "<script>
            alert('Tambah lokasi berhasil');
            window.location = '../index.php?page=lokasi'
          </script>";
  } else {
    echo "<script>
            alert('Tambah lokasi gagal');
            window.location = '../index.php?page=lokasi'
          </script>";
  }
} else if (isset($_POST["ubah"])) {
  $id = $_POST["id"];
  $lokasi = $_POST["lokasi"];

  mysqli_query($koneksi, "UPDATE lokasi SET nama = '$lokasi' WHERE id = $id");

  if (mysqli_affected_rows($koneksi) > 0) {
    echo "<script>
            alert('Ubah lokasi berhasil');
            window.location = '../index.php?page=lokasi'
          </script>";
  } else {
    echo "<script>
            alert('Ubah lokasi gagal');
            window.location = '../index.php?page=lokasi'
          </script>";
  }
} else if (isset($_POST["hapus"])) {
  $id = $_POST["id"];

  mysqli_query($koneksi, "DELETE FROM lokasi WHERE id = $id");

  if (mysqli_affected_rows($koneksi) > 0) {
    $msg = "Hapus data berhasil";
    echo json_encode($msg);
  } else {
    $msg = "Hapus data gagal";
    echo json_encode($msg);
  }
} else if (isset($_POST["id"])) {
  $id = $_POST["id"];
  $data = mysqli_query($koneksi, "SELECT nama FROM lokasi WHERE id = $id");
  $row = mysqli_fetch_assoc($data);

  echo json_encode($row);
}
