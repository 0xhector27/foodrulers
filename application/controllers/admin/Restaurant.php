<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restaurant extends Base_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('restaurant_model');
		$this->load->model('common_model');
	}

	public function index(){
		$title = $this->lang->line('restaurant');
		$subtitle = $this->lang->line('restaurant_list');
		$this->load_admin_view('restaurant', 'restaurant_list', $title, $subtitle);
	}

	public function get_restaurant_list(){
		$option = array_merge(['pagination' => [], 'sort' => [], 'query' => []], $_REQUEST);
        $result = $this->restaurant_model->get_restaurant_list($option);
        $this->getTable($result, $option);
	}

	public function add_restaurant(){
	    $title = $this->lang->line('restaurant');
	    $subtitle = $this->lang->line('restaurant_list');
        $data['content_name'] = $this->lang->line('add_restaurant');
	    $data['owners'] = $this->common_model->get_list('member');
	    $this->load_admin_view('restaurant', 'add_restaurant', $title, $subtitle, $data);
	}

	public function edit_restaurant($restaurant_id) {
	    if (empty($restaurant_id))
	        redirect('admin/restaurant');
        $title = $this->lang->line('restaurant');
        $subtitle = $this->lang->line('restaurant_list');
        $content_data['content_name'] = $this->lang->line('edit_restaurant');
        $content_data['owners'] = $this->common_model->get_list('member');
        $content_data['restaurant_data'] = $this->common_model->get_info('restaurant', $restaurant_id);
        $this->load_admin_view('restaurant', 'add_restaurant', $title, $subtitle, $content_data);
    }

	public function delete_restaurant($id=0) {
        $data['is_delete'] = '1';
        $data['id'] = $id;
        $this->common_model->update_info('restaurant', $data);
        $this->generate_json('Deleted it');
    }

    public function save_restaurant()
    {
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
            $req['rest_images'] = json_encode($images);

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
            $this->common_model->save_info('restaurant', $req);
            $this->generate_json('Saved it');
        } else {
            $this->common_model->update_info('restaurant', $req);
            $this->generate_json('Updated it');
        }
    }

    public function update_restaurant()
    {

    }
}