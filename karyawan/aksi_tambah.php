<?php
session_start();

date_default_timezone_set('Asia/Jakarta');

require '../koneksi.php';

$nama_karyawan = $_SESSION["nama"];
$lokasi = $_POST["lokasi"];
$gambar = $_FILES["gambar"]["name"];
$pesan = $_POST["pesan"];
$tipe = $_POST["tipe_absen"];
$waktu = date('Y-m-d H:i:s');
$y = explode(" ", $waktu);
$jam = $y[1];

$jam_absen_pagi = "08:00:00";
$jam_absen_sore = "17:00:00";

if ($tipe == 2 && $jam < $jam_absen_sore) {
  echo "<script>
          alert('Absen pulang jam 5 sore ya.');
          window.location='index.php';
        </script>";
  return;
}

$terlambat = 2;

if ($jam > $jam_absen_pagi) {
  $terlambat = 1;
}

$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
$x = explode('.', $gambar);
$ekstensi = strtolower(end($x));
$file_tmp = $_FILES['gambar']['tmp_name'];
$angka_acak     = rand(1, 999);
$nama_gambar_baru = $angka_acak . '-' . $gambar;

if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
  move_uploaded_file($file_tmp, '../img/uploaded_img/' . $nama_gambar_baru);
  $query = "INSERT INTO absensi (nama_karyawan, waktu, lokasi, pesan, gambar, tipe_absen, hadir) VALUES ('$nama_karyawan', '$waktu', '$lokasi', '$pesan', '$nama_gambar_baru', $tipe, $terlambat)";
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
