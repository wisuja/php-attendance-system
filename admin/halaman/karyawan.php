<div class="row">
  <div class="col-12">
    <div class="card" style="width: 100%;">
      <div class="card-body bg-dark text-white">
        <h3 class="card-title">Daftar Karyawan</h3>
      </div>
    </div>
  </div>
</div>
<div class="row mt-2 mb-5">
  <div class="col-12">
    <div class="card" style="width: 100%;">
      <div class="card-body table-responsive">
        <?php
        $i = 1;
        $data = mysqli_query($koneksi, "SELECT K.*, S.shift, D.nama AS departemen, D.kepala_dept FROM karyawan AS K INNER JOIN shift AS S ON K.id_shift = S.id INNER JOIN departemen AS D ON K.id_departemen = D.id");
        ?>
        <a href="#" class="btn btn-outline-dark float-right mb-3 tambah-btn" data-toggle="modal" data-target="#formModal" onclick="changeType('tambah')">
          <i class="fas fa-plus mr-2"></i>Tambah
        </a>
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
              <th scope="col">Aksi</th>
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
                <td>
                  <a href="" class="btn edit-btn" data-id="<?php echo $d["id"]; ?>" data-toggle="modal" data-target="#formModal" onclick="changeType('ubah');">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="" class="btn hapus-btn" data-id="<?php echo $d["id"]; ?>">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </td>
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

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="halaman/aksi_karyawan.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="username">Username</label>
            <input required type="text" class="form-control" id="username" name="username">
          </div>
          <div class="form-group">
            <label for="password" id="label_password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input required type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="no_ktp">No. KTP</label>
            <input required type="text" class="form-control" id="no_ktp" name="no_ktp">
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input required type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="no_telp">No. Telepon</label>
            <input required type="text" class="form-control" id="no_telp" name="no_telp">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input required type="text" class="form-control" id="alamat" name="alamat">
          </div>
          <div class="form-group">
            <img src="" alt="" id="foto" width="120px" class="mb-1">
            <label for="upload" class="d-block">Upload Foto</label>
            <input type="file" class="form-control-file" id="upload" name="foto" required>
          </div>
          <div class="form-group">
            <label for="departemen">Departemen</label>
            <select class="form-control" id="departemen" name="departemen">
              <?php
              $data = mysqli_query($koneksi, "SELECT id, nama FROM departemen");
              while ($d = mysqli_fetch_assoc($data)) :
              ?>
                <option value="<?php echo $d["id"]; ?>"><?php echo $d["nama"] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="shift">Shift</label>
            <select class="form-control" id="shift" name="shift">
              <?php
              $data = mysqli_query($koneksi, "SELECT id, shift FROM shift");
              while ($d = mysqli_fetch_assoc($data)) :
              ?>
                <option value="<?php echo $d["id"]; ?>"><?php echo $d["shift"] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="tambah" id="buttonSubmit">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $(".tambah-btn").on("click", function() {
      $("#username").val("");
      $("#label_password").show();
      $("#password").show();
      $("#password").val("");
      $("#nama").val("");
      $("#no_ktp").val("");
      $("#email").val("");
      $("#no_telp").val("");
      $("#alamat").val("");
      $("#upload").val("");
      $("#foto").attr("src", "");
      $("#foto").hide();
    });

    $(".edit-btn").on("click", function() {
      var id = $(this).data("id");
      $("#id").val(id);

      $.ajax({
        url: 'halaman/aksi_karyawan.php',
        type: 'POST',
        dataType: 'json',
        data: ({
          id: id
        }),
        success: function(data) {
          $("#username").val(data.username);
          $("#label_password").hide();
          $("#password").hide();
          $("#password").val("");
          $("#nama").val(data.nama);
          $("#jenis_kelamin").val(data.jenis_kelamin);
          $("#no_ktp").val(data.no_ktp);
          $("#email").val(data.email);
          $("#no_telp").val(data.no_telp);
          $("#alamat").val(data.alamat);
          $("#foto").show();
          $("#foto").attr("src", "../img/uploaded_img/" + data.foto);
          $("#shift").val(data.id_shift);
          $("#departemen").val(data.id_departemen);
        }
      })
    })

    $(".hapus-btn").on("click", function() {
      if (confirm('Anda yakin untuk menghapus data ini?')) {
        var id = $(this).data("id");
        $.ajax({
          url: 'halaman/aksi_karyawan.php',
          type: 'POST',
          dataType: 'json',
          data: ({
            hapus: "",
            id: id
          }),
          success: function(data) {
            alert(data);
          },
          error: function(error) {
            alert(data);
          }
        })
      }
    })
  });

  function changeType(_type) {
    var modalTitle = document.getElementById("formModalLabel");
    var buttonSubmit = document.getElementById("buttonSubmit");

    switch (_type) {
      case 'tambah':
        modalTitle.innerHTML = "Tambah Karyawan";
        buttonSubmit.innerHTML = "Tambah";
        buttonSubmit.name = "tambah";
        break;
      case 'ubah':
        modalTitle.innerHTML = "Edit Karyawan";
        buttonSubmit.innerHTML = "Edit";
        buttonSubmit.name = "ubah";
        break;
    }
  }
</script>