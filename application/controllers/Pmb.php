<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pmb extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->helper(array('url','download'));	
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
}
