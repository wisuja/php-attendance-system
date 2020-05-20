<div class="row">
  <div class="col-12">
    <div class="card" style="width: 100%;">
      <div class="card-body bg-dark text-white">
        <h3 class="card-title">Laporan Absensi</h3>
      </div>
    </div>
  </div>
</div>
<div class="row mt-2 mb-5">
  <div class="col-12">
    <div class="card mb-5" style="width: 100%;">
      <div class="card-body table-responsive">
        <form action="index.php?page=absensi" method="POST">
          <div class="form-group">
            <label for="dari">Dari</label>
            <div class="input-group date" id="dari" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#dari" id="dari" name="dari" required />
              <div class="input-group-append" data-target="#dari" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="sampai">Sampai</label>
            <div class="input-group date" id="sampai" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#sampai" id="sampai" name="sampai" value="" required />
              <div class="input-group-append" data-target="#sampai" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-outline-dark" name="cari" id="buttonSubmit"><i class="fas fa-search mr-2"></i>Cari</button>
        </form>

        <?php
        if (isset($_POST["cari"])) :
          $dari = date('Y-m-d', strtotime($_POST["dari"])) . ' 00:00:00';
          $sampai = date('Y-m-d', strtotime($_POST["sampai"])) . ' 23:59:59';

          $i = 1;
          $data = mysqli_query($koneksi, "SELECT nama_karyawan, lokasi, waktu, pesan, tipe_absen, hadir FROM absensi WHERE waktu >= '$dari' AND waktu <= '$sampai'");
        ?>
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
              <form action="halaman/cetak_absensi.php" method="POST" target="_blank">
                <input type="hidden" value="<?php echo $dari; ?>" name="dari">
                <input type="hidden" value="<?php echo $sampai; ?>" name="sampai">
                <button type="submit" class="btn btn-outline-dark float-right" name="cetak"><i class="fas fa-print mr-2"></i>Cetak</button>
              </form>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#dari').datetimepicker({
      format: 'L'
    });
    $('#sampai').datetimepicker({
      useCurrent: false,
      format: 'L'
    });
    $("#dari").on("change.datetimepicker", function(e) {
      $('#sampai').datetimepicker('minDate', e.date);
    });
    $("#sampai").on("change.datetimepicker", function(e) {
      $('#dari').datetimepicker('maxDate', e.date);
    });
  });
</script>