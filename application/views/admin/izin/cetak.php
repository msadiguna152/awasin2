<html>
<head>
	<title>Surat Izin Keluar Kantor</title>
	<style type="text/css">
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
		line-height: 2em;
		padding: 0px;
	}
	@page {
		margin: 0cm 0cm;
	}
	body {
		margin-top: 2.5cm;
		margin-left: 2.5cm;
		margin-right: 2.5cm;
		margin-bottom: 2cm;
		font-family:"Arial","sans-serif";
		font-size: 10;
	}
	p {
		display: block;
		line-height: 2em;
		margin-top: 0em;
		margin-bottom: 0em;
		margin-left: 0;
		margin-right: 0;
	}
	font {
		display: block;
		line-height: 1.5em;
		margin-top: 0em;
		margin-bottom: 0em;
		margin-left: 0;
		margin-right: 0;
	}
</style>
</head>
<body>

	<table border="0">
		<tbody style="text-align: left; vertical-align: top;">
			<tr align="center">
				<td style="width: 400px;"> </td>
				<td>
					<font style="font-size: 8;line-height: 1em;text-align: left; vertical-align: top;">
						Lampiran<br>
						Peraturan Mahkamah Agung Nomor 7 Tahun 2016 tentang Penegakan Disiplin Kerja Hakim 
						Pada Mahkamah Agung dan Badan Peradilan 
						Yang Berada di bawahnya
					</font>
				</td>
			</tr>
		</tbody>
	</table>
	<br>
	<br>
	<p style="line-height: 1em; font-size: 10; text-align: center;">
		<b>SURAT IZIN KELUAR KANTOR</b>
	</p>
	<br>
	<?php
	$id = $data['id_pemberi_izin'];
	$data2 = $this->db->query("SELECT * from pegawai JOIN jabatan ON pegawai.id_jabatan=jabatan.id_jabatan where pegawai.id_pegawai='$id'")->row_array();
	?>


		<table border="0">
			<tbody style="text-align: left; vertical-align: top;">
				<tr>
					<td style="width: 250px;"><font style="font-size: 10;">Yang bertandatangan di bawah ini</font></td>
					<td><font style="font-size: 10; width: 10px;">:</font></td>
					<td><font style="font-size: 10"><?= strtoupper($data2['nama_pegawai']);?> </font></td>
				</tr>
				<tr>
					<td style="width: 250px;"><font style="font-size: 10;">Selaku</font></td>
					<td><font style="font-size: 10; width: 10px;">:</font></td>
					<td><font style="font-size: 10"><?= $data2['nama_jabatan'];?></font></td>
				</tr>
				<tr>
					<td style="width: 250px;"><font style="font-size: 10;">Dengan ini memberikan izin kepada</font></td>
					<td><font style="font-size: 10; width: 10px;">:</font></td>
					<td><font style="font-size: 10"><?= $data['nama_pegawai'];?> <br> NIP. <?= $data['nip'];?></font></td>
				</tr>
				<tr>
					<td style="width: 250px;"><font style="font-size: 10;">Untuk keluar kantor pada</font></td>
					<td><font style="font-size: 10; width: 10px;">:</font></td>
					<td><font style="font-size: 10"><?= format_indo2($data['tanggal']);?><br> Pukul <?= $data['dari'];?> s/d <?= $data['sampai'];?></font></td>
				</tr>
				<tr>
					<td style="width: 250px;"><font style="font-size: 10;">Untuk keperluan</font></td>
					<td><font style="font-size: 10; width: 10px;">:</font></td>
					<td><font style="font-size: 10"><?= $data['tujuan'];?></font></td>
				</tr>
			</tbody>
		</table>


	<p style="line-height: 2em; font-size: 10; text-align: left";>Demikian izin ini diberikan kepada yang bersangkutan untuk digunakan sebagaimana mestinya.</p>
	<br>
	
	<table border="0" style="line-height: 2em;" width="100%">
		<tbody>
			<tr>
				<td style="width: 330px;"> </td>
				<td style="width: auto;">
					<font style="font-size: 10;line-height: 1em;text-align:right;">Cikarang, <?= format_indo(date('Y-m-d'))?></font>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><font style="font-size: 10;line-height: 1em;text-align: center;">Pejabat yang memberikan izin,</font></td>
			</tr>
			<tr>
				<td></td>
				<td><br><br><br><br></td>
			</tr>
			<tr>
				<td></td>
				<td><font style="font-size: 10;line-height: 1em;text-align: center;"><b><u><?= strtoupper($data2['nama_pegawai']);?></u><br>NIP. <?= strtoupper($data2['nip']);?></b></font></td>
			</tr>
		</tbody>
	</table>


</body>
</html>