<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpengguna extends CI_Model {
	public function insert()
	{
		$config['upload_path'] = 'profil/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3000;
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto_pengguna');
        $file = $this->upload->data();
        $foto_pengguna = $file['file_name'];

		$nama_pengguna = $this->input->post('nama_pengguna');
	    $username = $this->input->post('username');
	    $password = md5($this->input->post('password'));
	    $level = $this->input->post('level');

		$data = array(
			'nama_pengguna'=> $nama_pengguna,
			'username'=> $username,
			'password'=> $password,
			'level'=> $level,
			'foto_pengguna'=> $foto_pengguna,

		);
		$this->db->insert('pengguna',$data);
	}
	public function get()
	{
		$query = $this->db->select('*')->from('pengguna')->order_by('id_pengguna','DESC')->get();
		return $query;
	}
	public function get_edit($id)
	{
		return $this->db->query("SELECT * from pengguna where id_pengguna='$id'")->row_array();
	}
	public function update()
	{
		$config['upload_path'] = 'profil/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3000;
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto_pengguna');
        $file = $this->upload->data();
        $foto_pengguna = $file['file_name'];

		$nama_pengguna = $this->input->post('nama_pengguna');
	    $username = $this->input->post('username');
	    $password = md5($this->input->post('password'));
	    $level = $this->input->post('level');

		$data = array(
			'nama_pengguna'=> $nama_pengguna,
			'username'=> $username,
			'password'=> $password,
			'level'=> $level,
			'foto_pengguna'=> $foto_pengguna,
		);
		$where = array('id_pengguna' => $this->input->post('id_pengguna'));
		$this->db->update('pengguna',$data,$where);
	}

	public function delete($id)
	{
		$where = array('id_pengguna' => $id);
		$query = $this->db->delete('pengguna',$where);
		return $query;
	}
}