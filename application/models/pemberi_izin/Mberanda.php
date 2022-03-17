<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mberanda extends CI_Model {
// untuk memanggil semua data untuk ditampilkan pada halaman index
public function get()
	{
		$query = $this->db->select('*')->from('tb_user')->order_by('id_user','DESC')->get();
		return $query;
	}
// untuk memanggil data sesuai dengan id yang dipilih
public function get_edit($id)
	{
		$query = $this->db->select('*')->from('tb_user')->where('id_user',$id)->get();
		return $query;
	}
// untuk memperbaharui data didalam tabel database
public function update()
	{
		$config['upload_path'] = 'foto_user/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 3000;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto_user'))
		{
			$id_user = $this->input->post('id_user');
			$nama_user = $this->input->post('nama_user');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$no_user = $this->input->post('no_user');
			$status_user = $this->input->post('status_user');
			$email_user = $this->input->post('email_user');
			$data = array(
				'nama_user'=> $nama_user,
				'username'=> $username,
				'password'=> $password,
				'no_user'=> $no_user,
				'status_user'=> $status_user,
				'email_user'=> $email_user,
			);
			$where = array('id_user' => $id_user);
			$this->db->update('tb_user',$data,$where );
		} else {
			$id_user = $this->input->post('id_user');
			$nama_user = $this->input->post('nama_user');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$no_user = $this->input->post('no_user');
			$status_user = $this->input->post('status_user');
			$email_user = $this->input->post('email_user');
			$file = $this->upload->data();
			$foto_user = $file['file_name'];
			$data = array(
				'nama_user'=> $nama_user,
				'username'=> $username,
				'password'=> $password,
				'no_user'=> $no_user,
				'status_user'=> $status_user,
				'email_user'=> $email_user,
				'foto_user'=> $foto_user,
			);
			$where = array('id_user' => $id_user);
			$this->db->update('tb_user',$data,$where );
		}
	}

}