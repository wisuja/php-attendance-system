<?php
$koneksi = mysqli_connect("localhost", "root", "admin", "db_employee_system");

if (mysqli_connect_errno() > 0) {
  echo "Connection to database failed: " . mysqli_connect_error();
}
