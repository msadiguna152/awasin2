<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>CETAK LAPORAN DATA JADWAL TES</title>
  <style>

  p {
    line-height: 1;
  }

  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    table-layout:fixed;
    width: 100%;
  }

  @page { 
    margin-right: 2cm;
    margin-left: 2cm;
    margin-bottom: 2cm;
    margin-top: 1cm; 
  }
</style>
</head>

<body>
  <!-- <p><center><img height="120px" src="<?= site_url('assets2/kop2.png');?>"></center></p> -->
  <hr>
  <p><center><b style="font-size: 24px;">LAPORAN SURAT KELUAR KANTOR</b></center></p><br>
  <?php
    if (isset($_POST['tanggal'])) {
      $dari = $this->input->post('dari_tgl');
      $sampai = $this->input->post('sampai_tgl');
      echo '<p style="font-size: 20px;font-style: bold;">Tanggal : '.format_indo($dari).' s/d '.format_indo($sampai).'</p>';
    };
  ?>
  <table cellpadding="5px" cellspacing="0px" border="1">
    <thead>
      <tr align="center">
        <th>No</th>
        <th>Nama Pegawai/NIP</th>
        <th>Keperluan</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Waktu Pengajuan</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($laporan->result() as $data): ?>
      <tr>
        <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
        <td><?= $data->nama_pegawai;?> <?= $data->nip;?></td>
        <td><?= $data->tujuan;?></td>
        <td><?= format_indo2($data->tanggal);?></td>
        <td><?= $data->dari;?> s/d <?= $data->sampai;?></td>
        <td><?= format_indo2($data->waktu_pengajuan);?></td>
        <td><?= $data->status_izin;?></td>
      </tr>
      <?php $no++; endforeach;?>
    </tbody>
  </table>
  <br>

  <!-- <table cellpadding="0px" cellspacing="0px" border="0">
    <tr>
      <td width="900px"> </td>
      <td>Cikarang, <?= format_indo(date('Y-m-d')); ?></td>
    </tr>
    <tr>
      <td></td>
      <td>Kepala Sekolah,</td>
    </tr>
    <tr>
      <td></td>
      <td><br><br><br><br><br><br></td>
    </tr>
    <tr>
      <td></td>
      <td><b>Adiguna</b></td>
    </tr>
    <tr>
      <td></td>
      <td><b>12345</b></td>
    </tr>
  </table> -->
</body>
</html>