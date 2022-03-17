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
            <form role="form" enctype="multipart/form-data" action="<?= site_url('pemberi_izin/Izin/update_proses');?>" method="post">
                <div class="row">
                  <div class="col-lg-1">
                  </div>

                  <div class="col-lg-10">
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Nama Pegawai</label>
                      <div class="col-sm-8">
                        <input type="text" readonly class="form-control" name="nama_pegawai" required="" value="<?= $data['nama_pegawai'];?>" placeholder="Masukan Tujuan Izin . . .">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Tujuan</label>
                      <div class="col-sm-8">
                        <input type="text" readonly class="form-control" name="tujuan" required="" value="<?= $data['tujuan'];?>" placeholder="Masukan Tujuan Izin . . .">
                        <input type="text" hidden name="id_izin" required="" value="<?= $data['id_izin'];?>" placeholder="Masukan Tujuan Izin . . .">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-8">
                        <input type="text" readonly class="form-control" name="tanggal" required="" value="<?= format_indo($data['tanggal']);?>" placeholder="Masukan Tanggal Izin . . .">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Dari Jam</label>
                      <div class="col-sm-8">
                        <input type="time" readonly class="form-control" name="dari" value="<?= $data['dari'];?>" required="" placeholder="Masukan Dari Jam . . .">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Sampai Jam</label>
                      <div class="col-sm-8">
                        <input type="time" readonly class="form-control" name="sampai" value="<?= $data['sampai'];?>" required="" placeholder="Masukan Sampai Jam . . .">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Catatan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="catatan" required value="<?= $data['catatan'];?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-8">
                        <select class="form-control select2" style="width: 100%;" id="" name="status_izin" data-placeholder="Pilih Status" required="">
                          <option <?= $data['status_izin']=="0"?'selected':'';?> value="0">Menunggu Tanggapan</option>
                          <option <?= $data['status_izin']=="Diterima"?'selected':'';?> value="Diterima">Diterima</option>
                          <option <?= $data['status_izin']=="Ditolak"?'selected':'';?> value="Ditolak">Ditolak</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Waktu Pengajuan</label>
                      <div class="col-sm-8">
                        <input type="text" readonly class="form-control" name="tanggal" required="" value="<?= format_indo($data['waktu_pengajuan']);?>">
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
