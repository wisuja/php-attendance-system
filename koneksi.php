<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_absensi_karyawan");

if (mysqli_connect_errno() > 0) {
  echo "Connection to database failed: " . mysqli_connect_error();
}
