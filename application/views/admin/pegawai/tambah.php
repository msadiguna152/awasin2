  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?= ucwords($this->session->userdata('menu')); ?></a></li>
              <li class="breadcrumb-item active"><?= ucwords($this->session->userdata('aksi')); ?> <?= ucwords($this->session->userdata('menu')); ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title mt-1">Tambah Data <?= ucwords($this->session->userdata('menu')); ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form role="form" enctype="multipart/form-data" action="<?= site_url('admin/Pegawai/insert_proses');?>" method="post">
                <div class="row">
                  <div class="col-lg-1">
                  </div>

                  <div class="col-lg-10">
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">NIP Pegawai</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" autofocus id="" name="nip" placeholder="Masukan NIP Pegawai" required="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Nama Pegawai</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="" name="nama_pegawai" placeholder="Masukan Nama Pegawai" required="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-8">
                        <select class="form-control select2" style="width: 100%;" id="" name="jenis_kelamin" data-placeholder="Pilih Jenis Kelamin" required="">
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Jabatan</label>
                      <div class="col-sm-8">
                        <select class="form-control select2" onchange="get_kd()" style="width: 100%;" id="id_jabatan" name="id_jabatan" data-placeholder="Pilih Jabatan" required="">
                          <option value="">Pilih Jabatan</option>
                          <?php foreach ($jabatan->result() as $data) : ?>
                            <option value="<?= $data->id_jabatan?>"><?= $data->nama_jabatan?></option>
                          <?php endforeach;?>
                        </select>
                        <input type="text" hidden id="kd_jabatan" name="kd_jabatan">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Golongan</label>
                      <div class="col-sm-8">
                        <select class="form-control select2" style="width: 100%;" id="" name="id_golongan" data-placeholder="Pilih Golongan" required="">
                          <option value="">Pilih Golongan</option>
                          <?php foreach ($golongan->result() as $data) : ?>
                            <option value="<?= $data->id_golongan?>"><?= $data->nama_golongan?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Tempat Lahir</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="" name="tempat_lahir" placeholder="Masukan Tempat Lahir" required="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-8">
                        <input type="date" class="form-control" id="" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir" required="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" id="" name="alamat" placeholder="Masukan Alamat" required=""></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">No. HP</label>
                      <div class="col-sm-8">
                        <input type="text" onkeypress="return hanyaAngka2(event)" class="form-control" id="" name="no_hp" placeholder="Masukan No. HP" required="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Unit Kerja</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="" name="unit_kerja" value="Pengadilan Negeri Cikarang Kelas II" placeholder="Masukan Unit Kerja" required="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-8">
                        <select class="form-control select2" style="width: 100%;" id="" name="status" data-placeholder="Pilih Status" required="">
                          <option value="">Pilih Status</option>
                          <option value="Aktif">Aktif</option>
                          <option value="Non Aktif">Non Aktif</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2"></label>
                      <div class="col-sm-2 m-1">
                        <button type="submit" name="simpan" class="btn btn-info btn-sm btn-block" >Simpan</button>
                      </div>
                      <div class="col-sm-2 m-1">
                        <button type="reset" name="reset" class="btn btn-danger btn-sm btn-block">Batal</button>
                      </div>
                    </div>
                  </div>

                </div>
            </form>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">

          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript">
  function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image-source").files[0]);
    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>

<script type="text/javascript">
  function get_kd() {
    var get_id_jabatan = document.getElementById('id_jabatan').value;
    var get_kd_jabatan = "";
    <?php 
      $query = $this->db->query("SELECT * from jabatan");
      foreach ($query->result() as $kd):
        $kd_jabatan = $kd->kd_jabatan
    ?>
    if (get_id_jabatan==<?= $kd->id_jabatan;?>){
      document.getElementById("kd_jabatan").value="<?=$kd_jabatan;?>";
    };
    <?php endforeach;?>
  }
</script>
