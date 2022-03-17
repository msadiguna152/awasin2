<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mizin extends CI_Model {

	public function get_pegawai()
	{
		$id = $this->session->userdata('id_pegawai');
		$query = $this->db->select('*')->from('pegawai')->where('id_pegawai',$id)->get();
		return $query;
	}

	public function get_pemberi_izin()
	{
		$query = $this->db->select('*')->from('pegawai')
		->join('jabatan','pegawai.id_jabatan=jabatan.id_jabatan')
		->where('pegawai.id_jabatan != "5"')->get();
		return $query;
	}

	public function get()
	{
		$id = $this->session->userdata('id_pegawai');

		$query = $this->db->select('*')->from('izin')
		->join('pegawai','izin.id_pegawai=pegawai.id_pegawai')
		->where('izin.id_pemberi_izin',$id)->order_by('izin.id_izin','DESC')->get();
		return $query;
	}
	public function get_edit($id_pegawai)
	{
		return $this->db->query("SELECT * from izin JOIN pegawai ON pegawai.id_pegawai=izin.id_pegawai JOIN jabatan ON pegawai.id_jabatan=jabatan.id_jabatan where izin.id_izin='$id_pegawai'")->row_array();
	}
	public function get_rincian($id)
	{
		return $this->db->query("SELECT * from izin JOIN pegawai ON pegawai.id_pegawai=izin.id_pegawai JOIN jabatan ON pegawai.id_jabatan=jabatan.id_jabatan where izin.id_izin='$id'")->row_array();
	}
	public function update()
	{

		$data = array(
			'catatan'=> $this->input->post('catatan'),
			'status_izin'=> $this->input->post('status_izin'),
		);
		$where = array('id_izin' => $this->input->post('id_izin'));
		$this->db->update('izin',$data,$where);
	}

	public function delete($id)
	{
		$where = array('id_izin' => $id);
		$query = $this->db->delete('izin',$where);
		return $query;
	}
}