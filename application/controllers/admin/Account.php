<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends Base_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_account_model');
		$this->load->model('admin_group_model');
		$this->load->model('country_model');
		$this->load->model('common_model');
	}

	public function admin_list() {
		$title = $this->lang->line('admin');
		$subtitle = $this->lang->line('admin_list');

		$data['admin_list'] = $this->admin_account_model->get_admin_list($this->admin_data['group_id']);
		$data['country_list'] = $this->country_model->get_countries();
		$data['group_list'] = $this->admin_group_model->get_admin_group($this->admin_data['group_id']);
		$this->load_admin_view('account', 'admin_list', $title, $subtitle, $data);
	}

	public function admin_group() {
		$title = $this->lang->line('admin');
		$subtitle = $this->lang->line('admin_group');

		$data['admin_group'] = $this->admin_group_model->get_admin_group($this->admin_data['group_id']);
		$this->load_admin_view('account', 'admin_group', $title, $subtitle, $data);
	}

	public function add_admin() {
		$title = $this->lang->line('admin');
		$subtitle = $this->lang->line('add_admin');

		$data['group_list'] = $this->admin_group_model->get_admin_group($this->admin_data['group_id']);
		$data['country_list'] = $this->country_model->get_countries();
		$this->load_admin_view('account', 'add_admin', $title, $subtitle, $data);
	}

	public function save_admin(){
		$req = $this->input->post();
		unset($req['password_confirm']);
		$req['password'] = sha1($req['password']);
		$this->common_model->save_info('admin', $req);
		$this->generate_json('Success');
	}

	public function get_admin(){
		$req = $this->input->post();
		$resp['data'] = $this->admin_account_model->get_admin_by_id($req['id']);
		echo json_encode($resp);
	}

	public function update_admin(){
		$req = $this->input->post();
		if(empty($req['password'])) 
		{
			unset($req['password']);
		}
		unset($req['password_confirm']);
		$this->common_model->update_info('admin', $req);
		$this->generate_json('Updated it');
	}

	public function update_profile(){
		$req = $this->input->post();
		$this->common_model->update_info('admin', $req);

        $this->session->set_userdata('admin_data', array(
            'id' => $req['id'],
            'userid' => $req['user_id'],
            'fname' => $req['f_name'],
            'lname' => $req['l_name'],
            'group_id' => $req['group_id'],
            'logged_in' => true
        ));

		$this->generate_json('Updated it');
	}

	public function update_password(){
		$req = $this->input->post();

		$user_data = $this->admin_account_model->get_admin_by_id($req['id']);

		if (sha1($req['old_password']) == $user_data['password']) {
			unset($req['old_password']);

			if ($req['password'] == $req['password_confirm']) {
				unset($req['password_confirm']);
				$req['password'] = sha1($req['password']);
				$this->common_model->update_info('admin', $req);
				$this->generate_json('Updated it');
			} else
				$this->generate_json('Password does not match', 0);
		} else
			$this->generate_json('Retype Old Password', 0);
	}

	public function del_admin(){
		$req = $this->input->post();
		$data['is_delete'] = '1';
		$data['id'] = $req['id'];
		$this->common_model->update_info('admin', $data);
		$this->generate_json('Deleted it');
	}

	public function add_group(){
		$req = $this->input->post();
		$data['group_name'] = $req['new_group'];
		$this->common_model->save_info('admin_group', $data);
		$this->generate_json('Success');
	}

	public function update_group(){
		$req = $this->input->post();
		$data['group_name'] = $req['edit_group'];
		$data['id'] = $req['group_id'];
		$this->common_model->update_info('admin_group', $data);
		$this->generate_json('Updated');
	}

	public function delete_group(){
		$req = $this->input->post();
		$req['is_delete'] = '1';
		$this->common_model->update_info('admin_group', $req);
		$this->generate_json('Deleted');
	}

}