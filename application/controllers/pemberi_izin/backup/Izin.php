<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Izin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->session->set_userdata('menu', 'Izin');
		$this->session->set_userdata('menu2', '');
		
		$this->load->model('pemberi_izin/Mizin');
		if($this->session->userdata('level') != "Pemberi Izin"){
			echo '<script language="javascript">alert("Tidak Dapat Diakses!"); document.location="'.site_url('Login').'"</script>';
		}
	}
	public function index(){
		$data['izin'] = $this->Mizin->get();
		$this->load->view('pemberi_izin/tema/head');
		$this->load->view('pemberi_izin/tema/menu');
		$this->load->view('pemberi_izin/izin/index',$data);
		$this->load->view('pemberi_izin/tema/footer');
	}
	public function insert(){
		$this->session->set_userdata('aksi', 'Tambah');
		$data['pegawai'] = $this->Mizin->get_pegawai();
		$data['pemberi_izin'] = $this->Mizin->get_pemberi_izin();

		$this->load->view('pemberi_izin/tema/head');
		$this->load->view('pemberi_izin/tema/menu');
		$this->load->view('pemberi_izin/izin/tambah',$data);
		$this->load->view('pemberi_izin/tema/footer');
	}

	public function map($id){
		$data['data'] = $this->Mizin->get_rincian($id);

		$this->load->view('pemberi_izin/tema/head');
		$this->load->view('pemberi_izin/tema/menu');
		$this->load->view('pemberi_izin/izin/map',$data);
		$this->load->view('pemberi_izin/tema/footer');
	}

	public function insert_proses(){
		$this->Mizin->insert();
		echo '<script language="javascript">alert("Berhasil Di Simpan!"); document.location="'.site_url('pemberi_izin/Izin').'"';
		echo '</script>';
	}
	public function update($id){
		$this->session->set_userdata('aksi', 'Ubah');
		$data['pegawai'] = $this->Mizin->get_pegawai();
		$data['data'] = $this->Mizin->get_edit($id);
		$data['pemberi_izin'] = $this->Mizin->get_pemberi_izin();

		$this->load->view('pemberi_izin/tema/head');
		$this->load->view('pemberi_izin/tema/menu');
		$this->load->view('pemberi_izin/izin/ubah',$data);
		$this->load->view('pemberi_izin/tema/footer');
	}
	public function rincian($id){
		$this->session->set_userdata('aksi', 'Rincian');
		$data['data'] = $this->Mizin->get_rincian($id);
		$data['pemberi_izin'] = $this->Mizin->get_pemberi_izin();
		
		$this->load->view('pemberi_izin/tema/head');
		$this->load->view('pemberi_izin/tema/menu');
		$this->load->view('pemberi_izin/izin/rincian',$data);
		$this->load->view('pemberi_izin/tema/footer');
	}
	public function update_proses(){
		$this->Mizin->update();
		echo '<script language="javascript">alert("Berhasil Di Ubah!"); document.location="'.site_url('pemberi_izin/Izin').'"';
		echo '</script>';
	}
	public function delete($id){
		$this->Mizin->delete($id);
		echo '<script language="javascript">alert("Berhasil Di Hapus!"); document.location="'.site_url('pemberi_izin/Izin').'"';
		echo '</script>';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */