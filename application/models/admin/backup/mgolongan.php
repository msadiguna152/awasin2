<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mgolongan extends CI_Model {
	public function insert()
	{
		$data = array(
			'nama_golongan'=> $this->input->post('nama_golongan'),
			'jenis_golongan'=> $this->input->post('jenis_golongan'),
		);
		$this->db->insert('golongan',$data);
	}
	public function get()
	{
		$query = $this->db->select('*')->from('golongan')->order_by('id_golongan','DESC')->get();
		return $query;
	}
	public function get_edit($id)
	{
		return $this->db->query("SELECT * from golongan where id_golongan='$id'")->row_array();
	}
	public function update()
	{
		$data = array(
			'nama_golongan'=> $this->input->post('nama_golongan'),
			'jenis_golongan'=> $this->input->post('jenis_golongan'),
		);
		$where = array('id_golongan' => $this->input->post('id_golongan'));
		$this->db->update('golongan',$data,$where);
	}

	public function delete($id)
	{
		$where = array('id_golongan' => $id);
		$query = $this->db->delete('golongan',$where);
		return $query;
	}
}