<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpemberi_izin extends CI_Model {

	public function get()
	{
		$query = $this->db->select('*')->from('pemberi_izin')
		->join('pegawai','pemberi_izin.id_pegawai=pegawai.id_pegawai')
		->join('jabatan','pegawai.id_jabatan=jabatan.id_jabatan')
		->order_by('id_pemberi_izin','DESC')->get();
		return $query;
	}

	public function get_edit($id)
	{
		return $this->db->query("SELECT * from pemberi_izin WHERE id_pemberi_izin='$id'")->row_array();
	}

	public function update()
	{
		$data = array(
			'status_izin'=> $this->input->post('status_izin'),
		);
		$where = array('id_pemberi_izin' => $this->input->post('id_pemberi_izin'));
		$this->db->update('pemberi_izin',$data,$where);
	}
}