<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MLaporan extends CI_Model {

	public function get_cetak()
	{
		if (isset($_POST['semua'])) {
			$query = $this->db->select('*')->from('izin')
			->join('pegawai','izin.id_pegawai=pegawai.id_pegawai')
			->join('jabatan','jabatan.id_jabatan=pegawai.id_jabatan')
			->order_by('izin.id_izin','DESC')->get();
		} elseif (isset($_POST['tanggal'])) {
			$dari = $this->input->post('dari_tgl');
			$sampai = $this->input->post('sampai_tgl');
			
			$query = $this->db->select('*')->from('izin')
			->join('pegawai','izin.id_pegawai=pegawai.id_pegawai')
			->join('jabatan','jabatan.id_jabatan=pegawai.id_jabatan')
			->where('DATE(izin.waktu_pengajuan)>=',$dari)->where('DATE(izin.waktu_pengajuan)<=',$sampai)
			->order_by('izin.id_izin','DESC')->get();		
		}
		return $query;
	}

	public function get_cetak2()
	{
		$dari = $this->input->post('dari_tgl');
		$sampai = $this->input->post('sampai_tgl');
		$id_pegawai = $this->input->post('id_pegawai');


		$query = $this->db->select('*')->from('izin')
		->join('pegawai','izin.id_pegawai=pegawai.id_pegawai')
		->join('jabatan','jabatan.id_jabatan=pegawai.id_jabatan')
		->where('DATE(izin.waktu_pengajuan)>=',$dari)->where('DATE(izin.waktu_pengajuan)<=',$sampai)->where('izin.id_pegawai',$id_pegawai)
		->order_by('izin.id_izin','DESC')->get();
		return $query;
	}

	public function get_pegawai()
	{
		$query = $this->db->select('*')->from('pegawai')->order_by('id_pegawai','DESC')->get();
		return $query;
	}

}