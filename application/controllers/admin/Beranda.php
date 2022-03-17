<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {
public function __construct() {
		parent::__construct();
		$this->session->set_userdata('menu', 'Beranda');
		$this->session->set_userdata('menu2', '');

		$this->load->model('admin/Mberanda');

		if($this->session->userdata('level') != "Admin"){
			echo '<script language="javascript">alert("Tidak Dapat Diakses!"); document.location="'.site_url('Login').'"</script>';
		}
	}
	public function index()
	{
		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/beranda/index');
		$this->load->view('admin/tema/footer');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */