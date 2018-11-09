<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mission extends Base_Controller {

	public function __construct(){
		parent::__construct();

        $this->load->model('common_model');
		$this->load->model('mission_model');
		$this->load->model('mission_trip_model');

	}

	public function mission_list(){		
		$title = $this->lang->line('food_mission');
		$subtitle = $this->lang->line('mission_list');
		$this->load_admin_view('mission', 'mission_list', $title, $subtitle);
	}

	public function get_missions(){
		$option = array_merge(array('pagination' => array(), 'sort' => array(), 'query' => array()), $_REQUEST);
        $result = $this->mission_model->get_mission_list($option);
        $this->getTable($result, $option);
	}

	public function create_mission(){
		$title = $this->lang->line('food_mission');
		$subtitle = $this->lang->line('create_mission');
		$this->load_admin_view('mission', 'create_mission', $title, $subtitle);
	}

	public function save_mission() {

	    $input = $this->input->post();

        $images = array();
        if (!empty($_FILES['images']['name'][0])) {
            if( !file_exists('./upload/image/') )
                mkdir('./upload/image/', 0777, true);
            foreach($_FILES['images']['name'] as $key => $val) {
                $upload_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR."image".DIRECTORY_SEPARATOR;
                $file_name = md5(random_string('alnum', 16));
                $file_ext = substr($_FILES['images']['name'][$key], strpos($_FILES['images']['name'][$key], "."));
                move_uploaded_file($_FILES['images']['tmp_name'][$key], $upload_path.$file_name.$file_ext);
                array_push($images, $file_name.$file_ext);
            }
        }

        $video = array();
        if (!empty($_FILES['video']['name'][0])) {
            if( !file_exists('./upload/video/') )
                mkdir('./upload/video/', 0777, true);
            foreach($_FILES['video']['name'] as $key => $val) {
                $upload_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR."video".DIRECTORY_SEPARATOR;
                $file_name = md5(random_string('alnum', 16));
                $file_ext = substr($_FILES['video']['name'][$key], strpos($_FILES['video']['name'][$key], "."));
                move_uploaded_file($_FILES['video']['tmp_name'][$key], $upload_path.$file_name.$file_ext);
                array_push($video, $file_name.$file_ext);
            }
        }

        $input['image'] = json_encode($images);
        $input['video'] = json_encode($video);

        $this->common_model->save_info('food_mission', $input);

        $this->generate_json('Success');
    }

    public function delete_mission($id=0){
        $data['is_delete'] = '1';
        $data['id'] = $id;
        $this->common_model->update_info('food_mission', $data);
        $this->generate_json('Deleted it');
    }

	public function edit_mission($mission_id){
        $title = $this->lang->line('food_mission');
        $subtitle = $this->lang->line('mission_list');
        $content_data['content_name'] = $this->lang->line('edit_mission');
        $content_data['mission_data'] = $this->mission_model->get_mission_info($mission_id);
        $content_data['trip_list'] = $this->mission_trip_model->get_trips_by_mission_id($mission_id);
        $this->load_admin_view('mission', 'edit_mission', $title, $subtitle, $content_data);

        return;

		$header_data['title'] = $this->lang->line('food_mission');
		$header_data['subtitle'] = $this->lang->line('mission_list');
		$header_data['username'] = $this->admin_data['fname'];

		$menu_data['pmenu'] = 'mission';
		$menu_data['submenu'] = 'mission_list';

		$content_data['content_name'] = $this->lang->line('edit_mission');
		$content_data['header_data'] = $header_data;
		$content_data['mission_data'] = $this->mission_model->get_mission_info($mission_id);
		$content_data['trip_list'] = $this->mission_trip_model->get_trips_by_mission_id($mission_id);

		$this->load->view('includes/admin/header', $header_data);
		$this->load->view('includes/admin/menu', $menu_data);
		$this->load->view('admin/mission/edit_mission', $content_data);
		$this->load->view('includes/admin/footer', array('jslink' => 'edit_mission'));
	}

	public function update_mission() {
	    $input = $this->input->post();
	    if (!empty($input['id']))
    	    $this->common_model->update_info('food_mission', $input);

	    $this->generate_json('Updated it');
    }

	public function upload_images(){
		if(!empty($_FILES)) {
			$tempfile = $_FILES['file']['tmp_name'];
            $target_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR."image".DIRECTORY_SEPARATOR;
            $file_name = md5(random_string('alnum', 16));
            $file_ext = substr($_FILES['file']['name'], strpos($_FILES['file']['name'], "."));
            move_uploaded_file($tempfile, $target_path.$file_name.$file_ext);
            echo $file_name.$file_ext;
		}
	}

    public function upload_video(){
        if(!empty($_FILES)) {
            $tempfile = $_FILES['file']['tmp_name'];
            $target_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR."video".DIRECTORY_SEPARATOR;
            $file_name = md5(random_string('alnum', 16));
            $file_ext = substr($_FILES['file']['name'], strpos($_FILES['file']['name'], "."));
            move_uploaded_file($tempfile, $target_path.$file_name.$file_ext);
            echo $file_name.$file_ext;
        }
    }

}