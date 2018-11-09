<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends Base_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('request_model');
	}

	public function mission(){
		$title = $this->lang->line('request');
		$subtitle = $this->lang->line('mission');
		$this->load_admin_view('request', 'mission', $title, $subtitle);
	}

	public function get_request_mission(){
		$option = array_merge(['pagination' => [], 'sort' => [], 'query' => []], $_REQUEST);
        $result = $this->request_model->get_request_missions($option);
        $this->getTable($result, $option);
	}

	public function challenge(){
		$title = $this->lang->line('request');
		$subtitle = $this->lang->line('challenge');
		$this->load_admin_view('request', 'challenge', $title, $subtitle);
	}

	public function get_request_challenge(){
		$option = array_merge(['pagination' => [], 'sort' => [], 'query' => []], $_REQUEST);
        $result = $this->request_model->get_request_challenges($option);
        $this->getTable($result, $option);
	}
}