<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
/*
    public function index_post()
    {
       $data = json_decode(file_get_contents('php://input'));
        // echo $this->input->post('nama_lengkap');
       $res = array(
                'email' => $this->input->post('email'),
                'nama_lengkap' => $this->input->post('nama_lengkap'), 
                'id_kelas' => $this->input->post('id_kelas')
            );
       $this->response($res, 200);
    }
*/

    public function index_post()
    {
       $data = json_decode(file_get_contents('php://input'));
        // echo $data->fraud_status;
       $test = array('user_id' => $this->input->get('user_id'), 'kelas_id' => $this->input->get('kelas_id'),);
       $data = array('status_pembayaran' => 1, );
        $this->db->where('id', $this->input->get('user_id'));
        $this->db->where('id_kelas_sertif', $this->input->get('kelas_id'));
        $update = $this->db->update('regis_sertif', $data);
        if($update){
            $res['success'] = true;
            $user_regis = $this->db->where('id', $this->input->get('user_id'))->get('regis_sertif')->row();
            $this->postCURL($user_regis->id);
            $this->send_wa($user_regis->email, $user_regis->id_kelas_sertif);
        }else{
            $res['success'] = false;
        }
       $this->response($res, 200);
    }


    private function postCURL($id_user)
    {
        $user_regis = $this->db->where('id', $id_user)->get('regis_sertif')->row();
        $user_kelas = $this->db->where('id', $user_regis->id_kelas_sertif)->get('kelas_sertif')->row();
        $post = [
            'email' => $user_regis->email,
            'nama_lengkap' => $user_regis->nama_lengkap,
            'id_kelas'   => $user_kelas->id_kelas_sertif,
            'hp' => $user_regis->no_hp,
            'instansi' => $user_regis->instansi,
        ];
        $url = 'https://sertifikat.diklatonline.id/api/createsertif';
        $curl = curl_init($url);
        // curl_setopt($curl, CURLOPT_PUT, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($curl);
        curl_close($curl);
        echo $result;
    }


    public function send_wa($email, $id_sertif)
    {
        $regis = $this->db->where('email', $email)->get('regis_sertif')->row();
        $sertif = $this->db->where('id', $id_sertif)->get('kelas_sertif')->row();
        $no_wa = substr_replace($regis->no_hp,'62',0,1);
        $msg = '
Terimakasih telah melakukan pembayaran
*'.$sertif->judul.'*
Atas Nama : *'.$regis->nama_lengkap.'* 

Selanjutnya silahkan melakukan *Download Sertifikat* pada link dibawah :
'.$sertif->link.'
lalu masukan email Anda :
*'.$email.'*
Untuk dapat mengunduh sertifikat dan bonus menarik lainnya

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


    public function index_get(){
        $kelas = $this->db->where('id', $_GET['kelas_id'])->get('kelas_sertif')->row();
        $res['slug'] = $kelas->slug;
        $this->response($res, 200);
    }

/*    
	public function index_post()
	{
       $data = json_decode(file_get_contents('php://input'));
        // echo $data->fraud_status;
        $order_id = explode("-",$data->order_id);
        $id_user = $order_id[1];
        $subdomain = $order_id[0];
        // echo $id_user;
        if($data->transaction_status == 'settlement' or $data->transaction_status == 'success'){
            $this->postCURL($subdomain, $id_user);
        }
	}
	
    // private function postCURL($_url, $_param){
    private function postCURL($subdomain, $id_user)
    {
        $url = 'https://'.$subdomain.'.lpkn.id/api/payment/update?id_user='.$id_user.'&status_pembayaran=1';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_PUT, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'App-Key: JJEK8L4',
            'App-Secret: 2zqAzq6'
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
    }
*/

}