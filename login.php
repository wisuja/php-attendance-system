<?php
session_start();

require("koneksi.php");

$username = $_POST["username"];
$password = $_POST["password"];

$data = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

if (mysqli_num_rows($data) < 1) {
  header("Location: index.php?msg=failed");
}

while ($d = mysqli_fetch_array($data)) {
  $_SESSION["username"] = $username;
  $_SESSION["status"] = "admin";
  header("Location: admin/index.php");
}
