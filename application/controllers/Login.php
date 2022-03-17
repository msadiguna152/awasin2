<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('Mlogin');
	}

	public function index()
	{
		$this->session->sess_destroy();
		$this->load->view('login');
	}

	function proses_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->Mlogin->cek($username, $password);
		if($cek->num_rows() == 1)
		{
			foreach($cek->result() as $data){
				$sess_data['password'] = $data->password;
				$sess_data['username'] = $data->username;
				$sess_data['nama_pengguna'] = $data->nama_pengguna;
				$sess_data['id_pengguna'] = $data->id_pengguna;
				$sess_data['id_pegawai'] = $data->id_pegawai;
				$sess_data['level'] = $data->level;
				$sess_data['foto_pengguna'] = $data->foto_pengguna;
			$this->session->set_userdata($sess_data);

			}
			if($this->session->userdata('level') == 'Admin')
			{
				$text_msg = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-user"></i> Selamat Datang, Anda Login Sebagai '.$data->nama_pengguna.'!</h5>
                </div>';
				$this->session->set_flashdata('msg', $text_msg);
				redirect(base_url("admin/Beranda/index"));
			}
			elseif($this->session->userdata('level') == 'Pegawai')
			{
				$text_msg = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-user"></i> Selamat Datang, Anda Login Sebagai '.$data->nama_pengguna.'!</h5>
                </div>';
				$this->session->set_flashdata('msg', $text_msg);
				redirect(base_url("pegawai/Beranda/index"));
			}
			elseif($this->session->userdata('level') == 'Pemberi Izin')
			{
				$text_msg = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-user"></i> Selamat Datang, Anda Login Sebagai '.$data->nama_pengguna.'!</h5>
                </div>';
				$this->session->set_flashdata('msg', $text_msg);
				redirect(base_url("pemberi_izin/Beranda/index"));
			}
			else {
				echo '<script language="javascript">alert("Username dan Password Salah!"); document.location="'.site_url('Login').'";</script>';
			}
		}
		else
		{
			echo '<script language="javascript">alert("Username dan Password Salah!"); document.location="'.site_url('Login').'";</script>';
		}

	}
 
	function logout(){
		$this->session->sess_destroy();
		echo '<script language="javascript">alert("Berhasil Keluar!"); document.location="'.site_url('Login').'"</script>';
	}
}