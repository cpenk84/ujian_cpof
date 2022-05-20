<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->helper('tgl_indo');
        $this->load->helper(array('url','download'));	
        $this->load->model('Tryout_model');
	}

	public function request($slug)
	{
		$kelas = $this->Tryout_model->get_kelas($slug);
		$data['id_kelas'] = $kelas->id;
		$this->load->view('landing/change_password', $data);
	}

	public function reset()
	{
		$id_kelas = $this->input->post('id_kelas');
		$email = $this->input->post('email');
		$cek = $this->Tryout_model->cek_user($email, $id_kelas);
		if($cek > 0){
			$this->Tryout_model->update_kode($kode, array('verifikasi_kode' => md5(rand(000000,999999)), ));
	        $this->res['success'] = true;
			$this->res['msg'] = 'Berhasil mengirim pesan';
		}else{
	        $this->res['success'] = false;
			$this->res['msg'] = 'Email tidak ditemukan';
		}
	    echo json_encode($this->res);
	}

	public function verifikasi_link($kode)
	{	
		// $email = get_cookie('email_regis');
		$this->db->where('verifikasi_kode', $kode);
		// $this->db->where('email', $email);
		$this->db->update('regis_sertif', array('status_user' => 1, ));
		if($this->db->affected_rows() > 0){
			$this->Tryout_model->update_kode($kode, array('verifikasi_kode' => md5(rand(000000,999999)), ));
	        $data['success'] = 1;
			$data['msg'] = 'Berhasil';
		}else{
	        $data['success'] = 0;
			$data['msg'] = 'Kode Tidak Sesuai';
		}
		$this->load->view('landing/verifikasi', $data);
	}

	public function verifikasi()
	{
		$kode = md5($this->input->post('kode'));
		$email = get_cookie('email_regis');
		$this->db->where('verifikasi_kode', $kode);
		$this->db->where('email', $email);
		$this->db->update('regis_sertif', array('status_user' => 1));
		if($this->db->affected_rows() > 0){
			$this->Tryout_model->update_kode($kode, array('verifikasi_kode' => md5(rand(000000,999999)), ));
	        $this->res['success'] = true;
			$this->res['msg'] = 'Berhasil';
		}else{
	        $this->res['success'] = false;
			$this->res['msg'] = 'Kode Tidak Sesuai';
		}
	    echo json_encode($this->res);
	}

	public function setpassword($slug, $kode)
	{	
		$kelas = $this->Tryout_model->get_kelas($slug);
		$cek = $this->db->where('id_kelas_sertif', $kelas->id)->where('verifikasi_kode', $kode)->get('regis_sertif')->num_rows();
		if($cek > 0){
			$user = $this->db->where('id_kelas_sertif', $kelas->id)->where('verifikasi_kode', $kode)->get('regis_sertif')->row();
	        $data['success'] = 1;
			$data['msg'] = 'Silahkan Masukan Password Baru Anda';
			$data['id_user'] = $user->id;
			$data['slug'] = $slug;
			
		}else{
	        $data['success'] = 0;
			$data['msg'] = 'Link Tidak Sesuai, Silahkan Cek Kembali';
		}
		$this->load->view('landing/setpassword', $data);
	}

	public function updatepassword()
	{
		// $kode = md5($this->input->post('kode'));
		$id_user = $this->input->post('id_user');
		$password = md5($this->input->post('password'));
		// $this->db->where('verifikasi_kode', $kode);
		$this->db->where('id', $id_user);
		$this->db->update('regis_sertif', array('password' => $password,'verifikasi_kode' => md5(rand(000000,999999)),));
		if($this->db->affected_rows() > 0){
			// $this->Tryout_model->update_kode($kode, array('verifikasi_kode' => md5(rand(000000,999999)), ));
	        $this->res['success'] = true;
			$this->res['msg'] = 'Berhasil';
		}else{
	        $this->res['success'] = false;
			$this->res['msg'] = 'Password yang anda masukan sama seperti password sebelumnya';
		}
	    echo json_encode($this->res);
	}


}