<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas_sertif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelas_sertif_model');
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
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->load->view('kelas_sertif/kelas_sertif_list');
        }
    } 
    
    public function json() {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            header('Content-Type: application/json');
            echo $this->Kelas_sertif_model->json();
        }
    }

    public function read($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Kelas_sertif_model->get_by_id($id);
            if ($row) {
                $data = array(
			'id' => $row->id,
			'judul' => $row->judul,
			'id_kelas_sertif' => $row->id_kelas_sertif,
			'slug' => $row->slug,
			'brosur' => $row->brosur,
			'link' => $row->link,
			'status' => $row->status,
		    );
                $this->load->view('kelas_sertif/kelas_sertif_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('kelas_sertif'));
            }
        }
    }

    public function create() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('create_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $getkelas = $this->getkelas();
            $data = array(
                'button' => 'Create',
                'action' => site_url('kelas_sertif/create_action'),
			    'id' => set_value('id'),
			    'judul' => set_value('judul'),
			    'id_kelas_sertif' => set_value('id_kelas_sertif'),
			    'slug' => set_value('slug'),
			    'brosur' => set_value('brosur'),
			    'link' => set_value('link'),
			    'status' => set_value('status'),
                'getkelas' => json_decode($getkelas),
			);
            $this->load->view('kelas_sertif/kelas_sertif_form', $data);
        }
    }
    
    public function getkelas()
    {
        $url = 'https://sertifikat.diklatonline.id/api/createsertif/getkelas';
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
        return $result;
    }

    public function rowkelas($id)
    {
        $url = 'https://sertifikat.diklatonline.id/api/createsertif/rowkelas/'.$id;
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
        return $result;
    }

    public function create_action() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('create_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                $data = array(
					'judul' => $this->input->post('judul',TRUE),
					'id_kelas_sertif' => $this->input->post('id_kelas_sertif',TRUE),
					'slug' => $this->input->post('slug',TRUE),
					'brosur' => $this->input->post('brosur',TRUE),
					'link' => $this->input->post('link',TRUE),
					'status' => $this->input->post('status',TRUE),
			    );
                $this->Kelas_sertif_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('kelas_sertif'));
            }
        }
    }
    
    public function update($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Kelas_sertif_model->get_by_id($id);

            if ($row) {
                $getkelas = $this->getkelas();
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('kelas_sertif/update_action'),
					'id' => set_value('id', $row->id),
					'judul' => set_value('judul', $row->judul),
					'id_kelas_sertif' => set_value('id_kelas_sertif', $row->id_kelas_sertif),
					'slug' => set_value('slug', $row->slug),
					'brosur' => set_value('brosur', $row->brosur),
					'link' => set_value('link', $row->link),
					'status' => set_value('status', $row->status),
                    'getkelas' => json_decode($getkelas),
			    );
                $this->load->view('kelas_sertif/kelas_sertif_form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('kelas_sertif'));
            }
        }
    }

    public function cek_kelas($id)
    {
        $json_kelas = $this->rowkelas($id);
        $kelas = json_decode($json_kelas);
        echo $kelas->slug;
        // print_r($kelas);
    }

    public function update_action() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('id', TRUE));
            } else {
                $id = $this->input->post('id_kelas_sertif',TRUE);
                $rowkelas = $this->rowkelas($id);
                $kelas = json_decode($rowkelas);
                $data = array(
					'judul' => $this->input->post('judul',TRUE),
					'id_kelas_sertif' => $this->input->post('id_kelas_sertif',TRUE),
					'slug' => $this->input->post('slug',TRUE),
					'brosur' => $this->input->post('brosur',TRUE),
					'link' => 'https://sertifikat.diklatonline.id/landing/get_sertifikat/'.$kelas->slug,
					'status' => $this->input->post('status',TRUE),
			    );

                $this->Kelas_sertif_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('kelas_sertif'));
            }
        }
    }
    
    public function soal_ujian($id)
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $soal_sb = $this->db->where('id_kelas', $id)->get('soal_sb')->result();
            $soal_pg = $this->db->where('id_kelas', $id)->get('soal_pg')->result();
            $soal_pgsk = $this->db->where('id_kelas', $id)->get('soal_pgsk')->result();
            $data = array(
                'id' => $id,
                'tab' => 1,
                'soal_sb' => $soal_sb, 
                'soal_pg' => $soal_pg, 
                'soal_pgsk' => $soal_pgsk, 
            );
            $this->load->view('landing/template/header_popup');
            $this->load->view('ujian/build', $data);
            $this->load->view('landing/template/footer_popup');
        }
    }

    public function build_page($id, $tab)
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $soal_sb = $this->db->where('id_kelas', $id)->get('soal_sb')->result();
            $soal_pg = $this->db->where('id_kelas', $id)->get('soal_pg')->result();
            $soal_pgsk = $this->db->where('id_kelas', $id)->get('soal_pgsk')->result();
            $data = array(
                'id' => $id,
                'tab' => $tab,
                'soal_sb' => $soal_sb, 
                'soal_pg' => $soal_pg, 
                'soal_pgsk' => $soal_pgsk, 
            );
            // $this->load->view('landing/template/header_popup');
            $this->load->view('ujian/build', $data);
            // $this->load->view('landing/template/footer_popup');
        }
    }


    public function create_soal_sb() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            if($this->input->post('metode') == 'add'){
                $data = array(
                    'id_kelas' => $this->input->post('id_kelas',TRUE),
                    'soal_ujian' => $this->input->post('soal_ujian',TRUE),
                    'jawaban_benar' => $this->input->post('jawaban_benar',TRUE),
                );
                $input_data = $this->db->insert('soal_sb',$data);
                if($input_data){
                    $this->res['status'] = 'success';
                }else{
                    $this->res['status'] = 'error';
                }
            }elseif($this->input->post('metode') == 'edit'){
                $data = array(
                    'id_kelas' => $this->input->post('id_kelas',TRUE),
                    'soal_ujian' => $this->input->post('soal_ujian',TRUE),
                    'jawaban_benar' => $this->input->post('jawaban_benar',TRUE),
                );
                $this->db->where('id', $this->input->post('id_soal'));
                $input_data = $this->db->update('soal_sb', $data);
                if($input_data){
                    $this->res['status'] = 'success';
                }else{
                    $this->res['status'] = 'error';
                }
            }else{
                $this->res['status'] = 'error';
            }

            echo json_encode($this->res);
                // $this->session->set_flashdata('message', 'Create Record Success');
                // redirect(site_url('sertifikasi'));
        }
    }

    public function create_soal() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            if($this->input->post('metode') == 'add'){
                $data = array(
                    'id_kelas' => $this->input->post('id_kelas',TRUE),
                    'soal_ujian' => $this->input->post('soal_ujian',TRUE),
                    'jawaban_a' => $this->input->post('jawaban_a',TRUE),
                    'jawaban_b' => $this->input->post('jawaban_b',TRUE),
                    'jawaban_c' => $this->input->post('jawaban_c',TRUE),
                    'jawaban_d' => $this->input->post('jawaban_d',TRUE),
                    'jawaban_benar' => $this->input->post('jawaban_benar',TRUE),
                );
                $input_data = $this->db->insert('soal_pg',$data);
                if($input_data){
                    $this->res['status'] = 'success';
                }else{
                    $this->res['status'] = 'error';
                }
            }elseif($this->input->post('metode') == 'edit'){
                $data = array(
                    'id_kelas' => $this->input->post('id_kelas',TRUE),
                    'soal_ujian' => $this->input->post('soal_ujian',TRUE),
                    'jawaban_a' => $this->input->post('jawaban_a',TRUE),
                    'jawaban_b' => $this->input->post('jawaban_b',TRUE),
                    'jawaban_c' => $this->input->post('jawaban_c',TRUE),
                    'jawaban_d' => $this->input->post('jawaban_d',TRUE),
                    'jawaban_benar' => $this->input->post('jawaban_benar',TRUE),
                );
                $this->db->where('id', $this->input->post('id_soal'));
                $input_data = $this->db->update('soal_pg', $data);
                // $input_data = $this->db->insert('soal_pg',$data);
                if($input_data){
                    $this->res['status'] = 'success';
                }else{
                    $this->res['status'] = 'error';
                }
            }else{
                $this->res['status'] = 'error';
            }

            echo json_encode($this->res);
                // $this->session->set_flashdata('message', 'Create Record Success');
                // redirect(site_url('sertifikasi'));
        }
    }

    public function create_soal_pgsk() 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('edit_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            if($this->input->post('metode') == 'add'){
                $data = array(
                    'id_kelas' => $this->input->post('id_kelas',TRUE),
                    'soal_ujian' => $this->input->post('soal_ujian',TRUE),
                    'jawaban_a' => $this->input->post('jawaban_a',TRUE),
                    'jawaban_b' => $this->input->post('jawaban_b',TRUE),
                    'jawaban_c' => $this->input->post('jawaban_c',TRUE),
                    'jawaban_d' => $this->input->post('jawaban_d',TRUE),
                    'jawaban_benar' => $this->input->post('jawaban_benar',TRUE),
                );
                $input_data = $this->db->insert('soal_pgsk',$data);
                if($input_data){
                    $this->res['status'] = 'success';
                }else{
                    $this->res['status'] = 'error';
                }
            }elseif($this->input->post('metode') == 'edit'){
                $data = array(
                    'id_kelas' => $this->input->post('id_kelas',TRUE),
                    'soal_ujian' => $this->input->post('soal_ujian',TRUE),
                    'jawaban_a' => $this->input->post('jawaban_a',TRUE),
                    'jawaban_b' => $this->input->post('jawaban_b',TRUE),
                    'jawaban_c' => $this->input->post('jawaban_c',TRUE),
                    'jawaban_d' => $this->input->post('jawaban_d',TRUE),
                    'jawaban_benar' => $this->input->post('jawaban_benar',TRUE),
                );
                $this->db->where('id', $this->input->post('id_soal'));
                $input_data = $this->db->update('soal_pgsk', $data);
                // $input_data = $this->db->insert('soal_pgsk',$data);
                if($input_data){
                    $this->res['status'] = 'success';
                }else{
                    $this->res['status'] = 'error';
                }
            }else{
                $this->res['status'] = 'error';
            }


            echo json_encode($this->res);
                // $this->session->set_flashdata('message', 'Create Record Success');
                // redirect(site_url('sertifikasi'));
        }
    }

    public function build_delete_soal_sb($id_soal, $id_kelas)
    {
        $delete = $this->db->where('id', $id_soal)->delete('soal_sb');
        if($delete){
            redirect(site_url('kelas_sertif/build_page/'.$id_kelas.'/1'));
        }else{
            $this->res['status'] = 'error';
            echo json_encode($this->res);
        }
    }

    public function build_delete_soal($id_soal, $id_kelas)
    {
        $delete = $this->db->where('id', $id_soal)->delete('soal_pg');
        if($delete){
            redirect(site_url('kelas_sertif/build_page/'.$id_kelas.'/2'));
        }else{
            $this->res['status'] = 'error';
            echo json_encode($this->res);
        }
    }

    public function build_delete_soal_pgsk($id_soal, $id_kelas)
    {
        $delete = $this->db->where('id', $id_soal)->delete('soal_pgsk');
        if($delete){
            redirect(site_url('kelas_sertif/build_page/'.$id_kelas.'/3'));
        }else{
            $this->res['status'] = 'error';
            echo json_encode($this->res);
        }
    }

    public function get_soal_sb($id)
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $cek = $this->db->where('id', $id)->get('soal_sb')->num_rows();
            if ($cek > 0) {
                $row = $this->db->where('id', $id)->get('soal_sb')->row();
                $data = array(
                'id' => $row->id,
                'soal' => $row->soal_ujian,
                'jawaban_benar' => $row->jawaban_benar,
                );
                $this->res['success'] = true;
                $this->res['soal'] = $data;
            } else {
                $this->res['success'] = false;
            }
            echo json_encode($this->res);
        }
    }

    public function get_soal_pg($id)
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $cek = $this->db->where('id', $id)->get('soal_pg')->num_rows();
            if ($cek > 0) {
                $row = $this->db->where('id', $id)->get('soal_pg')->row();
                $data = array(
                'id' => $row->id,
                'soal' => $row->soal_ujian,
                'jawaban_a' => $row->jawaban_a,
                'jawaban_b' => $row->jawaban_b,
                'jawaban_c' => $row->jawaban_c,
                'jawaban_d' => $row->jawaban_d,
                'jawaban_benar' => $row->jawaban_benar,
                );
                $this->res['success'] = true;
                $this->res['soal'] = $data;
            } else {
                $this->res['success'] = false;
            }
            echo json_encode($this->res);
        }
    }

    public function get_soal_pgsk($id)
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('menu_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $cek = $this->db->where('id', $id)->get('soal_pgsk')->num_rows();
            if ($cek > 0) {
                $row = $this->db->where('id', $id)->get('soal_pgsk')->row();
                $data = array(
                'id' => $row->id,
                'soal' => $row->soal_ujian,
                'jawaban_a' => $row->jawaban_a,
                'jawaban_b' => $row->jawaban_b,
                'jawaban_c' => $row->jawaban_c,
                'jawaban_d' => $row->jawaban_d,
                'jawaban_benar' => $row->jawaban_benar,
                );
                $this->res['success'] = true;
                $this->res['soal'] = $data;
            } else {
                $this->res['success'] = false;
            }
            echo json_encode($this->res);
        }
    }



    public function delete($id) 
    {
        if (!$this->ion_auth->is_admin() && !$this->ion_auth_acl->has_permission('delete_kelas_sertif')){
            show_error('You must be an administrators to view this page.');
        }else{
            $row = $this->Kelas_sertif_model->get_by_id($id);

            if ($row) {
                $this->Kelas_sertif_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');
                redirect(site_url('kelas_sertif'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('kelas_sertif'));
            }
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('id_kelas_sertif', 'id kelas sertif', 'trim|required');
	$this->form_validation->set_rules('slug', 'slug', 'trim|required');
	$this->form_validation->set_rules('brosur', 'brosur', 'trim|required');
	$this->form_validation->set_rules('link', 'link', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kelas_sertif.php */
/* Location: ./application/controllers/Kelas_sertif.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-09-24 13:17:08 */
/* http://harviacode.com */