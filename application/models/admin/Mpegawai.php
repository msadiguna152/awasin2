<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpegawai extends CI_Model {
	public function insert()
	{
		$data = array(
			'nama_pegawai'=> $this->input->post('nama_pegawai'),
			'nip'=> $this->input->post('nip'),
			'id_jabatan'=> $this->input->post('id_jabatan'),
			'id_golongan'=> $this->input->post('id_golongan'),
			'jenis_kelamin'=> $this->input->post('jenis_kelamin'),
			'tempat_lahir'=> $this->input->post('tempat_lahir'),
			'tanggal_lahir'=> $this->input->post('tanggal_lahir'),
			'alamat'=> $this->input->post('alamat'),
			'status'=> $this->input->post('status'),
			'no_hp'=> $this->input->post('no_hp'),
			'unit_kerja'=> $this->input->post('unit_kerja'),
		);
		$this->db->insert('pegawai',$data);

		$last_id = $this->db->insert_id();

		if ($this->input->post('kd_jabatan')!="KD03") {
			$data2 = array(
				'id_pegawai'=> $last_id,
				'nama_pengguna'=> $this->input->post('nama_pegawai'),
				'username'=> $this->input->post('nip'),
				'password'=> md5($this->input->post('nip')),
				'level'=> "Pemberi Izin",
				'foto_pengguna'=> "default.png",
			);
			$this->db->insert('pengguna',$data2);
		} else {
			$data2 = array(
				'id_pegawai'=> $last_id,
				'nama_pengguna'=> $this->input->post('nama_pegawai'),
				'username'=> $this->input->post('nip'),
				'password'=> md5($this->input->post('nip')),
				'level'=> "Pegawai",
				'foto_pengguna'=> "default.png",	
			);
			$this->db->insert('pengguna',$data2);
		}	
	}

	public function get()
	{
		$query = $this->db->select('*')->from('pegawai')
		->join('jabatan','pegawai.id_jabatan=jabatan.id_jabatan')
		->join('golongan','pegawai.id_golongan=golongan.id_golongan')
		->order_by('id_pegawai','DESC')->get();
		return $query;
	}

	public function get_rincian($id)
	{
		return $this->db->query("SELECT * from pegawai JOIN jabatan ON jabatan.id_jabatan=pegawai.id_jabatan JOIN golongan ON golongan.id_golongan=pegawai.id_golongan where pegawai.id_pegawai='$id'")->row_array();
	}

	public function get_jabatan()
	{
		$query = $this->db->select('*')->from('jabatan')->order_by('id_jabatan','ASC')->get();
		return $query;
	}

	public function get_golongan()
	{
		$query = $this->db->select('*')->from('golongan')->order_by('id_golongan','DESC')->get();
		return $query;
	}

	public function get_edit($id)
	{
		return $this->db->query("SELECT * from pegawai where id_pegawai='$id'")->row_array();
	}

	public function update()
	{
		$data = array(
			'nama_pegawai'=> $this->input->post('nama_pegawai'),
			'nip'=> $this->input->post('nip'),
			'id_jabatan'=> $this->input->post('id_jabatan'),
			'id_golongan'=> $this->input->post('id_golongan'),
			'jenis_kelamin'=> $this->input->post('jenis_kelamin'),
			'tempat_lahir'=> $this->input->post('tempat_lahir'),
			'tanggal_lahir'=> $this->input->post('tanggal_lahir'),
			'alamat'=> $this->input->post('alamat'),
			'status'=> $this->input->post('status'),
			'no_hp'=> $this->input->post('no_hp'),
			'unit_kerja'=> $this->input->post('unit_kerja'),
		);
		$where = array('id_pegawai' => $this->input->post('id_pegawai'));
		$this->db->update('pegawai',$data,$where);

		if ($this->input->post('kd_jabatan')!="KD03") {
			$data2 = array(
				'nama_pengguna'=> $this->input->post('nama_pegawai'),
				'username'=> $this->input->post('nip'),
				'password'=> md5($this->input->post('nip')),
				'level'=> "Pemberi Izin",
			);

			$this->db->update('pengguna',$data2,$where);

		} else {
			$data2 = array(
				'nama_pengguna'=> $this->input->post('nama_pegawai'),
				'username'=> $this->input->post('nip'),
				'password'=> md5($this->input->post('nip')),
				'level'=> "Pegawai",
			);
			$this->db->update('pengguna',$data2,$where);
		}
	}

	public function delete($id)
	{
		$where = array('id_pegawai' => $id);
		$query = $this->db->delete('pegawai',$where);
		$this->db->delete('pengguna',$where);
		return $query;
	}
}