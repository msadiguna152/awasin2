<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mizin extends CI_Model {
	public function insert()
	{
		$config['upload_path'] = 'izin/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3000;
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
			'status_izin'=> "Menunggu",
			'id_pemberi_izin'=> $this->input->post('id_pemberi_izin'),

		);
		$this->db->insert('izin',$data);
	}

	public function get_pegawai()
	{
		$id = $this->session->userdata('id_pegawai');
		$query = $this->db->select('*')->from('pegawai')
		->where('id_pegawai',$id)->get();
		return $query;
	}

	public function get_pemberi_izin()
	{
		$query = $this->db->select('*')->from('pegawai')
		->join('jabatan','pegawai.id_jabatan=jabatan.id_jabatan')
		->where('jabatan.kd_jabatan!="KD03"')->get();
		return $query;
	}

	public function get()
	{
		$id = $this->session->userdata('id_pegawai');

		$query = $this->db->select('*')->from('izin')
		->join('pegawai','izin.id_pegawai=pegawai.id_pegawai')
		->where('pegawai.id_pegawai',$id)->order_by('izin.id_izin','DESC')->get();
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
	public function update()
	{
		$config['upload_path'] = 'izin/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3000;
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        $file = $this->upload->data();
        $foto = $file['file_name'];

        if ($this->input->post('id_pemberi_izin')=="") {
        	$data = array(
				'id_pegawai'=> $this->input->post('id_pegawai'),
				'tujuan'=> $this->input->post('tujuan'),
				'tanggal'=> $this->input->post('tanggal'),
				'dari'=> $this->input->post('dari'),
				'sampai'=> $this->input->post('sampai'),
				'foto'=> $foto,
			);
        } else {
        	$data = array(
				'id_pegawai'=> $this->input->post('id_pegawai'),
				'tujuan'=> $this->input->post('tujuan'),
				'tanggal'=> $this->input->post('tanggal'),
				'dari'=> $this->input->post('dari'),
				'sampai'=> $this->input->post('sampai'),
				'id_pemberi_izin'=> $this->input->post('id_pemberi_izin'),
			);
        }
		
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