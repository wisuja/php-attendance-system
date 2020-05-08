<?php
$data = mysqli_query($koneksi, "SELECT * FROM absensi WHERE waktu >= CURDATE()");
$jumlah_absen_hari_ini = mysqli_num_rows($data);

$data = mysqli_query($koneksi, "SELECT * FROM absensi WHERE waktu >= CURDATE() - INTERVAL 1 DAY AND waktu < CURDATE()");
$jumlah_absen_kemarin = mysqli_num_rows($data);

$data = mysqli_query($koneksi, "SELECT * FROM absensi WHERE waktu >= CURDATE() - INTERVAL 2 DAY AND waktu < CURDATE() - INTERVAL 1 DAY");
$jumlah_absen_dua_hari_yang_lalu = mysqli_num_rows($data);

?>
<div class="row">
  <div class="col-12">
    <div class="card" style="width: 100%;">
      <div class="card-body bg-dark text-white">
        <h3 class="card-title">Dashboard</h3>
      </div>
    </div>
  </div>
</div>
<div class="row mt-2">
  <div class="col-12">
    <div class="card" style="width: 100%;">
      <div class="card-body">
        <h3 class="card-title text-center">Grafik Absensi</h3>
        <div style="width: 100%;margin: 0px auto;">
          <canvas id="chartAbsensi"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-2 mb-5">
  <div class="col-12">
    <div class="card" style="width: 100%;">
      <div class="card-body table-responsive">
        <h3 class="card-title text-center mb-3">Daftar Kehadiran</h3>
        <?php
        $i = 1;
        $data = mysqli_query($koneksi, "SELECT nama_karyawan, waktu FROM absensi ORDER BY waktu DESC LIMIT 10");
        ?>
        <table class="table table-hover text-center">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Waktu</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($d = mysqli_fetch_assoc($data)) :
            ?>
              <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $d["nama_karyawan"] ?></td>
                <td><?= $d["waktu"] ?></td>
              </tr>
            <?php
              $i++;
            endwhile;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<script>
  var ctx = document.getElementById("chartAbsensi").getContext('2d');
  var chartAbsensi = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Dua hari yang lalu", "Kemarin", "Hari ini"],
      datasets: [{
        label: 'Data Absensi',
        data: [
          <?php
          echo $jumlah_absen_dua_hari_yang_lalu;
          ?>,
          <?php
          echo $jumlah_absen_kemarin;
          ?>,
          <?php
          echo $jumlah_absen_hari_ini;
          ?>
        ],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>