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
            <h3 class="card-title mt-1">Data <?= ucwords($this->session->userdata('menu')); ?></h3>
            <div class="card-tools">
              <a href="<?= site_url('pegawai/Izin/insert');?>" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Waktu Pengajuan</th>
                    <th>Nama Pegawai</th>
                    <th>Tujuan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Catatan</th>
                    <th>Status</th>
                    <th>Pilihan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($izin->result() as $data): ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= format_indo2($data->waktu_pengajuan); ?></td>
                      <td><?= $data->nama_pegawai; ?></td>
                      <td><?= $data->tujuan; ?></td>
                      <td><?= format_indo2($data->tanggal); ?></td>
                      <td>Jam <?= $data->dari; ?> s/d <?= $data->sampai; ?></td>
                      <td><?= $data->catatan; ?></td>
                      <td>
                        <?php
                        if ($data->status_izin!="Menunggu") {
                          if ($data->status_izin=="Diterima") {
                            echo '<span class="badge badge-success">'.$data->status_izin.'</span>';
                          } else {
                            echo '<span class="badge badge-danger">'.$data->status_izin.'</span>';
                          }
                        } else if ($data->status_izin=="0"){
                          echo '<span class="badge badge-warning">Menunggu <br>Konfirmasi</span>';
                        }
                        ?>
                      </td>
                      <td>
                        <div class="input-group-prepend">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="true">
                            Aksi
                          </button>
                          <ul class="dropdown-menu">
                            <?php
                            if ($data->status_izin!="0") {

                            } else {
                            ?>
                            
                            <li class="dropdown-item">
                              <a class="btn btn-sm btn-danger btn-block" onclick="return confirm('Hapus Data User <?= $data->nama_pegawai ?>?')" href="<?= site_url('pegawai/Izin/delete/'.$data->id_izin);?>">Hapus</a>
                            </li>
                            <?php } ?>

                            <li class="dropdown-item">
                              <a class="btn btn-sm btn-info btn-block" href="<?= site_url('pegawai/Izin/update/'.$data->id_izin);?>">Ubah</a>
                            </li>
                            
                            <li class="dropdown-item">
                              <a class="btn btn-sm btn-success btn-block" href="<?= site_url('pegawai/Izin/rincian/'.$data->id_izin);?>">Rincian</a>
                            </li>

                          </ul>
                        </div>
                      </td>
                    </tr>
                  <?php $no++; endforeach;?>
                  </tbody>
                </table>
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
