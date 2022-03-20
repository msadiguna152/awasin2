<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->session->set_userdata('menu', 'Pengguna');
		$this->session->set_userdata('menu2', 'kelola data');
		
		$this->load->model('pemberi_izin/Mpengguna');
		if($this->session->userdata('level') != "Pemberi Izin"){
			echo '<script language="javascript">alert("Tidak Dapat Diakses!"); document.location="'.site_url('Login').'"</script>';
		}
	}
	public function index(){
		$data['pengguna'] = $this->Mpengguna->get();
		$this->load->view('pemberi_izin/tema/head');
		$this->load->view('pemberi_izin/tema/menu');
		$this->load->view('pemberi_izin/pengguna/index',$data);
		$this->load->view('pemberi_izin/tema/footer');
	}

	public function update(){
		$this->session->set_userdata('aksi', 'Ubah');
		
		$data['data'] = $this->Mpengguna->get_edit();
		$this->load->view('pemberi_izin/tema/head');
		$this->load->view('pemberi_izin/tema/menu');
		$this->load->view('pemberi_izin/pengguna/ubah',$data);
		$this->load->view('pemberi_izin/tema/footer');
	}
	public function update_proses(){
		$this->Mpengguna->update();
		echo '<script language="javascript">alert("Berhasil Di Ubah!"); document.location="'.site_url('pemberi_izin/Pengguna').'"';
		echo '</script>';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */