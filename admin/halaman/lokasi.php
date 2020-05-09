<div class="row">
  <div class="col-12">
    <div class="card" style="width: 100%;">
      <div class="card-body bg-dark text-white">
        <h3 class="card-title">Daftar Lokasi</h3>
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
        $data = mysqli_query($koneksi, "SELECT * FROM lokasi");
        ?>
        <a href="#" class="btn btn-outline-dark float-right mb-3" data-toggle="modal" data-target="#formModal" onclick="changeType('tambah')">
          <i class="fas fa-plus mr-2"></i>Tambah
        </a>
        <table class="table table-hover text-center">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($d = mysqli_fetch_assoc($data)) :
            ?>
              <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $d["nama"] ?></td>
                <td>
                  <a href="" class="btn edit-btn" data-id="<?php echo $d["id"]; ?>" data-toggle="modal" data-target="#formModal" onclick="changeType('ubah');">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="" class="btn hapus-btn" data-id="<?php echo $d["id"]; ?>" onclick="return confirm('Anda yakin untuk menghapus data ini?')">
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
        <h5 class="modal-title" id="formModalLabel">Tambah Lokasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="halaman/aksi_lokasi.php" method="POST">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="lokasi">Nama Lokasi</label>
            <input type="text" class="form-control" id="lokasi" placeholder="Enter location.." name="lokasi" required>
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
    $(".edit-btn").on("click", function() {
      var id = $(this).data("id");
      $("#id").val(id);

      $.ajax({
        url: 'halaman/aksi_lokasi.php',
        type: 'POST',
        dataType: 'json',
        data: ({
          id: id
        }),
        success: function(data) {
          $("#lokasi").val(data.nama);
        }
      })
    })

    $(".hapus-btn").on("click", function() {
      var id = $(this).data("id");

      $.ajax({
        url: 'halaman/aksi_lokasi.php',
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
    })
  });

  function changeType(_type) {
    var modalTitle = document.getElementById("formModalLabel");
    var buttonSubmit = document.getElementById("buttonSubmit");

    switch (_type) {
      case 'tambah':
        modalTitle.innerHTML = "Tambah Lokasi";
        buttonSubmit.innerHTML = "Tambah";
        buttonSubmit.name = "tambah";
        break;
      case 'ubah':
        modalTitle.innerHTML = "Edit Lokasi";
        buttonSubmit.innerHTML = "Edit";
        buttonSubmit.name = "ubah";
        break;
    }
  }
</script>