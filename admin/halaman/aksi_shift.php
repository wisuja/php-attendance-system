<?php
require('../../koneksi.php');

if (isset($_POST["tambah"])) {
  $nama_shift = $_POST["shift"];
  $jam_mulai = $_POST["jam_mulai"];
  $jam_berakhir = $_POST["jam_berhenti"];

  mysqli_query($koneksi, "INSERT INTO shift VALUES ('', '$nama_shift', '$jam_mulai', '$jam_berakhir')");

  if (mysqli_affected_rows($koneksi) > 0) {
    echo "<script>
            alert('Tambah shift berhasil');
            window.location = '../index.php?page=shift'
          </script>";
  } else {
    echo "<script>
            alert('Tambah shift gagal');
            window.location = '../index.php?page=shift'
          </script>";
  }
} else if (isset($_POST["ubah"])) {
  $id = $_POST["id"];
  $shift = $_POST["shift"];
  $jam_mulai = $_POST["jam_mulai"];
  $jam_berhenti = $_POST["jam_berhenti"];

  mysqli_query($koneksi, "UPDATE shift SET shift = '$shift', jam_mulai = '$jam_mulai', jam_berhenti = '$jam_berhenti' WHERE id = $id");

  if (mysqli_affected_rows($koneksi) > 0) {
    echo "<script>
            alert('Ubah shift berhasil');
            window.location = '../index.php?page=shift'
          </script>";
  } else {
    echo "<script>
            alert('Ubah shift gagal');
            window.location = '../index.php?page=shift'
          </script>";
  }
} else if (isset($_POST["hapus"])) {
  $id = $_POST["id"];

  mysqli_query($koneksi, "DELETE FROM shift WHERE id = $id");

  if (mysqli_affected_rows($koneksi) > 0) {
    $msg = "Hapus data berhasil";
    echo json_encode($msg);
  } else {
    $msg = "Hapus data gagal";
    echo json_encode($msg);
  }
} else if (isset($_POST["id"])) {
  $id = $_POST["id"];
  $data = mysqli_query($koneksi, "SELECT shift, jam_mulai, jam_berhenti FROM shift WHERE id = $id");
  $row = mysqli_fetch_assoc($data);

  echo json_encode($row);
}
