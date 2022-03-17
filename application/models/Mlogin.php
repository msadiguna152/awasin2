<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mlogin extends CI_Model{
	function cek($username, $password){
		$query = $this->db->select('*')->from('pengguna')->where('username',$username)->where('password',md5($password))->get();
		return $query;
	}	
}