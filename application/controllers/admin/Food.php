<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Food extends Base_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('food_model');
		$this->load->model('common_model');
	}

	public function index(){
		$title = $this->lang->line('food');
		$subtitle = $this->lang->line('food_list');
		$data['restaurant_list'] = $this->common_model->get_list('restaurant');
		$this->load_admin_view('food', 'food_list', $title, $subtitle, $data);
	}

	public function get_food_list(){
		$option = array_merge(['pagination' => [], 'sort' => [], 'query' => []], $_REQUEST);
        $result = $this->food_model->get_food_list($option);
        $this->getTable($result, $option);
	}

	public function add_food(){
		$title = $this->lang->line('food');
		$subtitle = $this->lang->line('add_food');
        $data['restaurant_list'] = $this->common_model->get_list('restaurant');
		$this->load_admin_view('food', 'add_food', $title, $subtitle, $data);
	}

	public function save_food() {
        $req = $this->input->post();

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
        if ( !empty($images))
            $req['images'] = json_encode($images);

        if (!empty($_FILES['thumb_image']['name'][0])) {
            if( !file_exists('./upload/image/') )
                mkdir('./upload/image/', 0777, true);
            foreach($_FILES['thumb_image']['name'] as $key => $val) {
                $upload_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR."image".DIRECTORY_SEPARATOR;
                $file_name = md5(random_string('alnum', 16));
                $file_ext = substr($_FILES['thumb_image']['name'][$key], strpos($_FILES['thumb_image']['name'][$key], "."));
                move_uploaded_file($_FILES['thumb_image']['tmp_name'][$key], $upload_path.$file_name.$file_ext);
                $req['thumb_image'] = $file_name.$file_ext;
            }
        }

        if (empty($req['id'])) {
            //save
            $this->common_model->save_info('food', $req);
            $this->generate_json('Saved it');
        } else {
            $this->common_model->update_info('food', $req);
            $this->generate_json('Updated it');
        }
    }

	public function del_food($id=0) {
        $data['is_delete'] = '1';
        $data['id'] = $id;
        $this->common_model->update_info('food', $data);
        $this->generate_json('Deleted it');
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

    public function edit_food($food_id = 0) {
	    if (empty($food_id))
	        redirect('admin/food');
        $title = $this->lang->line('food');
        $subtitle = $this->lang->line('food_list');
        $content_data['content_name'] = $this->lang->line('edit_food');
        $content_data['food_data'] = $this->common_model->get_info('food', $food_id);
        $content_data['restaurant_list'] = $this->common_model->get_list('restaurant');
        $this->load_admin_view('food', 'add_food', $title, $subtitle, $content_data);
    }
}