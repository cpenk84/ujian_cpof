<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->helper(array('url','download','tgl_indo'));	
        $this->load->model('Ujian_model');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('ujian/landing');
	}
	public function login()
	{
		$this->load->view('ujian/login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password),
			'status' => 0
			);
		$cek = $this->Ujian_model->cek_login("peserta_cpof",$where)->num_rows();
		if($cek > 0){
 			$member = $this->db->where('username', $username)->get('peserta_cpof')->row();
			$data_session = array(
				'member_id' => $member->id,
				'nama_lengkap' => $member->nama_lengkap,
				'status' => "login"
				);
			$this->session->set_userdata($data_session);
			$peserta_id = $this->session->userdata('member_id');
			$cek_ujian = $this->db->where('id_peserta', $peserta_id)->get('ujian_cpof')->num_rows();
			if($cek_ujian == 0){
				$end_date = $this->db->query('select DATE_ADD(NOW(), INTERVAL 1 HOUR) AS end_date')->row();
				$data = array(
					'id_peserta' => $this->session->userdata('member_id'),
					'end_date' => $end_date->end_date,
				);
				$insert = $this->db->insert('ujian_cpof', $data);
			}
	        $this->res['success'] = true;
			$this->res['msg'] = 'Berhasil';
			$this->res['stts'] = $member->status;
		}else{
	        $this->res['success'] = false;
			$this->res['msg'] = 'Kode & Password Tidak sesuai';
		}
	    echo json_encode($this->res);
	}

	public function soal()
	{
		if(!$this->session->userdata('member_id')){
			redirect('ujian/login', 'refresh');
		}else{
			$id = $this->session->userdata('member_id');
			$peserta = $this->db->where('id',$id)->get('peserta_cpof')->row();
			$ujian = $this->db->where('id_peserta',$id)->get('ujian_cpof')->row();
			$soal = $this->db->order_by('RAND('.$id.')')->get('soal_cpof')->result();
			// Time Down
			$tglWaktu = $ujian->end_date;
			$endtahun = substr($tglWaktu,0,4);
			$endbulan = medium_english(substr($tglWaktu,5,2));
			$endtgl = substr($tglWaktu,8,2);
			$endwaktu = substr($tglWaktu,11);
			$end_gabung = $endbulan.' '.$endtgl.', '.$endtahun.' '.$endwaktu;

			$data = array(
				'peserta' => $peserta, 
				'soal' => $soal, 
				'batas_waktu' => $end_gabung,
			);
			$this->load->view('ujian/soal', $data);
		}
	}
	public function get_soal($no, $id)
	{
		$id_peserta = $this->session->userdata('member_id');
		$soal = $this->db->where('id',$id)->get('soal_cpof')->row();
		$cek_jawaban = $this->db->where('id_peserta', $id_peserta)->where('id_soal_cpof', $soal->id)->get('jawaban_cpof')->num_rows();
		if($cek_jawaban > 0){
			$jawaban = $this->db->where('id_peserta', $id_peserta)->where('id_soal_cpof', $soal->id)->get('jawaban_cpof')->row();
			$pg = $jawaban->pg;
		}else{$pg='z';}
		$data = array('no' => $no,'soal' => $soal, 'id_peserta' => $id_peserta, 'pg' => $pg);
		$this->load->view('ujian/load_soal', $data);
	}

	public function get_esay($id)
	{
		$id_peserta = $this->session->userdata('member_id');
		$soal = $this->db->where('id',$id)->get('soal_esay')->row();
		/*
		$cek_jawaban = $this->db->where('id_peserta', $id_peserta)->where('id_soal_cpof', $soal->id)->get('jawaban_cpof')->num_rows();
		if($cek_jawaban > 0){
			$jawaban = $this->db->where('id_peserta', $id_peserta)->where('id_soal_cpof', $soal->id)->get('jawaban_cpof')->row();
			$pg = $jawaban->pg;
		}else{$pg='z';}
		*/
		$sy = 1;
		$data = array('soal' => $soal, 'id_peserta' => $id_peserta, 'sy' => $sy);
		$this->load->view('ujian/load_esay', $data);
	}

	public function get_nosoal($id_peserta){
		$soal = $this->db->query('select sc.id,
									IF((select id from jawaban_cpof where id_soal_cpof = sc.id and id_peserta = '.$id_peserta.') IS NULL,0,1) As jwb
									from soal_cpof sc
									order by RAND('.$id_peserta.')')->result();
		/*
		$soal = $this->db->query('select sc.id, IF(jc.id IS NULL,0,1) AS jwb
								from soal_cpof sc
								left join jawaban_cpof jc on sc.id = jc.id_soal_cpof and jc.id_peserta = '.$id_peserta.'
								order by RAND('.$id_peserta.')')->result();
		*/
		$data = array('soal' => $soal, );
		$this->load->view('ujian/load_nosoal', $data);
	}

	public function jawab_soal($id_soal_cpof,$pg)
	{
		$id_peserta = $this->session->userdata('member_id');
		$cek = $this->db->where('id_peserta', $id_peserta)->where('id_soal_cpof', $id_soal_cpof)->get('jawaban_cpof')->num_rows();
		$data = array('id_peserta' => $id_peserta, 'id_soal_cpof' => $id_soal_cpof, 'pg' => $pg);
		if($cek > 0){
			$jawaban = $this->db->where('id_peserta', $id_peserta)->where('id_soal_cpof', $id_soal_cpof)->get('jawaban_cpof')->row();
	        $this->db->where('id', $jawaban->id);
	        $this->db->update('jawaban_cpof', $data);
	        $this->res['success'] = true;
		}else{
			$this->db->insert('jawaban_cpof', $data);
	        $this->res['success'] = true;
		}
	    echo json_encode($this->res);
	}

	public function finish_ujian(){
		if(!$this->session->userdata('member_id')){
			redirect('ujian/login', 'refresh');
		}else{
			$id_peserta = $this->session->userdata('member_id');
			$data = array('status' => 1, );
	        $this->db->where('id', $id_peserta);
	        $this->db->update('peserta_cpof', $data);
			$this->session->sess_destroy();
			// redirect('ujian/login', 'refresh');
	        $this->res['success'] = true;
	    	echo json_encode($this->res);
		}
	}


	function logout(){
		$this->session->sess_destroy();
		redirect('ujian/login', 'refresh');
	}
	/*
	public function index()
	{
		if(!get_cookie('affiliasi')){ 
			if(!empty($_GET['ref'])){
	            $cookie = array(
	                    'name'   => 'ref_by',
	                    'value'  => $_GET['ref'],
	                    'expire' => '3000000',
	                    'secure' => TRUE
	                    );
	        	set_cookie($cookie);
	        	redirect(site_url(''));              
			}
			$this->load->view('landing/regis_pmb_old');
		}else{
			$email = get_cookie('affiliasi');
			$cek = $this->db->where('email', $email)->get('register_pmb')->num_rows();
			if($cek > 0){
				redirect(site_url('pmb/status'));
				// echo 'test';
			}else{
				// setcookie('affiliasi', '', time()-3000000);
				setcookie("affiliasi", "", time()-3600, "/");
				redirect(site_url(''));
				// echo 'test2';
			}
		}
	}
	*/
	public function status()
	{
		$email = get_cookie('affiliasi');
		$cek = $this->db->where('email', $email)->get('register_pmb')->num_rows();
		if($cek > 0){

			$regis = $this->db->where('email', $email)->get('register_pmb')->row();

			// Midtrans start
			require_once(dirname(__FILE__) . '/../libraries/midtrans/Veritrans.php');
			Veritrans_Config::$serverKey = "SB-Mid-server-eh4vOy9vEZs73uT2tSWiE163";
			Veritrans_Config::$isSanitized = true;
			Veritrans_Config::$is3ds = true;

			// Required
	        $params = array(
	            'transaction_details' => array(
	                'order_id' => $regis->ref.'-'.rand(),
	                'gross_amount' => 150000,
	            ),
	            'customer_details' => array(
	                'first_name' => $regis->nama_lengkap,
	                'email' => $regis->email,
	                'phone' => $regis->no_hp,
	            ),
	        );
	        
	        $snapToken = Veritrans_Snap::getSnapToken($params);
			// Midtrans end

			$user_affiliasi = $this->db->where('ref_by', $regis->ref)->get('register_pmb')->result();
			$data = array(
				'user_regis' => $regis,
				'user_affiliasi' => $user_affiliasi, 
				'snapToken' => $snapToken,
			);
			if($regis->affiliasi == 1)
			{
				$data['register'] = $this->db->where('ref_by', $regis->ref)->get('register_pmb')->num_rows();
				$data['bayar'] = $this->db->where('ref_by', $regis->ref)->where('status_pembayaran', 1)->get('register_pmb')->num_rows();
			}
			$this->load->view('landing/regis_pmb', $data);
		}else{
			setcookie('affiliasi', '', time()-3000000);
			redirect(site_url(''));
		}
	}

	public function register()
	{
		$email = $this->input->post('email');
		$cek = $this->db->where('email', $email)->get('register_pmb')->num_rows();
		if($cek > 0){
			$this->res['success'] = false;
			$this->res['msg'] = 'Email Telah Terdaftar';
		}else{
	        $data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'email' => $email,
				'no_hp' => $this->input->post('no_hp'),
				'lokasi' => $this->input->post('lokasi'),
				'affiliasi' => $this->input->post('affiliasi'),
				'nama_bank' => $this->input->post('nama_bank'),
				'atas_nama' => $this->input->post('atas_nama'),
				'no_rek' => $this->input->post('no_rek'),
				'ref' => rand(),
				'ref_by' => $this->input->post('ref_by'),
				// 'ket' => $this->input->post('ket'),
				'created_at' => date('Y-m-d H:m:s'),
				// 'ket' => $this->input->post('ket'),
		    );
		    $input = $this->db->insert('register_pmb', $data);
		    if($input){
                $cookie = array(
                        'name'   => 'affiliasi',
                        'value'  => $email,
                        'expire' => '3000000',
                        'secure' => TRUE
                        );
            	set_cookie($cookie);                   
		    }
	        // $this->session->set_flashdata('message', 'Create Record Success');
	        $this->send_wa($email);
	        $this->res['success'] = true;
			$this->res['msg'] = 'Berhasil';
	        // redirect(site_url('prodi'));
	    }
	    echo json_encode($this->res);
	}

	public function test_replace($hp)
	{
		$hp0 = substr_replace($hp,'62',0,1);
		echo $hp0;
	}

	public function send_wa($email)
	{
		$regis = $this->db->where('email', $email)->get('register_pmb')->row();
		$no_wa = substr_replace($regis->no_hp,'62',0,1);
		$msg = '
Regestrasi PMB
*UNIVERSITAS MUAHAMMADIYAH BANTEN*
Atas Nama : *'.$regis->nama_lengkap.'* 
Telah kami terima,

Selanjutnya silahkan melakukan pembayaran pada :
'.base_url().'
Untuk selanjutnya menerima pesan *WhatsApp* berupa jadwal ujian masuk

*Info lebih lanjut*
WhatsApp Panitia :
https://wa.me/6285934237704
Kontak Panitia :
0859-4623-7704';
        $data_wa = array(
                    'to' => $no_wa, 
                    'message' => $msg,
        );

        $data_string = json_encode($data_wa);

        $authorization = "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1aWQiOjEyLCJpYXQiOjE2MzAwNDg1MDcsImV4cCI6MTYzMDMwNzcwN30.CghMsLkY6M5XsYrSGMxvcQv9lajORok_ib8ZEI4Vd-8";
        $device_key = "device-key: 86f332b8-356b-4400-ad3e-9356db802517";
        $ch = curl_init('https://waservice.e-lpkn.id/messages/send-text');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            $authorization,
            $device_key,
            'Content-Length: ' . strlen($data_string)
            )
        );
        $result = curl_exec($ch);
	}

	public function cek_status()
	{
		$email = $this->input->post('email');
		$cek = $this->db->where('email', $email)->get('register_pmb')->num_rows();
		if($cek > 0){
            $cookie = array(
                    'name'   => 'affiliasi',
                    'value'  => $email,
                    'expire' => '3000000',
                    'secure' => TRUE
                    );
        	set_cookie($cookie);                   
	        $this->res['success'] = true;
			$this->res['msg'] = 'Berhasil';
		}else{
			$this->res['success'] = false;
			$this->res['msg'] = 'Email Tidak Ditemukan';
		}
		echo json_encode($this->res);
	}

	public function brosur()
	{
		force_download('assets/brosur_umb.jpeg', NULL);
	}

	public function mid()
	{
		require_once(dirname(__FILE__) . '/../libraries/midtrans/Veritrans.php');
		Veritrans_Config::$serverKey = "SB-Mid-server-eh4vOy9vEZs73uT2tSWiE163";
		Veritrans_Config::$isSanitized = true;
		Veritrans_Config::$is3ds = true;

		// Required
        $params = array(
            'transaction_details' => array(
                'order_id' => 'pbjpenyedia-'.rand(),
                'gross_amount' => 150000,
            ),
            'customer_details' => array(
                'first_name' => 'Ferdi',
                'email' => 'ferdians@gmail.com',
                'phone' => '085946237704',
            ),
        );
        
        $snapToken = Veritrans_Snap::getSnapToken($params);

        echo $snapToken;
	}

	public function generate_kode()
	{
		$getData = $this->db->get('peserta_cpof')->result();
		foreach ($getData as $list) {
			$this->db->where('id',$list->id);
			$this->db->update('peserta_cpof',['view_password' => $this->generate_code(6)]);
			echo $list->id."<br/>";
		}
	}

    private function generate_code($length)
    {
        $str_result = 'abcdefghijklmnopqrstuvwxyz1234567890';
        return substr(str_shuffle($str_result), 0, $length);
    }

}
