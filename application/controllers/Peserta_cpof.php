<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peserta_cpof extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Peserta_cpof_model');
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
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_peserta_cpof')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->load->view('peserta_cpof/peserta_cpof_list');
        }
    } 
    
    public function json() {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_peserta_cpof')){
            show_error('You must be an administrators to view this page.');
        }else{
            header('Content-Type: application/json');
            echo $this->Peserta_cpof_model->json();
        }
    }

    public function read($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_peserta_cpof')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Peserta_cpof_model->get_by_id($id);
            if ($row) {
                $data = array(
			'id' => $row->id,
			'nama_lengkap' => $row->nama_lengkap,
			'username' => $row->username,
			'password' => $row->password,
			'view_password' => $row->view_password,
			'status' => $row->status,
		    );
                $this->load->view('peserta_cpof/peserta_cpof_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('peserta_cpof'));
            }
        }
    }

    public function create() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('create_peserta_cpof')){
            show_error('You must be an administrators to view this page.');
        }else{
            $data = array(
                'button' => 'Create',
                'action' => site_url('peserta_cpof/create_action'),
			    'id' => set_value('id'),
			    'nama_lengkap' => set_value('nama_lengkap'),
			    'username' => set_value('username'),
			    'password' => set_value('password'),
			    'view_password' => set_value('view_password'),
			    'status' => set_value('status'),
			);
            $this->load->view('peserta_cpof/peserta_cpof_form', $data);
        }
    }
    
    public function create_action() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('create_peserta_cpof')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                $data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
					'username' => $this->input->post('username',TRUE),
					'password' => $this->input->post('password',TRUE),
					'view_password' => $this->input->post('view_password',TRUE),
					'status' => $this->input->post('status',TRUE),
			    );
                $this->Peserta_cpof_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('peserta_cpof'));
            }
        }
    }
    
    public function update($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_peserta_cpof')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Peserta_cpof_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('peserta_cpof/update_action'),
					'id' => set_value('id', $row->id),
					'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
					'username' => set_value('username', $row->username),
					'password' => set_value('password', $row->password),
					'view_password' => set_value('view_password', $row->view_password),
					'status' => set_value('status', $row->status),
			    );
                $this->load->view('peserta_cpof/peserta_cpof_form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('peserta_cpof'));
            }
        }
    }
    
    public function update_action() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_peserta_cpof')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('id', TRUE));
            } else {
                $data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
					'username' => $this->input->post('username',TRUE),
					'password' => $this->input->post('password',TRUE),
					'view_password' => $this->input->post('view_password',TRUE),
					'status' => $this->input->post('status',TRUE),
			    );

                $this->Peserta_cpof_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('peserta_cpof'));
            }
        }
    }
    
    public function delete($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('delete_peserta_cpof')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Peserta_cpof_model->get_by_id($id);

            if ($row) {
                $this->Peserta_cpof_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');
                redirect(site_url('peserta_cpof'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('peserta_cpof'));
            }
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('view_password', 'view password', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "peserta_cpof.xls";
        $judul = "peserta_cpof";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "View Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Peserta_cpof_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->view_password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function print_bukti($id)
    {
        $peserta = $this->db->where('id',$id)->get('peserta_cpof')->row();
        $soal_1 = $this->db->query('select sc.id, sc.soal, sc.ja, sc.jb, sc.jc, sc.jd, sc.jk,
                                    IF((select pg from jawaban_cpof where id_peserta = '.$id.' and id_soal_cpof = sc.id) IS NULL,"-",(select pg from jawaban_cpof where id_peserta = '.$id.' and id_soal_cpof = sc.id)) AS pg
                                    from soal_cpof sc
                                    where sc.id > 0 and sc.id < 6
                                    order by sc.id
                                    ')->result();
        $soal_2 = $this->db->query('select sc.id, sc.soal, sc.ja, sc.jb, sc.jc, sc.jd, sc.jk,
                                    IF((select pg from jawaban_cpof where id_peserta = '.$id.' and id_soal_cpof = sc.id) IS NULL,"-",(select pg from jawaban_cpof where id_peserta = '.$id.' and id_soal_cpof = sc.id)) AS pg
                                    from soal_cpof sc
                                    where sc.id > 5 and sc.id < 11
                                    order by sc.id
                                    ')->result();
        $soal_3 = $this->db->query('select sc.id, sc.soal, sc.ja, sc.jb, sc.jc, sc.jd, sc.jk,
                                    IF((select pg from jawaban_cpof where id_peserta = '.$id.' and id_soal_cpof = sc.id) IS NULL,"-",(select pg from jawaban_cpof where id_peserta = '.$id.' and id_soal_cpof = sc.id)) AS pg
                                    from soal_cpof sc
                                    where sc.id > 10 and sc.id < 16
                                    order by sc.id
                                    ')->result();
        $soal_4 = $this->db->query('select sc.id, sc.soal, sc.ja, sc.jb, sc.jc, sc.jd, sc.jk,
                                    IF((select pg from jawaban_cpof where id_peserta = '.$id.' and id_soal_cpof = sc.id) IS NULL,"-",(select pg from jawaban_cpof where id_peserta = '.$id.' and id_soal_cpof = sc.id)) AS pg
                                    from soal_cpof sc
                                    where sc.id > 15 and sc.id < 21
                                    order by sc.id
                                    ')->result();
        $soal_5 = $this->db->query('select sc.id, sc.soal, sc.ja, sc.jb, sc.jc, sc.jd, sc.jk,
                                    IF((select pg from jawaban_cpof where id_peserta = '.$id.' and id_soal_cpof = sc.id) IS NULL,"-",(select pg from jawaban_cpof where id_peserta = '.$id.' and id_soal_cpof = sc.id)) AS pg
                                    from soal_cpof sc
                                    where sc.id > 20 and sc.id < 26
                                    order by sc.id
                                    ')->result();
        $soal_6 = $this->db->query('select sc.id, sc.soal, sc.ja, sc.jb, sc.jc, sc.jd, sc.jk,
                                    IF((select pg from jawaban_cpof where id_peserta = '.$id.' and id_soal_cpof = sc.id) IS NULL,"-",(select pg from jawaban_cpof where id_peserta = '.$id.' and id_soal_cpof = sc.id)) AS pg
                                    from soal_cpof sc
                                    where sc.id > 25 and sc.id < 31
                                    order by sc.id
                                    ')->result();
        $nilai = $this->db->query('select sc.id, sc.jk, jc.pg
                                    from soal_cpof sc
                                    inner join jawaban_cpof jc on sc.id = jc.id_soal_cpof and jc.id_peserta = '.$id.'
                                    where sc.jk = jc.pg')->num_rows();
        $data = array(
            'peserta' => $peserta,
            'soal_1' => $soal_1, 
            'soal_2' => $soal_2, 
            'soal_3' => $soal_3, 
            'soal_4' => $soal_4, 
            'soal_5' => $soal_5, 
            'soal_6' => $soal_6, 
            'nilai' => ($nilai*4)
        );
        $this->load->view('ujian/print_bukti', $data);
        // echo "tesy";
    }

}

/* End of file Peserta_cpof.php */
/* Location: ./application/controllers/Peserta_cpof.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-09 07:09:57 */
/* http://harviacode.com */