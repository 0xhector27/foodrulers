<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
	    parent::__construct();
	    $this->load->model('Admin_account_model');
    }	

    public function login() {

	    $this->form_validation->set_rules('userid', 'Userid', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if (!$this->form_validation->run()) {
	      $this->load->view('admin/login');
	      return;
        }

        $request = $this->input->post();
        $response = array(); 

        $admin_info = $this->Admin_account_model->get_admin_info($request['userid']);

        if(empty($admin_info)) {
            $this->session->set_flashdata('error_msg',$this->lang->line('no_exist_userid'));
            $this->load->view('admin/login');

        } elseif(sha1($request['password']) != $admin_info['password']){
            $this->session->set_flashdata('error_msg',$this->lang->line('wrong_pwd'));
            $this->load->view('admin/login');

        } else {

            $this->session->set_userdata('admin_data', array(
                'id' => $admin_info['id'],
                'userid' => $admin_info['user_id'],
                'fname' => $admin_info['f_name'],
                'lname' => $admin_info['l_name'],
                'group_id' => $admin_info['group_id'],
                'logged_in' => true
            ));
            
            $this->lang_session_create();
            $this->Admin_account_model->update_info($admin_info['id']);
            redirect('admin/dashboard');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/auth/login');
    }

    public function lang_session_create(){
        $this->session->set_userdata('site_lang', 'english');
        $this->session->set_userdata('flag', 'flag-icon-gb');
        $this->session->set_userdata('abbrev', 'EN');
    }
}