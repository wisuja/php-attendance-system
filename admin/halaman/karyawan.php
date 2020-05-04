<div class="row mt-4">
  <div class="col-12">
    <a href="" class="btn btn-success float-right" data-toggle="modal" data-target="#modal"><i class="mr-1 fas fa-user-plus"></i>Tambah Karyawan</a>
  </div>
</div>
<div class="row mt-4">
  <div class="col-12 ">
    <div class="card h-100">
      <div class="card-body table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" class="align-middle">No</th>
              <th scope="col" class="align-middle">Nama</th>
              <th scope="col" class="align-middle">Jenis Kelamin</th>
              <th scope="col" class="align-middle">No KTP</th>
              <th scope="col" class="align-middle">Email</th>
              <th scope="col" class="align-middle">No Telepon</th>
              <th scope="col" class="align-middle">Jabatan</th>
              <th scope="col" class="align-middle">Departemen</th>
              <th scope="col" class="align-middle">Shift</th>
              <th scope="col" class="align-middle">Gaji</th>
              <th scope="col" class="align-middle w-25">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            $data = mysqli_query($koneksi, "SELECT K.*, S.shift, D.nama AS departemen FROM karyawan AS K INNER JOIN shift AS S ON K.id_shift = S.id INNER JOIN departemen AS D ON K.id_departemen = D.id");
            while ($d = mysqli_fetch_assoc($data)) { ?>
              <tr>
                <th class="align-middle" scope="row"><?php echo $i ?></th>
                <td class="align-middle"><?php echo $d["nama"] ?></td>
                <td class="align-middle"><?php
                                          switch ($d["jenis_kelamin"]) {
                                            case "L":
                                              echo "Laki-laki";
                                              break;
                                            case "P":
                                              echo "Perempuan";
                                              break;
                                          }
                                          ?></td>
                <td class="align-middle"><?php echo $d["no_ktp"] ?></td>
                <td class="align-middle"><?php echo $d["email"] ?></td>
                <td class="align-middle"><?php echo $d["no_telp"] ?></td>
                <td class="align-middle"><?php echo $d["jabatan"] ?></td>
                <td class="align-middle"><?php echo $d["departemen"] ?></td>
                <td class="align-middle"><?php echo $d["shift"] ?></td>
                <td class="align-middle"><?php echo $d["gaji"] ?></td>
                <td class="align-middle w-25">
                  <a href="#" class="btn btn-primary my-2 btn-block">Lihat</a>
                  <a href="#" class="btn btn-warning my-2 btn-block text-white">Ubah</a>
                  <a href="#" class="btn btn-danger my-2 btn-block">Hapus</a>
                </td>
              </tr>
            <?php
              $i++;
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Tambah Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
        <form>
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
            <input required type="number" class="form-control" id="no_ktp" name="no_ktp">
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input required type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="no_telp">No. Telepon</label>
            <input required type="text" class="form-control" id="no_telp" name="no_telp">
          </div>
          <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input required type="text" class="form-control" id="jabatan" name="jabatan">
          </div>
          <div class="form-group">
            <label for="departemen">Departemen</label>
            <select class="form-control" id="departemen" name="departemen">
              <option value="1">Sales</option>
            </select>
          </div>
          <div class="form-group">
            <label for="shift">Shift</label>
            <select class="form-control" id="shift" name="shift">
              <option value="1">Pagi</option>
              <option value="2">Sore</option>
            </select>
          </div>
          <div class="form-group">
            <label for="gaji">Gaji</label>
            <input required type="number" class="form-control" id="gaji" name="gaji">
          </div>
          <button type="submit" class="btn btn-success">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>