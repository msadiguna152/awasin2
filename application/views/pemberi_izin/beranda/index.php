  <style type="text/css">
    .bg {
      background: url(<?= site_url('assets/bg.jpg');?>);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
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
            <span><?php date_default_timezone_set("Asia/Makassar"); $tgl=date("Y-m-d"); echo format_indo2($tgl);?></span>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <?= $this->session->flashdata('msg'); ?>
            
            <div class="row">
              <div class="col-md-3 col-sm-4 col-12">
                <a href="">
                <div class="info-box">
                  <span class="info-box-icon bg-warning"><i class="fa fa-clock"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><marquee>Pengajuan Hari Ini</marquee></span>
                    <span class="info-box-number">
                      <?php
                      $sql = $this->db->query("SELECT * FROM izin WHERE date(waktu_pengajuan)='$tgl'")->num_rows();
                      echo $sql." Pengajuan";
                      ?>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                </a>
                <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-4 col-12">
                <a href="">
                <div class="info-box">
                  <span class="info-box-icon bg-danger"><i class="fa fa-times"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><marquee>Total Pengajuan Ditolak</marquee></span>
                    <span class="info-box-number">
                      <?php
                      $sql = $this->db->query("SELECT * FROM izin WHERE status_izin='Ditolak'")->num_rows();
                      echo $sql." Pengajuan";
                      ?>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                </a>
                <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-4 col-12">
                <a href="">
                <div class="info-box">
                  <span class="info-box-icon bg-success"><i class="fa fa-check"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><marquee>Total Pengajuan Diterima</marquee></span>
                    <span class="info-box-number">
                      <?php
                      $sql = $this->db->query("SELECT * FROM izin WHERE status_izin='Diterima'")->num_rows();
                      echo $sql." Pengajuan";
                      ?>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                </a>
                <!-- /.info-box -->
              </div>

              <div class="col-md-3 col-sm-4 col-12">
                <a href="">
                <div class="info-box">
                  <span class="info-box-icon bg-warning"><i class="fa fa-clock"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><marquee>Total Pengajuan Menunggu Konfirmasi</marquee></span>
                    <span class="info-box-number">
                      <?php
                      $sql = $this->db->query("SELECT * FROM izin WHERE status_izin='0'")->num_rows();
                      echo $sql." Pengajuan";
                      ?>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                </a>
                <!-- /.info-box -->
              </div>

            </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
