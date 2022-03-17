<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Izin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->session->set_userdata('menu', 'Izin');
		$this->session->set_userdata('menu2', '');
		
		$this->load->model('admin/Mizin');
		if($this->session->userdata('level') != "Admin"){
			echo '<script language="javascript">alert("Tidak Dapat Diakses!"); document.location="'.site_url('Login').'"</script>';
		}
	}
	public function index(){
		$data['izin'] = $this->Mizin->get();
		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/izin/index',$data);
		$this->load->view('admin/tema/footer');
	}
	public function map($id){
		$data['data'] = $this->Mizin->get_rincian($id);

		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/izin/map',$data);
		$this->load->view('admin/tema/footer');
	}
	public function insert(){
		$this->session->set_userdata('aksi', 'Tambah');
		$data['pegawai'] = $this->Mizin->get_pegawai();
		$data['pemberi_izin'] = $this->Mizin->get_pemberi_izin();

		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/izin/tambah',$data);
		$this->load->view('admin/tema/footer');
	}
	public function insert_proses(){
		$this->Mizin->insert();
		echo '<script language="javascript">alert("Berhasil Di Simpan!"); document.location="'.site_url('admin/Izin').'"';
		echo '</script>';
	}
	public function update($id){
		$this->session->set_userdata('aksi', 'Ubah');
		$data['pegawai'] = $this->Mizin->get_pegawai();
		$data['data'] = $this->Mizin->get_edit($id);
		$data['pemberi_izin'] = $this->Mizin->get_pemberi_izin();

		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/izin/ubah',$data);
		$this->load->view('admin/tema/footer');
	}
	public function rincian($id){
		$this->session->set_userdata('aksi', 'Rincian');
		$data['data'] = $this->Mizin->get_rincian($id);
		$data['pemberi_izin'] = $this->Mizin->get_pemberi_izin();
		
		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/izin/rincian',$data);
		$this->load->view('admin/tema/footer');
	}
	public function update_proses(){
		$this->Mizin->update();
		echo '<script language="javascript">alert("Berhasil Di Ubah!"); document.location="'.site_url('admin/Izin').'"';
		echo '</script>';
	}
	public function delete($id){
		$this->Mizin->delete($id);
		echo '<script language="javascript">alert("Berhasil Di Hapus!"); document.location="'.site_url('admin/Izin').'"';
		echo '</script>';
	}
	public function cetak()
	{
		$id_izin = $this->input->get('id_izin');
		$kd_jabatan = $this->input->get('kd_jabatan');
		
		if ($kd_jabatan=="KD01") {
			$dt = array();
			$dt['data'] = $this->Mizin->get_cetak($id_izin);

			$this->load->view('admin/izin/cetak',$dt);
			$html = $this->output->get_output();
			$this->load->library('dompdf_gen');
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper('legal', 'potrait');
			$this->dompdf->render();
			$this->dompdf->stream("Surat Izin Keluar Kantor.pdf", array("Attachment"=>0));
		}else{
			$dt = array();
			$dt['data'] = $this->Mizin->get_cetak($id_izin);

			$this->load->view('admin/izin/cetak2',$dt);
			$html = $this->output->get_output();
			$this->load->library('dompdf_gen');
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper('legal', 'potrait');
			$this->dompdf->render();
			$this->dompdf->stream("Surat Izin Keluar Kantor.pdf", array("Attachment"=>0));
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */