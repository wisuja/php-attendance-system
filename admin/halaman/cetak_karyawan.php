<?php

require('../../koneksi.php');
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
    $i = 1;
    $data = mysqli_query($koneksi, "SELECT K.*, S.shift, D.nama AS departemen, D.kepala_dept FROM karyawan AS K INNER JOIN shift AS S ON K.id_shift = S.id INNER JOIN departemen AS D ON K.id_departemen = D.id");

  ?>
    <h3 class="text-center">Data Karyawan</h3>
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col-12">
          <table class="table table-hover text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">No KTP</th>
                <th scope="col">Email</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Alamat</th>
                <th scope="col">Departemen</th>
                <th scope="col">Shift</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($d = mysqli_fetch_assoc($data)) :
              ?>
                <tr>
                  <th scope="row"><?= $i ?></th>
                  <td><?php echo $d["username"] ?></td>
                  <td>
                    <?php
                    if ($d["nama"] == $d["kepala_dept"]) {
                      echo $d["nama"] . "⭐";
                    } else {
                      echo $d["nama"];
                    }
                    ?>
                  </td>
                  <td><?php
                      switch ($d["jenis_kelamin"]) {
                        case "L":
                          echo "Laki-laki";
                          break;
                        case "P":
                          echo "Perempuan";
                          break;
                      }
                      ?></td>
                  <td><?php echo $d["no_ktp"] ?></td>
                  <td><?php echo $d["email"] ?></td>
                  <td><?php echo $d["no_telp"] ?></td>
                  <td><?php echo $d["alamat"] ?></td>
                  <td><?php echo $d["departemen"] ?></td>
                  <td><?php echo $d["shift"] ?></td>
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