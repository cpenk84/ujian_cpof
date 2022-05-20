<?php 

class Ujian_model extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	public function find_by_username($username){
		$query = $this->db->get_where('peserta_cpof', ['username' => $username]);
		return $query ? $query->row() : false;
	}
}