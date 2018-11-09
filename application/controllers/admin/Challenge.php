<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Challenge extends Base_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('common_model');
		$this->load->model('challenge_model');
	}

	public function create_challenge(){
		$title = $this->lang->line('food_challenge');
		$subtitle = $this->lang->line('create_challenge');
		$this->load_admin_view('challenge', 'create_challenge', $title, $subtitle);
	}

	public function challenge_list(){
		$title = $this->lang->line('food_challenge');
		$subtitle = $this->lang->line('challenge_list');
		$this->load_admin_view('challenge', 'challenge_list', $title, $subtitle);
	}
	//ajax call
	public function get_challenges(){
		$option = array_merge(['pagination' => [], 'sort' => [], 'query' => []], $_REQUEST);
        $result = $this->challenge_model->get_challenge_list($option);
        $this->getTable($result, $option);
	}

    public function save_challenge() {

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

        $this->common_model->save_info('food_challenge', $input);

        $this->generate_json('Success');
    }

    public function delete_challenge($id=0){
        $data['is_delete'] = '1';
        $data['id'] = $id;
        $this->common_model->update_info('food_challenge', $data);
        $this->generate_json('Deleted it');
    }

    public function edit_challenge($challenge_id){
	    $title = $this->lang->line('food_challenge');
        $subtitle = $this->lang->line('challenge_list');
        $content_data['content_name'] = $this->lang->line('edit_challenge');
        $content_data['challenge_data'] = $this->challenge_model->get_challenge_info($challenge_id);
        $this->load_admin_view('challenge', 'edit_challenge', $title, $subtitle, $content_data);

        if (true)
            return;

        $header_data['title'] = $this->lang->line('food_challenge');
        $header_data['subtitle'] = $this->lang->line('challenge_list');
        $header_data['username'] = $this->admin_data['fname'];

        $menu_data['pmenu'] = 'challenge';
        $menu_data['submenu'] = 'challenge_list';

        $content_data['content_name'] = $this->lang->line('edit_challenge');
        $content_data['header_data'] = $header_data;
        $content_data['challenge_data'] = $this->challenge_model->get_challenge_info($challenge_id);

        $this->load->view('includes/admin/header', $header_data);
        $this->load->view('includes/admin/menu', $menu_data);
        $this->load->view('admin/challenge/create_challenge', $content_data);
        $this->load->view('includes/admin/footer', array('jslink' => 'edit_challenge'));
    }

    public function update_challenge() {
	    $req = $this->input->post();
	    if (empty($req['id']))
	        return;
	    $this->common_model->update_info('food_challenge', $req);

	    $this->generate_json('Challenge updated');
    }

    public function upload_images(){

        $data = array();

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