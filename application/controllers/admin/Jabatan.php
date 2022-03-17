<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jabatan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->session->set_userdata('menu', 'Jabatan');
		$this->session->set_userdata('menu2', 'kelola data');

		$this->load->model('admin/Mjabatan');
		if($this->session->userdata('level') != "Admin"){
			echo '<script language="javascript">alert("Tidak Dapat Diakses!"); document.location="'.site_url('Login').'"</script>';
		}
	}
	public function index(){
		$data['jabatan'] = $this->Mjabatan->get();
		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/jabatan/index',$data);
		$this->load->view('admin/tema/footer');
	}
	public function insert(){
		$this->session->set_userdata('aksi', 'Tambah');

		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/jabatan/tambah');
		$this->load->view('admin/tema/footer');
	}
	public function insert_proses(){
		$this->Mjabatan->insert();
		echo '<script language="javascript">alert("Berhasil Di Simpan!"); document.location="'.site_url('admin/Jabatan').'"';
		echo '</script>';
	}
	public function update($id){
		$this->session->set_userdata('aksi', 'Ubah');

		$data['data'] = $this->Mjabatan->get_edit($id);
		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/jabatan/ubah',$data);
		$this->load->view('admin/tema/footer');
	}
	public function update_proses(){
		$this->Mjabatan->update();
		echo '<script language="javascript">alert("Berhasil Di Ubah!"); document.location="'.site_url('admin/Jabatan').'"';
		echo '</script>';
	}
	public function delete($id){
		$this->Mjabatan->delete($id);
		echo '<script language="javascript">alert("Berhasil Di Hapus!"); document.location="'.site_url('admin/Jabatan').'"';
		echo '</script>';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */