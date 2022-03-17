<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mizin extends CI_Model {
	public function insert()
	{
		$config['upload_path'] = 'izin/';
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size'] = 3000;
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        $file = $this->upload->data();
        $foto = $file['file_name'];

		$data = array(
			'id_pegawai'=> $this->input->post('id_pegawai'),
			'tujuan'=> $this->input->post('tujuan'),
			'tanggal'=> $this->input->post('tanggal'),
			'dari'=> $this->input->post('dari'),
			'status_izin'=> $this->input->post('status_izin'),
			'catatan'=> $this->input->post('catatan'),
			'foto'=> $foto,
			'lat'=> $this->input->post('lat'),
			'long'=> $this->input->post('long'),
			'sampai'=> $this->input->post('sampai'),
			'id_pemberi_izin'=> $this->input->post('id_pemberi_izin'),

		);
		$this->db->insert('izin',$data);
	}

	public function get_pegawai()
	{
		$query = $this->db->select('*')->from('pegawai')->order_by('id_pegawai','DESC')->get();
		return $query;
	}

	public function get_pemberi_izin()
	{
		$query = $this->db->select('*')->from('pegawai')
		->join('jabatan','pegawai.id_jabatan=jabatan.id_jabatan')
		->where('jabatan.kd_jabatan != "KD03"')->get();
		return $query;
	}

	public function get()
	{
		$query = $this->db->select('*')->from('izin')
		->join('pegawai','izin.id_pegawai=pegawai.id_pegawai')
		->order_by('id_izin','DESC')->get();
		return $query;
	}
	public function get_edit($id)
	{
		return $this->db->query("SELECT * from izin where id_izin='$id'")->row_array();
	}
	public function get_rincian($id)
	{
		return $this->db->query("SELECT * from izin JOIN pegawai ON pegawai.id_pegawai=izin.id_pegawai JOIN jabatan ON pegawai.id_jabatan=jabatan.id_jabatan where izin.id_izin='$id'")->row_array();
	}

	public function get_cetak($id)
	{
		return $this->db->query("SELECT * from izin JOIN pegawai ON pegawai.id_pegawai=izin.id_pegawai JOIN jabatan ON pegawai.id_jabatan=jabatan.id_jabatan JOIN golongan ON pegawai.id_golongan=golongan.id_golongan where izin.id_izin='$id'")->row_array();
	}

	public function update()
	{
		$config['upload_path'] = 'izin/';
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size'] = 3000;
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        $file = $this->upload->data();
        $foto = $file['file_name'];

		$data = array(
			'id_pegawai'=> $this->input->post('id_pegawai'),
			'tujuan'=> $this->input->post('tujuan'),
			'tanggal'=> $this->input->post('tanggal'),
			'dari'=> $this->input->post('dari'),
			'sampai'=> $this->input->post('sampai'),
			'status_izin'=> $this->input->post('status_izin'),
			'catatan'=> $this->input->post('catatan'),
			'foto'=> $foto,
			'lat'=> $this->input->post('lat'),
			'long'=> $this->input->post('long'),
			'id_pemberi_izin'=> $this->input->post('id_pemberi_izin'),
		);
		$where = array('id_izin' => $this->input->post('id_izin'));
		$this->db->update('izin',$data,$where);
	}

	public function delete($id)
	{
		$where = array('id_izin' => $id);
		$query = $this->db->delete('izin',$where);
		return $query;
	}
}