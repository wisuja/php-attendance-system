<?php

require('../../koneksi.php');

if (isset($_POST["cetak"])) :
  $dari = $_POST["dari"];
  $sampai = $_POST["sampai"];

  $i = 1;
  $data = mysqli_query($koneksi, "SELECT nama_karyawan, lokasi, waktu, pesan, tipe_absen, hadir FROM absensi WHERE waktu >= '$dari' AND waktu <= '$sampai'");
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
    <h3 class="text-center">Laporan Absensi</h3>
    <p class="text-center">Tanggal <?php echo $dari . "-" . $sampai; ?></p>
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col-12">
          <table class="table table-hover text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Waktu</th>
                <th scope="col">Pesan</th>
                <th scope="col">Absen</th>
                <th scope="col">Hadir/Terlambat/Overtime/Tidak Hadir</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($d = mysqli_fetch_assoc($data)) :
              ?>
                <tr>
                  <th scope="row"><?= $i ?></th>
                  <td><?= $d["nama_karyawan"] ?></td>
                  <td><?= $d["lokasi"] ?></td>
                  <td>
                    <?php
                    if ($d["tipe_absen"] == 1 && $d["hadir"] == 1) {
                      echo "<p class='text-danger'>" . $d["waktu"] . "</p>";
                    } else {
                      echo $d["waktu"];
                    }
                    ?>
                  </td>
                  <td><?= $d["pesan"] ?></td>
                  <td>
                    <?php
                    if ($d["tipe_absen"] == 0) {
                      echo "-";
                    } else if ($d["tipe_absen"] == 1) {
                      echo "Datang";
                    } else if ($d["tipe_absen"] == 2) {
                      echo "Pulang";
                    }
                    ?>
                  </td>
                  <td>
                    <?php
                    if ($d["hadir"] == 0) {
                      echo "Tidak Hadir";
                    } else if ($d["hadir"] == 1) {
                      echo "Terlambat";
                    } else if ($d["hadir"] == 2) {
                      echo "Hadir";
                    } else if ($d["hadir"] == 3) {
                      echo "Overtime";
                    }
                    ?>
                  </td>
                </tr>
              <?php
                $i++;
              endwhile;
              ?>
            </tbody>
          </table>
          <form action="halaman/cetak.php" method="POST">
            <input type="hidden" value="<?php echo $dari; ?>" name="dari">
            <input type="hidden" value="<?php echo $sampai; ?>" name="sampai">
            <button type="submit" class="btn btn-outline-dark float-right" name="cetak"><i class="fas fa-print mr-2"></i>Cetak</button>
          </form>
        </div>
      </div>
    <?php endif; ?>

    <script>
      window.print();
    </script>
  </body>

  </html>