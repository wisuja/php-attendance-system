<?php
require('../../koneksi.php');

if (isset($_POST["tambah"])) {
  $password = $_POST["password"];
  if (empty($password)) {
    echo "<script>
            alert('Password tidak boleh kosong!');
            window.location = '../index.php?page=karyawan'
          </script>";
    return;
  }

  $username = $_POST["username"];
  $nama = $_POST["nama"];
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $no_telp = $_POST["no_telp"];
  $email = $_POST["email"];
  $no_ktp = $_POST["no_ktp"];
  $alamat = $_POST["alamat"];
  $foto = $_FILES["foto"]["name"];
  $shift = $_POST["shift"];
  $departemen = $_POST["departemen"];

  $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
  $x = explode('.', $foto);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];
  $angka_acak     = rand(1, 999);
  $nama_foto_baru = $angka_acak . '-' . $foto;

  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, '../../img/uploaded_img/' . $nama_foto_baru);

    mysqli_query($koneksi, "INSERT INTO karyawan VALUES ('','$username', '$password', 2, '$nama', '$jenis_kelamin', '$no_telp', '$email', '$no_ktp', '$alamat', '$nama_foto_baru', $shift, $departemen)");

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
  } else {
    echo "<script>
            alert('Ekstensi gambar yang boleh hanya jpg atau png.');
            window.location='../index.php?page=karyawan';
        </script>";
  }
} else if (isset($_POST["ubah"])) {
  $id = $_POST["id"];
  $username = $_POST["username"];
  $nama = $_POST["nama"];
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $no_telp = $_POST["no_telp"];
  $email = $_POST["email"];
  $no_ktp = $_POST["no_ktp"];
  $alamat = $_POST["alamat"];
  $foto = $_FILES["foto"]["name"];
  $shift = $_POST["shift"];
  $departemen = $_POST["departemen"];

  $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
  $x = explode('.', $foto);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];
  $angka_acak     = rand(1, 999);
  $nama_foto_baru = $angka_acak . '-' . $foto;

  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, '../../img/uploaded_img/' . $nama_foto_baru);

    mysqli_query($koneksi, "UPDATE karyawan SET username = '$username', nama = '$nama', jenis_kelamin = '$jenis_kelamin', no_telp = '$no_telp', email = '$email', no_ktp = '$no_ktp', alamat = '$alamat', foto = '$nama_foto_baru', id_shift = $shift, id_departemen = $departemen WHERE id = $id");

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
  } else {
    echo "<script>
            alert('Ekstensi gambar yang boleh hanya jpg atau png.');
            window.location='../index.php?page=karyawan';
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
