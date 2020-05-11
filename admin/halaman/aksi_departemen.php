<?php
require('../../koneksi.php');

if (isset($_POST["tambah"])) {
  $departemen = $_POST["departemen"];
  $kepala_dept = $_POST["kepala_dept"];

  mysqli_query($koneksi, "INSERT INTO departemen VALUES ('', '$departemen', '$kepala_dept')");

  if (mysqli_affected_rows($koneksi) > 0) {
    echo "<script>
            alert('Tambah departemen berhasil');
            window.location = '../index.php?page=departemen'
          </script>";
  } else {
    echo "<script>
            alert('Tambah departemen gagal');
            window.location = '../index.php?page=departemen'
          </script>";
  }
} else if (isset($_POST["ubah"])) {
  $id = $_POST["id"];
  $departemen = $_POST["departemen"];
  $kepala_dept = $_POST["kepala_dept"];

  mysqli_query($koneksi, "UPDATE departemen SET nama = '$departemen', kepala_dept = '$kepala_dept' WHERE id = $id");

  if (mysqli_affected_rows($koneksi) > 0) {
    echo "<script>
            alert('Ubah departemen berhasil');
            window.location = '../index.php?page=departemen'
          </script>";
  } else {
    echo "<script>
            alert('Ubah departemen gagal');
            window.location = '../index.php?page=departemen'
          </script>";
  }
} else if (isset($_POST["hapus"])) {
  $id = $_POST["id"];

  mysqli_query($koneksi, "DELETE FROM departemen WHERE id = $id");

  $msg;

  if (mysqli_affected_rows($koneksi) > 0) {
    $msg = "Hapus data berhasil";
  } else {
    $msg = "Hapus data gagal";
  }
  echo json_encode($msg);
} else if (isset($_POST["id"])) {
  $id = $_POST["id"];
  $data = mysqli_query($koneksi, "SELECT * FROM departemen WHERE id = $id");
  $row = mysqli_fetch_assoc($data);

  echo json_encode($row);
}
