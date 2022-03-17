<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->session->set_userdata('menu', 'Pegawai');
		$this->session->set_userdata('menu2', 'kelola data');
		
		$this->load->model('pegawai/Mpegawai');
		if($this->session->userdata('level') != "Pegawai"){
			echo '<script language="javascript">alert("Tidak Dapat Diakses!"); document.location="'.site_url('Login').'"</script>';
		}
	}

	public function index(){
		$data['pegawai'] = $this->Mpegawai->get();
		$this->load->view('pegawai/tema/head');
		$this->load->view('pegawai/tema/menu');
		$this->load->view('pegawai/pegawai/index',$data);
		$this->load->view('pegawai/tema/footer');
	}

	public function rincian($id){
		$this->session->set_userdata('aksi', 'Rincian');
		$dt['data'] = $this->Mpegawai->get_rincian($id);

		$dt['jabatan'] = $this->Mpegawai->get_jabatan();
		$dt['golongan'] = $this->Mpegawai->get_golongan();

		$this->load->view('pegawai/tema/head');
		$this->load->view('pegawai/tema/menu');
		$this->load->view('pegawai/pegawai/rincian',$dt);
		$this->load->view('pegawai/tema/footer');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */