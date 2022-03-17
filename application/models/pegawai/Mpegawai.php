<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpegawai extends CI_Model {

	public function get()
	{
		$id = $this->session->userdata('id_pegawai');
		
		$query = $this->db->select('*')->from('pegawai')
		->join('jabatan','pegawai.id_jabatan=jabatan.id_jabatan')
		->join('golongan','pegawai.id_golongan=golongan.id_golongan')
		->where('pegawai.id_pegawai',$id)->get();
		return $query;
	}

	public function get_jabatan()
	{
		$query = $this->db->select('*')->from('jabatan')->order_by('id_jabatan','DESC')->get();
		return $query;
	}

	public function get_golongan()
	{
		$query = $this->db->select('*')->from('golongan')->order_by('id_golongan','DESC')->get();
		return $query;
	}
	
	public function get_rincian($id)
	{
		return $this->db->query("SELECT * from pegawai JOIN jabatan ON jabatan.id_jabatan=pegawai.id_jabatan JOIN golongan ON golongan.id_golongan=pegawai.id_golongan where pegawai.id_pegawai='$id'")->row_array();
	}

}