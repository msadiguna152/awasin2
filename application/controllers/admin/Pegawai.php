<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->session->set_userdata('menu', 'Pegawai');
		$this->session->set_userdata('menu2', 'kelola data');
		
		$this->load->model('admin/Mpegawai');
		if($this->session->userdata('level') != "Admin"){
			echo '<script language="javascript">alert("Tidak Dapat Diakses!"); document.location="'.site_url('Login').'"</script>';
		}
	}

	public function index(){
		$data['pegawai'] = $this->Mpegawai->get();
		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/pegawai/index',$data);
		$this->load->view('admin/tema/footer');
	}

	public function rincian($id){
		$this->session->set_userdata('aksi', 'Rincian');
		$dt['data'] = $this->Mpegawai->get_rincian($id);

		$dt['jabatan'] = $this->Mpegawai->get_jabatan();
		$dt['golongan'] = $this->Mpegawai->get_golongan();

		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/pegawai/rincian',$dt);
		$this->load->view('admin/tema/footer');
	}
	public function insert(){
		$this->session->set_userdata('aksi', 'Tambah');

		$data['jabatan'] = $this->Mpegawai->get_jabatan();
		$data['golongan'] = $this->Mpegawai->get_golongan();
		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/pegawai/tambah',$data);
		$this->load->view('admin/tema/footer');
	}
	public function insert_proses(){
		$this->Mpegawai->insert();
		echo '<script language="javascript">alert("Berhasil Di Simpan!"); document.location="'.site_url('admin/Pegawai').'"';
		echo '</script>';
	}
	public function update($id){
		$this->session->set_userdata('aksi', 'Ubah');

		$dt['jabatan'] = $this->Mpegawai->get_jabatan();
		$dt['golongan'] = $this->Mpegawai->get_golongan();
		$dt['data'] = $this->Mpegawai->get_edit($id);

		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/pegawai/ubah',$dt);
		$this->load->view('admin/tema/footer');
	}
	public function update_proses(){
		$this->Mpegawai->update();
		echo '<script language="javascript">alert("Berhasil Di Ubah!"); document.location="'.site_url('admin/Pegawai').'"';
		echo '</script>';
	}
	public function delete($id){
		$this->Mpegawai->delete($id);
		echo '<script language="javascript">alert("Berhasil Di Hapus!"); document.location="'.site_url('admin/Pegawai').'"';
		echo '</script>';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */