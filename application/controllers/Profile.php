<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->library('ion_auth_acl');

        if( ! $this->ion_auth->logged_in() )
            redirect('auth/login');
    }

	public function index()
	{
        if ($this->ion_auth->in_group('mahasiswa')){
			$this->load->view('profile/mahasiswa_profile');
        }else{
            $this->load->view('profile/user_profile');
        }
	}
}
