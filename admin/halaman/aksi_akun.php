<?php
require('../../koneksi.php');

if (isset($_POST["tambah"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $accountType = $_POST["account_type"];

  mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$username', '$password', $accountType)");

  if (mysqli_affected_rows($koneksi) > 0) {
    echo "<script>
            alert('Tambah akun berhasil');
            window.location = '../index.php?page=akun'
          </script>";
  } else {
    echo "<script>
            alert('Tambah akun gagal');
            window.location = '../index.php?page=akun'
          </script>";
  }
} else if (isset($_POST["ubah"])) {
  $id = $_POST["id"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $accountType = $_POST["account_type"];

  mysqli_query($koneksi, "UPDATE user SET username = '$username', password = '$password', account_type = $accountType WHERE id = $id");

  if (mysqli_affected_rows($koneksi) > 0) {
    echo "<script>
            alert('Ubah akun berhasil');
            window.location = '../index.php?page=akun'
          </script>";
  } else {
    echo "<script>
            alert('Ubah akun gagal');
            window.location = '../index.php?page=akun'
          </script>";
  }
} else if (isset($_POST["hapus"])) {
  $id = $_POST["id"];

  mysqli_query($koneksi, "DELETE FROM user WHERE id = $id");

  $msg;

  if (mysqli_affected_rows($koneksi) > 0) {
    $msg = "Hapus data berhasil";
  } else {
    $msg = "Hapus data gagal";
  }
  echo json_encode($msg);
} else if (isset($_POST["id"])) {
  $id = $_POST["id"];
  $data = mysqli_query($koneksi, "SELECT username, account_type FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($data);

  echo json_encode($row);
}
