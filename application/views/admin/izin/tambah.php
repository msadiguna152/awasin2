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
            <form role="form" onsubmit="return formValidasi()" enctype="multipart/form-data" action="<?= site_url('admin/Izin/insert_proses');?>" method="post">
                <div class="row">
                  <div class="col-lg-1">
                  </div>

                  <div class="col-lg-10">
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Nama Pegawai</label>
                      <div class="col-sm-8">
                        <select class="form-control select2" style="width: 100%;" id="" name="id_pegawai" data-placeholder="Pilih Pegawai" required="">
                          <option value="">Pilih Pegawai</option>
                          <?php foreach ($pegawai->result() as $data) : ?>
                            <option value="<?= $data->id_pegawai?>"><?= $data->nama_pegawai?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Tujuan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="tujuan" required="" placeholder="Masukan Tujuan Izin . . .">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-8">
                        <input type="date" class="form-control" name="tanggal" required="" placeholder="Masukan Tanggal Izin . . .">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Dari Jam</label>
                      <div class="col-sm-8">
                        <input type="time" class="form-control" name="dari" required="" placeholder="Masukan Dari Jam . . .">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Sampai Jam</label>
                      <div class="col-sm-8">
                        <input type="time" class="form-control" name="sampai" required="" placeholder="Masukan Sampai Jam . . .">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Ajukan Ke</label>
                      <div class="col-sm-8">
                        <select class="form-control select2" style="width: 100%;" id="" name="id_pemberi_izin" data-placeholder="Pilih Ajukan Ke" required="">
                          <option value="">Pilih Ajukan Ke</option>
                          <?php foreach ($pemberi_izin->result() as $data) : ?>
                            <option value="<?= $data->id_pegawai?>"><?= $data->nama_pegawai?> (<b><?= $data->nama_jabatan?></b>)</option>
                          <?php endforeach;?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Catatan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="catatan" required="" placeholder="Masukan Catatan . . .">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Foto</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control" onchange="getLocation();" accept="image/*" name="foto" required="" placeholder="Masukan Foto . . .">
                        <input type="text" id="long" name="long" hidden placeholder="Masukan Long . . .">
                        <input type="text" id="lat" name="lat" hidden placeholder="Masukan Lat . . .">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-8">
                        <select class="form-control select2" style="width: 100%;" id="" name="status_izin" data-placeholder="Pilih Status" required="">
                          <option value="">Pilih Status</option>
                          <option value="0">Menunggu Tanggapan</option>
                          <option value="Diterima">Diterima</option>
                          <option value="Ditolak">Ditolak</option>

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

<script>
  var x = document.getElementById("lat");
  var y = document.getElementById("long");

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      alert("Geolocation is not supported by this browser");
    }
  }

  function showPosition(position) {
    document.getElementById("lat").value=position.coords.latitude;
    document.getElementById("long").value=position.coords.longitude;
  }
</script>

<script type="text/javascript">
  function formValidasi() {
    var get_lat = document.getElementById('lat').value;
    var get_long = document.getElementById('long').value;
    if (get_lat=="" && get_long=="") {
      alert('Periksa Kioneksi internet atau izinkan akses lokasi pada browser!');
      return false;
    }
  }
</script>
