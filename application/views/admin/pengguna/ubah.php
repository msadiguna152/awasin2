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
            <form role="form" enctype="multipart/form-data" action="<?= site_url('admin/Pengguna/update_proses');?>" method="post">
                <div class="row">
                  <div class="col-lg-1">
                  </div>

                  <div class="col-lg-10">
                    <div class="form-group row">
                      <label for="nama_pengguna" class="col-sm-2 col-form-label">Nama Pengguna</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_pengguna" required="" value="<?= $data['nama_pengguna'];?>" placeholder="Masukan Nama Pengguna . . .">
                        <input type="text" hidden name="id_pengguna"  value="<?= $data['id_pengguna'];?>" placeholder="Masukan Nama Pengguna . . .">

                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="username" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="username" value="<?= $data['username'];?>" required="" placeholder="Masukan Username Pengguna . . .">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="password" value="<?= $data['password'];?>" required="" placeholder="Masukan Password Pengguna . . .">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="level" class="col-sm-2 col-form-label">Level</label>
                      <div class="col-sm-8">
                        <select class="form-control select2" name="level" required="" data-placeholder="Pilih Level Pengguna" style="width: 100%;">
                          <option value="<?= $data['level'];?>"><?= $data['level'];?></option>
                          <option value="Admin">Admin</option>
                          <option value="Pegawai">Pegawai</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="foto_pengguna" class="col-sm-2 col-form-label">Foto Pengguna</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control-file" id="image-source" onchange="previewImage();" name="foto_pengguna"  placeholder="Masukan Foto Pengguna . . .">
                        <img id="image-preview" class="img img-thumbnail" style="height: 100px; width: 100px; display:none;">
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