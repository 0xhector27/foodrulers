<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Base_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('admin_data')) {
			redirect('admin/auth/login');
		}

		$this->load->model('common_model');
	}

	public function index() {
		$title = $this->lang->line('dashboard');

		$group_id = $this->admin_data['group_id'];
		$data['admin_count'] = $this->common_model->get_count_value('admin', array('group_id >='=>$group_id));
		$data['member_count'] = $this->common_model->get_count_value('member');
		$data['new_mission_count'] = $this->common_model->get_count_value('food_mission', array('status'=>'0'));
		$data['half_mission_count'] = $this->common_model->get_count_value('food_mission', array('status'=>'1'));
		$data['completed_mission_count'] = $this->common_model->get_count_value('food_mission', array('status'=>'2'));

		$data['new_challenge_count'] = $this->common_model->get_count_value('food_challenge', array('status'=>'0'));
		$data['completed_challenge_count'] = $this->common_model->get_count_value('food_challenge', array('status'=>'1'));
		$this->load_admin_view('dashboard', '', $title, '', $data);
	}
}