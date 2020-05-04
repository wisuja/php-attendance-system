<?php
// $koneksi = mysqli_connect("sql100.epizy.com", "epiz_25454008", "gy1wEtU6uAHgq", "epiz_25454008_db_absensi_karyawan");
$koneksi = mysqli_connect("localhost", "root", "", "db_absensi_karyawan");

if (mysqli_connect_errno() > 0) {
  echo "Connection to database failed: " . mysqli_connect_error();
}
