<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Regis_sertif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Regis_sertif_model');
        $this->load->library('form_validation');
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->library('ion_auth_acl');
        $this->load->helper(['url', 'language']);
        $this->load->library('datatables');
        $this->lang->load('auth');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_regis_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->load->view('regis_sertif/regis_sertif_list');
        }
    } 
    
    public function json() {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_regis_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            header('Content-Type: application/json');
            echo $this->Regis_sertif_model->json();
        }
    }

    public function json_kelas($id) {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_regis_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            header('Content-Type: application/json');
            echo $this->Regis_sertif_model->json_kelas($id);
        }
    }

    public function read($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_regis_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Regis_sertif_model->get_by_id($id);
            if ($row) {
                $data = array(
			'id' => $row->id,
			'id_kelas_sertif' => $row->id_kelas_sertif,
			'nama_lengkap' => $row->nama_lengkap,
			'no_hp' => $row->no_hp,
			'email' => $row->email,
			'instansi' => $row->instansi,
			'status_pembayaran' => $row->status_pembayaran,
			'create_date' => $row->create_date,
			'update_date' => $row->update_date,
		    );
                $this->load->view('regis_sertif/regis_sertif_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('regis_sertif'));
            }
        }
    }

    public function create() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('create_regis_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $data = array(
                'button' => 'Create',
                'action' => site_url('regis_sertif/create_action'),
			    'id' => set_value('id'),
			    'id_kelas_sertif' => set_value('id_kelas_sertif'),
			    'nama_lengkap' => set_value('nama_lengkap'),
			    'no_hp' => set_value('no_hp'),
			    'email' => set_value('email'),
			    'instansi' => set_value('instansi'),
			    'status_pembayaran' => set_value('status_pembayaran'),
			    'create_date' => set_value('create_date'),
			    'update_date' => set_value('update_date'),
			);
            $this->load->view('regis_sertif/regis_sertif_form', $data);
        }
    }
    
    public function create_action() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('create_regis_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                $data = array(
					'id_kelas_sertif' => $this->input->post('id_kelas_sertif',TRUE),
					'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
					'no_hp' => $this->input->post('no_hp',TRUE),
					'email' => $this->input->post('email',TRUE),
					'instansi' => $this->input->post('instansi',TRUE),
					'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
					'create_date' => $this->input->post('create_date',TRUE),
					'update_date' => $this->input->post('update_date',TRUE),
			    );
                $this->Regis_sertif_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('regis_sertif'));
            }
        }
    }
    
    public function update($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_regis_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Regis_sertif_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('regis_sertif/update_action'),
					'id' => set_value('id', $row->id),
					'id_kelas_sertif' => set_value('id_kelas_sertif', $row->id_kelas_sertif),
					'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
					'no_hp' => set_value('no_hp', $row->no_hp),
					'email' => set_value('email', $row->email),
					'instansi' => set_value('instansi', $row->instansi),
					'status_pembayaran' => set_value('status_pembayaran', $row->status_pembayaran),
					'create_date' => set_value('create_date', $row->create_date),
					'update_date' => set_value('update_date', $row->update_date),
			    );
                $this->load->view('regis_sertif/regis_sertif_form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('regis_sertif'));
            }
        }
    }
    
    public function update_action() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_regis_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('id', TRUE));
            } else {
                $data = array(
					'id_kelas_sertif' => $this->input->post('id_kelas_sertif',TRUE),
					'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
					'no_hp' => $this->input->post('no_hp',TRUE),
					'email' => $this->input->post('email',TRUE),
					'instansi' => $this->input->post('instansi',TRUE),
					'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
					'create_date' => $this->input->post('create_date',TRUE),
					'update_date' => $this->input->post('update_date',TRUE),
			    );

                $this->Regis_sertif_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('regis_sertif'));
            }
        }
    }
    
    public function konfirmasi($id) {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_regis_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $user_regis = $this->db->where('id',$id)->get('regis_sertif')->row();
            $data = array(
                'status_pembayaran' => 1, 
            );
            $this->Regis_sertif_model->update($id, $data);
            $this->postCURL($id);
            $this->send_wa($user_regis->email, $user_regis->id_kelas_sertif);
            $this->res['success'] = true;
            echo json_encode($this->res);
        }
    }

    public function batal_konfirmasi($id) {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_regis_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $data = array(
                'status_pembayaran' => 0, 
            );
            $this->Regis_sertif_model->update($id, $data);
            $this->res['success'] = true;
            echo json_encode($this->res);
        }
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


    public function delete($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('delete_regis_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Regis_sertif_model->get_by_id($id);

            if ($row) {
                $this->Regis_sertif_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');
                redirect(site_url('regis_sertif'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('regis_sertif'));
            }
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kelas_sertif', 'id kelas sertif', 'trim|required');
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('instansi', 'instansi', 'trim|required');
	$this->form_validation->set_rules('status_pembayaran', 'status pembayaran', 'trim|required');
	$this->form_validation->set_rules('create_date', 'create date', 'trim|required');
	$this->form_validation->set_rules('update_date', 'update date', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Regis_sertif.php */
/* Location: ./application/controllers/Regis_sertif.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-09-24 13:20:15 */
/* http://harviacode.com */