<div class="row mt-3">
  <div class="col-12">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Selamat datang, <?php echo $_SESSION["username"]; ?></h5>
        <p class="card-text">Website ini dibuat sebagai tugas kuliah di mata kuliah Pemrograman Web</p>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <p class="card-text float-left">
          <i class="fas fa-tachometer-alt mr-1"></i>
          <strong>Dashboard</strong>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="row mt-3">
  <div class="col-md-6 text-center">
    <div class="card h-100">
      <div class="card-header">
        <h4>Absen</h4>
      </div>
      <div class="card-body d-flex align-items-center flex-column justify-content-center">
        <?php
        if (isset($_GET["absen"])) {
          $absen = $_GET["absen"];
        } else {
          $absen = "false";
        }
        ?>
        <strong class="card-text mb-3">
          <?php
          if ($absen == "true") {
            echo "Anda sudah absen hari ini.";
          } else {
            echo "Klik tombol di bawah untuk absen";
          }
          ?>

        </strong>
        <a href="index.php?absen=true" class="btn btn-success <?php if ($absen == "true") echo 'disabled' ?>">
          Absen
        </a>
      </div>
    </div>
  </div>
  <div class="col-md-6 text-center">
    <div class="card h-100">
      <div class="card-header">
        <h4>Pengunjung Website</h4>
      </div>
      <div class="card-body table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Waktu</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>08.00</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>08.00</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>08.00</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4 mb-5">
  <div class="col-12">
    <div class="card text-center">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <?php
          if (isset($_GET["tab"])) {
            $tab = $_GET["tab"];
          } else {
            $tab = "harian";
          }
          ?>
          <li class="nav-item">
            <a class="nav-link <?php if ($tab == "harian") echo 'active' ?>" href="index.php?tab=harian">Harian</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($tab == "mingguan") echo 'active' ?>" href="index.php?tab=mingguan">Mingguan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($tab == "bulanan") echo 'active' ?>" href="index.php?tab=bulanan">Bulanan</a>
          </li>
        </ul>
      </div>
      <div class="card-body table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Hadir</th>
              <th scope="col">Sakit</th>
              <th scope="col">Izin</th>
              <th scope="col">Alfa</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Mark</td>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Mark</td>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>