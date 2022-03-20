<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'libraries/ApiResponseTrait.php';
class Mpengguna extends CI_Model {
	use ApiResponseTrait;
	public function get()
	{
		$id = $this->session->userdata('id_pegawai');
		$query = $this->db->select('*')->from('pengguna')->where('id_pegawai',$id)->get();
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
	    $password = $this->input->post('password');
	    $level = "Pegawai";

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
	public function updatePassword($token){
		$request = $this->decodePost();
		unset($request->token);
		$currentUser = $this->db->select('password')->where("token", $token)->get('pengguna')->row();
		if($currentUser){
			if(md5($request->current_password) === $currentUser->password){
				$this->db->where("token", $token)->update("pengguna", ['password'=>md5($request->new_password)]);
				return "Success";
			}
			else{
				return "Wrong current password";
			}
		}
		else{
			return "User not found";
		}
	}
	public function getUserByToken($token){
		return $this->db->select('foto_pengguna,username,nama_pegawai,jenis_kelamin,CONCAT(tempat_lahir,", ",tanggal_lahir) as ttl')->join("pegawai","ON pegawai.id_pegawai = pengguna.id_pegawai")->where("token", $token)->get('pengguna')->row();
	}
	public function getUserByUsernameAndPassword($username,$password){
		return $this->db->where("username", $username)->where('password',md5($password))->get('pengguna')->row();
	}
	public function updateToken($user_id,$newToken){
		// TODO: deskripsi token md5(id_pengguna+nama_pengguna+username)
		$this->db->where("id_pengguna", $user_id)->update("pengguna", ['token'=>$newToken]);
	}
}