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
                      <label class="col-xl-4 col-md-2 col-xs-2 ">Nama Pegawai</label>
                      <div class="col-xl-8 col-md-8 col-xs-8">
                        <label class="text text-muted"><?= $data['nama_pegawai'];?></label>
                      </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                      <label class="col-xl-4 col-md-2 col-xs-2 ">NIP</label>
                      <div class="col-xl-8 col-md-8 col-xs-8">
                        <label class="text text-muted"><?= $data['nip'];?></label>
                      </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                      <label class="col-xl-4 col-md-2 col-xs-2 ">Tujuan</label>
                      <div class="col-xl-8 col-md-8 col-xs-8">
                        <label class="text text-muted"><?= $data['tujuan'];?></label>
                      </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                      <label class="col-xl-4 col-md-2 col-xs-2 ">Tanggal</label>
                      <div class="col-xl-8 col-md-8 col-xs-8">
                        <label class="text text-muted"><?= format_indo2($data['tanggal']);?></label>
                      </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                      <label class="col-xl-4 col-md-2 col-xs-2 ">Jam</label>
                      <div class="col-xl-8 col-md-8 col-xs-8">
                        <label class="text text-muted"><?= $data['dari'];?> s/d <?= $data['sampai'];?></label>
                      </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                      <label class="col-xl-4 col-md-2 col-xs-2 ">Pengajuan Ke</label>
                      <div class="col-xl-8 col-md-8 col-xs-8">
                        <?php
                          $id = $data['id_pemberi_izin'];
                          $data2 = $this->db->query("SELECT * from pegawai JOIN jabatan ON pegawai.id_jabatan=jabatan.id_jabatan where pegawai.id_pegawai='$id'")->row_array();
                        ?>
                        <label class="text text-muted"><?= $data2['nama_pegawai'];?> (<?=$data2['nama_jabatan'];?>)</label>
                      </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                      <label class="col-xl-4 col-md-2 col-xs-2 ">Catatan</label>
                      <div class="col-xl-8 col-md-8 col-xs-8">
                        <label class="text text-muted"><?= $data['catatan'];?></label>
                      </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                      <label class="col-xl-4 col-md-2 col-xs-2 ">Foto</label>
                      <div class="col-xl-8 col-md-8 col-xs-8">
                        <?php if ($data['foto']!=NULL) { ?>
                        <img class="img img-thumbnail" style="height: 150px" src="<?= site_url()?>izin/<?= $data['foto'];?>">
                        <?php } else {
                            echo '<label class="text text-muted">Tidak ada file</label>';
                          }
                        ?>
                        
                      </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                      <label class="col-xl-4 col-md-2 col-xs-2">Lihat Lokasi</label>
                      <div class="col-xl-8 col-md-8 col-xs-8">
                        <label class="text text-muted">
                          <?php if ($data['lat']!=NULL) { ?>
                            <a href="<?= site_url('admin/Izin/map/'.$data['id_izin'])?>" target="_blank">Klik Disini!</a>
                          <?php };?>
                        </label>
                      </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                      <label class="col-xl-4 col-md-2 col-xs-2">Status Izin</label>
                      <div class="col-xl-8 col-md-8 col-xs-8">
                        <label class="badge badge-primary"><?= $data['status_izin'];?></label>
                      </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                      <label class="col-xl-4 col-md-2 col-xs-2 ">Waktu Pengajuan</label>
                      <div class="col-xl-8 col-md-8 col-xs-8">
                        <label class="text text-muted"><?= format_indo2($data['waktu_pengajuan']);?></label>
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
