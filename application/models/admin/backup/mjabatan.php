<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mjabatan extends CI_Model {
	public function insert()
	{
		$data = array(
			'nama_jabatan'=> $this->input->post('nama_jabatan'),
		);
		$this->db->insert('jabatan',$data);
	}
	public function get()
	{
		$query = $this->db->select('*')->from('jabatan')->order_by('id_jabatan','DESC')->get();
		return $query;
	}
	public function get_edit($id)
	{
		return $this->db->query("SELECT * from jabatan where id_jabatan='$id'")->row_array();
	}
	public function update()
	{
		$data = array(
			'nama_jabatan'=> $this->input->post('nama_jabatan'),
		);
		$where = array('id_jabatan' => $this->input->post('id_jabatan'));
		$this->db->update('jabatan',$data,$where);
	}

	public function delete($id)
	{
		$where = array('id_jabatan' => $id);
		$query = $this->db->delete('jabatan',$where);
		return $query;
	}
}