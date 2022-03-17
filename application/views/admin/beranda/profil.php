<?php
foreach ($user->result() as $data):
  $id_user = $data->id_user;
  $nama_user = $data->nama_user;
  $username = $data->username;
  $password = $data->password;
  $no_user = $data->no_user;
  $status_user = $data->status_user;
  $level = $data->level;
  $email_user = $data->email_user;
  $foto_user = $data->foto_user;
endforeach;
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Profil</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" style="height: 90px;widows: 90px;" src="<?= site_url('foto_user/'.$foto_user)?>" alt="<?= $nama_user;?>">
                </div>

                <h3 class="profile-username text-center"><?= $nama_user;?></h3>

                <p class="text-muted text-center"><?= $level;?></p>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#akun" data-toggle="tab">Akun</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="akun">
                    <div class="card-body">
                      <form role="form" enctype="multipart/form-data" action="<?= site_url('admin/beranda/ubah_proses');?>" method="post">
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="form-group row">
                              <label for="nama_user" class="col-sm-2 col-form-label">Nama User</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_user" value="<?= $nama_user; ?>" required="" placeholder="Masukan Nama User . . .">
                                <input type="text" hidden="" name="id_user" value="<?= $id_user; ?>" required="" placeholder="Masukan Nama User . . .">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="no_user" class="col-sm-2 col-form-label">Nomor HP</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_user" value="<?= $no_user; ?>" required="" placeholder="Masukan Nomor HP . . .">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="email_user" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-8">
                                <input type="email" class="form-control" name="email_user" value="<?= $email_user; ?>" required="" placeholder="Masukan Email User . . .">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="username" class="col-sm-2 col-form-label">Username</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="username" value="<?= $username; ?>" required="" placeholder="Masukan Username User . . .">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="password" class="col-sm-2 col-form-label">Password</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="password" value="<?= $password; ?>" required="" placeholder="Masukan Password User . . .">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="foto_user" class="col-sm-2 col-form-label">Foto User</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control-file" id="image-source" onchange="previewImage();" name="foto_user"  placeholder="Masukan Foto User . . .">
                                <img id="image-preview" src="<?= site_url();?>foto_user/<?= $foto_user; ?>" class="img img-thumbnail" style="height: 100px; width: 100px;">
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
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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