<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->session->set_userdata('menu', 'Laporan');
		$this->session->set_userdata('menu2', '');
		
		$this->load->model('admin/Mlaporan');
		if($this->session->userdata('level') != "Admin"){
			echo '<script language="javascript">alert("Tidak Dapat Diakses!"); document.location="'.site_url('Login').'"</script>';
		}
	}
	public function index(){
		$data['pegawai'] = $this->Mlaporan->get_pegawai();

		$this->load->view('admin/tema/head');
		$this->load->view('admin/tema/menu');
		$this->load->view('admin/laporan/index',$data);
		$this->load->view('admin/tema/footer');
	}

	public function cetak()
	{

		$dt = array();
		$dt['laporan'] = $this->Mlaporan->get_cetak();

		$this->load->view('admin/laporan/cetak',$dt);
		$html = $this->output->get_output();
		$this->load->library('dompdf_gen');
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('legal', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("Laporan Surat Keluar Kantor.pdf", array("Attachment"=>0));
	}
	public function cetak2()
	{

		$dt = array();
		$dt['laporan'] = $this->Mlaporan->get_cetak2();

		$this->load->view('admin/laporan/cetak2',$dt);
		$html = $this->output->get_output();
		$this->load->library('dompdf_gen');
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('legal', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("Laporan Surat Keluar Kantor.pdf", array("Attachment"=>0));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */