<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('mlogin');
 
	}

	public function index()
	{
		$this->load->view('login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->mlogin->cek($username, $password);
		if($cek->num_rows() == 1)
		{
			foreach($cek->result() as $data){

				$sess_data['password'] = $data->password;
				$sess_data['username'] = $data->username;
				$sess_data['id_user'] = $data->id_user;
				$sess_data['level'] = $data->level;

			$this->session->set_userdata($sess_data);

			}
			if($this->session->userdata('level') == 'Admin')
			{
				redirect(base_url("admin/welcome"));
			}
			elseif($this->session->userdata('level') == 'User')
			{
				redirect(base_url("user/welcome2"));
			}
			elseif($this->session->userdata('level') == '0')
			{
				echo '<script language="javascript">alert("Username dan Password Salah!"); document.location="../home/login";</script>';
			}
		}
		else
		{
			echo '<script language="javascript">alert("Username dan Password Salah!"); document.location="../home/login";</script>';
		}

	}
 
	function logout(){
		$this->session->sess_destroy();
		echo '<script language="javascript">alert("Logout Berhasil!"); document.location="../home/login"</script>';
	}
}