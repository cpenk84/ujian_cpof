<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Dashboard.php
 *
 * @package     CI-ACL
 * @author      Steve Goodwin
 * @copyright   2015 Plumps Creative Limited
 */
class Panel extends CI_Controller
{
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
        $data['users_groups']           =   $this->ion_auth->get_users_groups()->result();
        $data['users_permissions']      =   $this->ion_auth_acl->build_acl();

        if ($this->ion_auth->in_group('mahasiswa')){

            $this->template->load('template', 'profile/mahasiswa_profile');
        }else{
            $this->template->load('template', 'dashboard');
        }
    }

}