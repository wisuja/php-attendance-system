<?php
session_start();

require('../koneksi.php');

$nama = $_SESSION["name"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Absensi Karyawan</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/style.css">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</head>

<body>
  <?php
  if (isset($_POST["cetak"])) :
  ?>
    <h3 class="text-center">Laporan Absensi <?php echo $nama; ?></h3>
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col-12">
          <table class="table table-hover text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Waktu</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Pesan</th>
                <th scope="col">Gambar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $data = mysqli_query($koneksi, "SELECT * FROM absensi WHERE nama_karyawan = '$nama' ORDER BY id DESC");
              while ($d = mysqli_fetch_assoc($data)) :
              ?>
                <tr>
                  <th scope="row"><?= $i ?></th>
                  <td><?= $d["waktu"] ?></td>
                  <td><?= $d["lokasi"] ?></td>
                  <td><?= $d["pesan"] ?></td>
                  <td><img src="../img/uploaded_img/<?= $d["gambar"] ?>" alt="" width="75px" alt="not_found"></td>
                </tr>
              <?php
                $i++;
              endwhile;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php endif; ?>

    <script>
      window.print();
    </script>
</body>

</html>