<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lokasi_kampus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lokasi_kampus_model');
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
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_lokasi_kampus')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->load->view('lokasi_kampus/lokasi_kampus_list');
        }
    } 
    
    public function json() {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_lokasi_kampus')){
            show_error('You must be an administrators to view this page.');
        }else{
            header('Content-Type: application/json');
            echo $this->Lokasi_kampus_model->json();
        }
    }

    public function read($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_lokasi_kampus')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Lokasi_kampus_model->get_by_id($id);
            if ($row) {
                $data = array(
			'id' => $row->id,
			'nama_kampus' => $row->nama_kampus,
			'alamat_kampus' => $row->alamat_kampus,
			'ket' => $row->ket,
		    );
                $this->load->view('lokasi_kampus/lokasi_kampus_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('lokasi_kampus'));
            }
        }
    }

    public function create() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('create_lokasi_kampus')){
            show_error('You must be an administrators to view this page.');
        }else{
            $data = array(
                'button' => 'Create',
                'action' => site_url('lokasi_kampus/create_action'),
			    'id' => set_value('id'),
			    'nama_kampus' => set_value('nama_kampus'),
			    'alamat_kampus' => set_value('alamat_kampus'),
			    'ket' => set_value('ket'),
			);
            $this->load->view('lokasi_kampus/lokasi_kampus_form', $data);
        }
    }
    
    public function create_action() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('create_lokasi_kampus')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                $data = array(
					'nama_kampus' => $this->input->post('nama_kampus',TRUE),
					'alamat_kampus' => $this->input->post('alamat_kampus',TRUE),
					'ket' => $this->input->post('ket',TRUE),
			    );
                $this->Lokasi_kampus_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('lokasi_kampus'));
            }
        }
    }
    
    public function update($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_lokasi_kampus')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Lokasi_kampus_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('lokasi_kampus/update_action'),
					'id' => set_value('id', $row->id),
					'nama_kampus' => set_value('nama_kampus', $row->nama_kampus),
					'alamat_kampus' => set_value('alamat_kampus', $row->alamat_kampus),
					'ket' => set_value('ket', $row->ket),
			    );
                $this->load->view('lokasi_kampus/lokasi_kampus_form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('lokasi_kampus'));
            }
        }
    }
    
    public function update_action() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_lokasi_kampus')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('id', TRUE));
            } else {
                $data = array(
					'nama_kampus' => $this->input->post('nama_kampus',TRUE),
					'alamat_kampus' => $this->input->post('alamat_kampus',TRUE),
					'ket' => $this->input->post('ket',TRUE),
			    );

                $this->Lokasi_kampus_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('lokasi_kampus'));
            }
        }
    }
    
    public function delete($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('delete_lokasi_kampus')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Lokasi_kampus_model->get_by_id($id);

            if ($row) {
                $this->Lokasi_kampus_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');
                redirect(site_url('lokasi_kampus'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('lokasi_kampus'));
            }
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kampus', 'nama kampus', 'trim|required');
	$this->form_validation->set_rules('alamat_kampus', 'alamat kampus', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Lokasi_kampus.php */
/* Location: ./application/controllers/Lokasi_kampus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-26 11:55:13 */
/* http://harviacode.com */