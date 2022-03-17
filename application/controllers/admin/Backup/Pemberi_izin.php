<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemberi_izin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->session->set_userdata('menu', 'Pemberi Izin');
		$this->session->set_userdata('menu2', 'kelola data');
		
		$this->load->model('admin/mpemberi_izin');
		if($this->session->userdata('level') != "Admin"){
			echo '<script language="javascript">alert("Tidak Dapat Diakses!"); document.location="'.site_url('login').'"</script>';
		}
	}

	public function index(){
		$data['pemberi_izin'] = $this->mpemberi_izin->get();
		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/pemberi_izin/index',$data);
		$this->load->view('admin/tema/footer');
	}
	public function update($id){
		$this->session->set_userdata('aksi', 'Ubah');
		$dt['data'] = $this->mpemberi_izin->get_edit($id);

		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/pemberi_izin/ubah',$dt);
		$this->load->view('admin/tema/footer');
	}
	public function update_proses(){
		$this->mpemberi_izin->update();
		echo '<script language="javascript">alert("Berhasil Di Ubah!"); document.location="'.site_url('admin/pemberi_izin').'"';
		echo '</script>';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */