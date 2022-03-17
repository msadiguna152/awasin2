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
            <h3 class="card-title mt-1"><?= ucwords($this->session->userdata('aksi')); ?> Data <?= ucwords($this->session->userdata('menu')); ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-lg-1">
              </div>

              <div class="col-lg-10">
                <div class="form-group row">
                  <label for="" class="col-sm-4">NIP Pegawai</label>
                  <div class="col-sm-8">
                    <label class="text text-muted"><?= $data['nip']?></label>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-4">Nama Pegawai</label>
                  <div class="col-sm-8">
                    <label class="text text-muted"><?= $data['nama_pegawai']?></label>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-4">Jenis Kelamin</label>
                  <div class="col-sm-8">
                    <label class="text text-muted"><?= $data['jenis_kelamin']?></label>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-4">Jabatan</label>
                  <div class="col-sm-8">
                    <label class="text text-muted"><?= $data['nama_jabatan']?></label>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-4">Golongan</label>
                  <div class="col-sm-8">
                    <label class="text text-muted"><?= $data['nama_golongan']?></label>
                  </div>
                </div>


                <div class="form-group row">
                  <label for="" class="col-sm-4">Tempat Tanggal Lahir</label>
                  <div class="col-sm-8">
                    <label class="text text-muted"><?= $data['tempat_lahir']?></label>, <label class="text text-muted"><?= format_indo($data['tanggal_lahir'])?></label>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-4">Alamat</label>
                  <div class="col-sm-8">
                    <label class="text text-muted"><?= $data['alamat']?></label>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-4">No. HP</label>
                  <div class="col-sm-8">
                    <label class="text text-muted"><?= $data['no_hp']?></label>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-4">Status</label>
                  <div class="col-sm-8">
                    <label class="text text-muted"><?= $data['status']?></label>
                  </div>
                </div>

              </div>

            </div>
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
