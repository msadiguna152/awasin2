<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {
public function __construct() {
		parent::__construct();
		$this->session->set_userdata('menu', 'Beranda');
		$this->session->set_userdata('menu2', '');

		$this->load->model('pegawai/Mberanda');

		if($this->session->userdata('level') != "Pegawai"){
			echo '<script language="javascript">alert("Tidak Dapat Diakses!"); document.location="'.site_url('Login').'"</script>';
		}
	}
	public function index()
	{
		$this->load->view('pegawai/tema/head');
		$this->load->view('pegawai/tema/menu');
		$this->load->view('pegawai/beranda/index');
		$this->load->view('pegawai/tema/footer');
	}
	public function profil()
	{
		$id = $this->session->userdata('id_user');
		$data['user'] = $this->Mberanda->get_edit($id);
		$this->load->view('pegawai/tema/head');
		$this->load->view('pegawai/tema/menu');
		$this->load->view('pegawai/beranda/profil',$data);
		$this->load->view('pegawai/tema/footer');
	}
	public function ubah_proses()
	{
		$this->Mberanda->update();
		echo '<script language="javascript">alert("Data Berhasil Di Simpan!"); document.location="'.site_url('pegawai/Beranda/profil').'"';
		echo '</script>';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */