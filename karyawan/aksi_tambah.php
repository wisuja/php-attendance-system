<?php
session_start();

require '../koneksi.php';

$nama_karyawan = $_SESSION["username"];
$lokasi = $_POST["lokasi"];
$gambar = $_FILES["gambar"]["name"];
$pesan = $_POST["pesan"];
$waktu = date('Y-m-d H:i:s');

$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
$x = explode('.', $gambar);
$ekstensi = strtolower(end($x));
$file_tmp = $_FILES['gambar']['tmp_name'];
$angka_acak     = rand(1, 999);
$nama_gambar_baru = $angka_acak . '-' . $gambar;

if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
  move_uploaded_file($file_tmp, '../img/uploaded_img/' . $nama_gambar_baru);
  $query = "INSERT INTO absensi (nama_karyawan, waktu, lokasi, pesan, gambar) VALUES ('$nama_karyawan', '$waktu', '$lokasi', '$pesan', '$nama_gambar_baru')";
  $result = mysqli_query($koneksi, $query);
  if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
  } else {
    echo "<script>
              alert('Absen berhasil.');
              window.location='index.php';
          </script>";
  }
} else {
  echo "<script>
            alert('Ekstensi gambar yang boleh hanya jpg atau png.');
            window.location='index.php';
        </script>";
}
