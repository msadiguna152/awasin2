<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->session->set_userdata('menu', 'Pengguna');
		$this->session->set_userdata('menu2', 'kelola data');
		
		$this->load->model('pegawai/Mpengguna');
		if($this->session->userdata('level') != "Pegawai"){
			echo '<script language="javascript">alert("Tidak Dapat Diakses!"); document.location="'.site_url('Login').'"</script>';
		}
	}
	public function index(){
		$data['pengguna'] = $this->Mpengguna->get();
		$this->load->view('pegawai/tema/head');
		$this->load->view('pegawai/tema/menu');
		$this->load->view('pegawai/pengguna/index',$data);
		$this->load->view('pegawai/tema/footer');
	}

	public function update($id){
		$this->session->set_userdata('aksi', 'Ubah');
		
		$data['data'] = $this->Mpengguna->get_edit($id);
		$this->load->view('pegawai/tema/head');
		$this->load->view('pegawai/tema/menu');
		$this->load->view('pegawai/pengguna/ubah',$data);
		$this->load->view('pegawai/tema/footer');
	}
	public function update_proses(){
		$this->Mpengguna->update();
		echo '<script language="javascript">alert("Berhasil Di Ubah!"); document.location="'.site_url('pegawai/Pengguna').'"';
		echo '</script>';
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */