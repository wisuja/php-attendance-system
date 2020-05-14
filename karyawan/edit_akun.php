<?php

require('../koneksi.php');

if (isset($_POST["ubah"])) {
  $id = $_POST["id"];
  $nama = $_POST["nama"];
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $no_telp = $_POST["no_telp"];
  $email = $_POST["email"];
  $no_ktp = $_POST["no_ktp"];
  $alamat = $_POST["alamat"];
  $foto = $_FILES["foto"]["name"];

  $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
  $x = explode('.', $foto);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];
  $angka_acak     = rand(1, 999);
  $nama_foto_baru = $angka_acak . '-' . $foto;

  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, '../img/uploaded_img/' . $nama_foto_baru);

    mysqli_query($koneksi, "UPDATE karyawan SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', no_telp = '$no_telp', email = '$email', no_ktp = '$no_ktp', alamat = '$alamat', foto = '$nama_foto_baru' WHERE id = $id");

    if (mysqli_affected_rows($koneksi) > 0) {
      echo "<script>
              alert('Ubah data berhasil');
              window.location = 'index.php'
            </script>";
    } else {
      echo "<script>
              alert('Ubah data gagal');
              window.location = 'index.php'
            </script>";
    }
  } else {
    echo "<script>
            alert('Ekstensi gambar yang boleh hanya jpg atau png.');
            window.location='index.php';
        </script>";
  }
}
