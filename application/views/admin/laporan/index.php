  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?= ucwords($this->session->userdata('menu')); ?></a></li>
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
            <h3 class="card-title mt-1">Cetak <?= ucwords($this->session->userdata('menu')); ?></h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <form target="_BLANK" enctype="multipart/form-data" action="<?= site_url('admin/Laporan/cetak')?>" method="post">

                  <div class="form-group row">
                    <label for="tgl_awal" class="col-sm-8 col-form-label text-success">Cetak Semua :</label>
                    <div class="col-sm-5">

                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-8">
                      <button type="submit" name="semua" class="btn btn-primary btn-sm btn-block">Cetak Semua</button>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tgl_awal" class="col-sm-8 col-form-label text-success">Cetak Pertanggal :</label>
                    <div class="col-sm-5">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="sampai_tgl" class="col-sm-3 col-form-label">Dari Tanggal</label>
                    <div class="col-sm-5">
                      <input type="date" class="form-control" name="dari_tgl" placeholder="Masukan Tanggal Kembali . . .">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="sampai_tgl" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                    <div class="col-sm-5">
                      <input type="date" class="form-control" name="sampai_tgl" placeholder="Masukan Tanggal Kembali . . .">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-8">
                      <button type="submit" name="tanggal" class="btn btn-primary btn-sm btn-block">Cetak</button>
                    </div>
                  </div>

                </form>
              </div>

              <div class="col-md-6 col-sm-12">
                <form target="_BLANK" enctype="multipart/form-data" action="<?= site_url('admin/Laporan/cetak2')?>" method="post">

                  <div class="form-group row">
                    <label for="tgl_awal" class="col-sm-8 col-form-label text-success">Cetak Perpegawai :</label>
                    <div class="col-sm-5">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-5">
                      <select class="form-control select2" style="width: 100%;" id="" name="id_pegawai" data-placeholder="Pilih Pegawai" required="">
                        <option value="">Pilih Pegawai</option>
                        <?php foreach ($pegawai->result() as $data) : ?>
                          <option value="<?= $data->id_pegawai?>"><?= $data->nama_pegawai?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="sampai_tgl" class="col-sm-3 col-form-label">Dari Tanggal</label>
                    <div class="col-sm-5">
                      <input type="date" class="form-control" name="dari_tgl" required placeholder="Masukan Tanggal Kembali . . .">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="sampai_tgl" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                    <div class="col-sm-5">
                      <input type="date" class="form-control" name="sampai_tgl" required placeholder="Masukan Tanggal Kembali . . .">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-8">
                      <button type="submit" name="cetak" class="btn btn-primary btn-sm btn-block">Cetak</button>
                    </div>
                  </div>

                </form>
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
