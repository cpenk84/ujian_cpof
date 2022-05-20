<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register_pmb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Register_pmb_model');
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
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_register_pmb')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->load->view('register_pmb/register_pmb_list');
        }
    } 
    
    public function json() {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_register_pmb')){
            show_error('You must be an administrators to view this page.');
        }else{
            header('Content-Type: application/json');
            echo $this->Register_pmb_model->json();
        }
    }

    public function affiliasi()
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_register_pmb')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->load->view('register_pmb/register_affiliasi_list');
        }
    } 
    
    public function json_affiliasi() {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_register_pmb')){
            show_error('You must be an administrators to view this page.');
        }else{
            header('Content-Type: application/json');
            echo $this->Register_pmb_model->json_affiliasi();
        }
    }

    public function read($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_register_pmb')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Register_pmb_model->get_by_id($id);
            if ($row) {
                $data = array(
            'id' => $row->id,
            'nama_lengkap' => $row->nama_lengkap,
            'email' => $row->email,
            'no_hp' => $row->no_hp,
            'lokasi' => $row->lokasi,
            'affiliasi' => $row->affiliasi,
            'nama_bank' => $row->nama_bank,
            'no_rek' => $row->no_rek,
            'ref' => $row->ref,
            'ref_by' => $row->ref_by,
            'status_pembayaran' => $row->status_pembayaran,
            'created_at' => $row->created_at,
            'updated_at' => $row->updated_at,
            );
                $this->load->view('register_pmb/register_pmb_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('register_pmb'));
            }
        }
    }

    public function read_affiliasi($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_register_pmb')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Register_pmb_model->get_by_id($id);
            $register_by = $this->db->where('ref_by', $row->ref)->get('register_pmb')->num_rows();
            $bayar = $this->db->where('ref_by', $row->ref)->where('status_pembayaran', 1)->get('register_pmb')->num_rows();
            if ($row) {
                $data = array(
            'id' => $row->id,
            'nama_lengkap' => $row->nama_lengkap,
            'email' => $row->email,
            'no_hp' => $row->no_hp,
            'lokasi' => $row->lokasi,
            'affiliasi' => $row->affiliasi,
            'nama_bank' => $row->nama_bank,
            'no_rek' => $row->no_rek,
            'ref' => $row->ref,
            'ref_by' => $row->ref_by,
            'status_pembayaran' => $row->status_pembayaran,
            'created_at' => $row->created_at,
            'updated_at' => $row->updated_at,
            'register_by' => $register_by,
            'bayar' => $bayar,
            );
                $this->load->view('register_pmb/register_affiliasi_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('register_pmb'));
            }
        }
    }

    public function create() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('create_register_pmb')){
            show_error('You must be an administrators to view this page.');
        }else{
            $data = array(
                'button' => 'Create',
                'action' => site_url('register_pmb/create_action'),
			    'id' => set_value('id'),
			    'nama_lengkap' => set_value('nama_lengkap'),
			    'email' => set_value('email'),
			    'no_hp' => set_value('no_hp'),
			    'lokasi' => set_value('lokasi'),
			    'affiliasi' => set_value('affiliasi'),
			    'nama_bank' => set_value('nama_bank'),
			    'no_rek' => set_value('no_rek'),
			    'ref' => set_value('ref'),
			    'ref_by' => set_value('ref_by'),
			    'status_pembayaran' => set_value('status_pembayaran'),
			    'created_at' => set_value('created_at'),
			    'updated_at' => set_value('updated_at'),
			);
            $this->load->view('register_pmb/register_pmb_form', $data);
        }
    }
    
    public function create_action() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('create_register_pmb')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                $data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
					'email' => $this->input->post('email',TRUE),
					'no_hp' => $this->input->post('no_hp',TRUE),
					'lokasi' => $this->input->post('lokasi',TRUE),
					'affiliasi' => $this->input->post('affiliasi',TRUE),
					'nama_bank' => $this->input->post('nama_bank',TRUE),
					'no_rek' => $this->input->post('no_rek',TRUE),
					'ref' => $this->input->post('ref',TRUE),
					'ref_by' => $this->input->post('ref_by',TRUE),
					'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
					'created_at' => $this->input->post('created_at',TRUE),
					'updated_at' => $this->input->post('updated_at',TRUE),
			    );
                $this->Register_pmb_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('register_pmb'));
            }
        }
    }
    
    public function update($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_register_pmb')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Register_pmb_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('register_pmb/update_action'),
					'id' => set_value('id', $row->id),
					'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
					'email' => set_value('email', $row->email),
					'no_hp' => set_value('no_hp', $row->no_hp),
					'lokasi' => set_value('lokasi', $row->lokasi),
					'affiliasi' => set_value('affiliasi', $row->affiliasi),
					'nama_bank' => set_value('nama_bank', $row->nama_bank),
					'no_rek' => set_value('no_rek', $row->no_rek),
					'ref' => set_value('ref', $row->ref),
					'ref_by' => set_value('ref_by', $row->ref_by),
					'status_pembayaran' => set_value('status_pembayaran', $row->status_pembayaran),
					'created_at' => set_value('created_at', $row->created_at),
					'updated_at' => set_value('updated_at', $row->updated_at),
			    );
                $this->load->view('register_pmb/register_pmb_form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('register_pmb'));
            }
        }
    }
    
    public function update_action() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_register_pmb')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('id', TRUE));
            } else {
                $data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
					'email' => $this->input->post('email',TRUE),
					'no_hp' => $this->input->post('no_hp',TRUE),
					'lokasi' => $this->input->post('lokasi',TRUE),
					'affiliasi' => $this->input->post('affiliasi',TRUE),
					'nama_bank' => $this->input->post('nama_bank',TRUE),
					'no_rek' => $this->input->post('no_rek',TRUE),
					'ref' => $this->input->post('ref',TRUE),
					'ref_by' => $this->input->post('ref_by',TRUE),
					'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
					'created_at' => $this->input->post('created_at',TRUE),
					'updated_at' => $this->input->post('updated_at',TRUE),
			    );

                $this->Register_pmb_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('register_pmb'));
            }
        }
    }
    
    public function delete($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('delete_register_pmb')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Register_pmb_model->get_by_id($id);

            if ($row) {
                $this->Register_pmb_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');
                redirect(site_url('register_pmb'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('register_pmb'));
            }
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
	$this->form_validation->set_rules('affiliasi', 'affiliasi', 'trim|required');
	$this->form_validation->set_rules('nama_bank', 'nama bank', 'trim|required');
	$this->form_validation->set_rules('no_rek', 'no rek', 'trim|required');
	$this->form_validation->set_rules('ref', 'ref', 'trim|required');
	$this->form_validation->set_rules('ref_by', 'ref by', 'trim|required');
	$this->form_validation->set_rules('status_pembayaran', 'status pembayaran', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Register_pmb.php */
/* Location: ./application/controllers/Register_pmb.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-26 12:15:32 */
/* http://harviacode.com */