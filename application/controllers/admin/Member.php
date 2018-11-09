<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends Base_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->model('member_model');
		$this->load->model('country_model');
		$this->load->model('common_model');
	}

	public function add_member() {
		$title = $this->lang->line('member');
		$subtitle = $this->lang->line('add_member');

		$data['country_list'] = $this->country_model->get_countries();
		$this->load_admin_view('member', 'add_member', $title, $subtitle, $data);
	}

	public function save_member() {
		$req = $this->input->post();
		unset($req['password_confirm']);
		$req['password'] = sha1($req['password']);
		$this->common_model->save_info('member', $req);
		$this->generate_json('Success');
	}

	public function member_list() {
		$title = $this->lang->line('member');
		$subtitle = $this->lang->line('member_list');
        $data['country_list'] = $this->country_model->get_countries();
		$this->load_admin_view('member', 'member_list', $title, $subtitle, $data);
	}

    public function get_member(){
        $req = $this->input->post();
        $resp['data'] = $this->member_model->get_member_by_id($req['id']);
        echo json_encode($resp);
    }

    public function update_member(){
        $req = $this->input->post();
        if(empty($req['password']))
        {
            unset($req['password']);
        }
        unset($req['password_confirm']);
        $this->common_model->update_info('member', $req);
        $this->generate_json('Updated it');
    }

    public function del_member(){
        $req = $this->input->post();
        $data['is_delete'] = '1';
        $data['id'] = $req['id'];
        $this->common_model->update_info('member', $data);
        $this->generate_json('Deleted it');
    }

    public function block_member(){
        $req = $this->input->post();
        $data['id'] = $req['id'];
        $data['is_block'] = $req['type'];
        if ( $req['type'] == '1' )
            $data['block_time'] = date('Y-m-d H:i:s', strtotime('+7 days'));
        $this->common_model->update_info('member', $data);
        $this->generate_json('Blocked it');
    }

	public function get_members() {
		$option = array_merge(array('pagination' => array(), 'sort' => array(), 'query' => array()), $_REQUEST);
        $result = $this->member_model->get_member_list($option);
        $this->getTable($result, $option);
	}
}
