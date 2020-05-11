<?php
require('../../koneksi.php');

if (isset($_POST["tambah"])) {
  $nama = $_POST["nama"];
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $no_telp = $_POST["no_telp"];
  $email = $_POST["email"];
  $no_ktp = $_POST["no_ktp"];
  $alamat = $_POST["alamat"];
  $gaji = $_POST["gaji"];
  $shift = $_POST["shift"];
  $departemen = $_POST["departemen"];

  mysqli_query($koneksi, "INSERT INTO karyawan VALUES ('', '$nama', '$jenis_kelamin', '$no_telp', '$email', '$no_ktp', '$alamat', $gaji, $shift, $departemen)");

  if (mysqli_affected_rows($koneksi) > 0) {
    echo "<script>
            alert('Tambah karyawan berhasil');
            window.location = '../index.php?page=karyawan'
          </script>";
  } else {
    echo "<script>
            alert('Tambah karyawan gagal');
            window.location = '../index.php?page=karyawan'
          </script>";
  }
} else if (isset($_POST["ubah"])) {
  $id = $_POST["id"];
  $nama = $_POST["nama"];
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $no_telp = $_POST["no_telp"];
  $email = $_POST["email"];
  $no_ktp = $_POST["no_ktp"];
  $alamat = $_POST["alamat"];
  $gaji = $_POST["gaji"];
  $shift = $_POST["shift"];
  $departemen = $_POST["departemen"];

  mysqli_query($koneksi, "UPDATE karyawan SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', no_telp = '$no_telp', email = '$email', no_ktp = '$no_ktp', alamat = '$alamat', gaji = $gaji, id_shift = $shift, id_departemen = $departemen WHERE id = $id");

  if (mysqli_affected_rows($koneksi) > 0) {
    echo "<script>
            alert('Ubah karyawan berhasil');
            window.location = '../index.php?page=karyawan'
          </script>";
  } else {
    echo "<script>
            alert('Ubah karyawan gagal');
            window.location = '../index.php?page=karyawan'
          </script>";
  }
} else if (isset($_POST["hapus"])) {
  $id = $_POST["id"];

  mysqli_query($koneksi, "DELETE FROM karyawan WHERE id = $id");

  $msg;

  if (mysqli_affected_rows($koneksi) > 0) {
    $msg = "Hapus data berhasil";
  } else {
    $msg = "Hapus data gagal";
  }
  echo json_encode($msg);
} else if (isset($_POST["id"])) {
  $id = $_POST["id"];
  $data = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id = $id");
  $row = mysqli_fetch_assoc($data);

  echo json_encode($row);
}
