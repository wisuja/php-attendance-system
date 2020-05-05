<?php
session_start();

require("koneksi.php");

$username = $_POST["username"];
$password = $_POST["password"];

$data = mysqli_query($koneksi, "SELECT account_type FROM user WHERE username = '$username' AND password = '$password'");

if (mysqli_num_rows($data) < 1) {
  header("Location: index.php?msg=failed");
}

while ($d = mysqli_fetch_array($data)) {
  if ($d["account_type"] == 1) {
    $_SESSION["username"] = $username;
    $_SESSION["status"] = "admin";
    header("Location: admin/index.php");
  } else if ($d["account_type"] == 2) {
    $_SESSION["username"] = $username;
    $_SESSION["status"] = "karyawan";
    header("Location: karyawan/index.php");
  }
}
