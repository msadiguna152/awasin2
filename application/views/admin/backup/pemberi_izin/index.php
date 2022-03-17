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
          </div>
          <!-- /.card-header -->
          <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama Pemberi Izin</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th>Pilihan</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($pemberi_izin->result() as $data): ?>
                    <tr>
                      <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                      <td><?= $data->nip;?></td>
                      <td><?= $data->nama_pegawai;?></td>
                      <td><?= $data->nama_jabatan;?></td>
                      <td><?= $data->status_izin;?></td>

                      <td>
                        <div class="input-group-prepend">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="true">
                            Aksi
                          </button>
                          <ul class="dropdown-menu">
                            <li class="dropdown-item">
                              <a class="btn btn-sm btn-info btn-block" href="<?= site_url('admin/Pemberi_izin/update/'.$data->id_pemberi_izin);?>">Ubah</a>
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
