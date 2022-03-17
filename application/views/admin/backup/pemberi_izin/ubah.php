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
            <form role="form" enctype="multipart/form-data" action="<?= site_url('admin/Pemberi_izin/update_proses');?>" method="post">
                <div class="row">
                  <div class="col-lg-1">
                  </div>

                  <div class="col-lg-10">
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-8">
                        <input type="text" hidden value="<?= $data['id_pemberi_izin']?>" name="id_pemberi_izin">
                        <select class="form-control select2" style="width: 100%;" id="" name="status_izin" data-placeholder="Pilih Status" required="">
                          <option value="">Pilih Status</option>
                          <option <?= $data['status_izin']=="Aktif"?'selected':'';?> value="Aktif">Aktif</option>
                          <option <?= $data['status_izin']=="Non Aktif"?'selected':'';?> value="Non Aktif">Non Aktif</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2"></label>
                      <div class="col-sm-2 m-1">
                        <button type="submit" name="simpan" class="btn btn-info btn-sm btn-block" >Ubah</button>
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
