<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Base_Controller extends CI_Controller {

	protected $admin_data;

	public function __construct()
	{
		parent::__construct();

		$this->admin_data = $this->session->userdata('admin_data');
        $this->load->model('admin_account_model');
        $this->load->model('country_model');


        if ($this->uri->segment(1) == 'admin')
        {
            //if routing admin
            if ($this->uri->segment(2) != 'auth' && !isset($this->admin_data['logged_in']) || $this->admin_data['logged_in'] == false)
            {
                //if not login
                redirect('admin/auth/login');
            }
        }
	}

	public function load_admin_view($pmenu, $submenu = '', $title, $subtitle = '', $content_data = array())
	{
		$header_data['title'] = $title;
		$header_data['subtitle'] = $subtitle;
		$header_data['username'] = $this->admin_data['fname'];

		$menu_data['pmenu'] = $pmenu;
		$menu_data['submenu'] = $submenu;

		$content_data['header_data'] = $header_data;
		$content_data['menu_data'] = $menu_data;
        $content_data['user_data'] = $this->admin_account_model->get_admin_by_id($this->admin_data['id']);
        $content_data['country_list'] = $this->country_model->get_countries();

        $this->load->view('includes/admin/header', $header_data);
        $this->load->view('includes/admin/menu', $menu_data);
        if (empty($submenu)) {
        	$this->load->view('admin/'.$pmenu, $content_data);
            $this->load->view('includes/admin/footer', array('jslink' => $pmenu));
        } else {
        	$this->load->view('admin/'.$pmenu.'/'.$submenu, $content_data);
            $this->load->view('includes/admin/footer', array('jslink' => $submenu));
        }
	}
	
	public function getTable($data, $option)
    {
        // search filter by keywords
        $filter = isset($option['query']['generalSearch']) && is_string($option['query']['generalSearch'])
        ? $option['query']['generalSearch'] : '';
        if (!empty($filter)) {
            $data = array_filter($data, function ($a) use ($filter) {
                return (boolean) preg_grep("/$filter/i", (array) $a);
            });
        }

        $sort = !empty($option['sort']['sort']) ? $option['sort']['sort'] : 'asc';
        $field = !empty($option['sort']['field']) ? $option['sort']['field'] : 'id';

        $meta = [];
        $page = !empty($option['pagination']['page']) ? (int) $option['pagination']['page'] : 1;
        $perpage = !empty($option['pagination']['perpage']) ? (int) $option['pagination']['perpage'] : -1;

        $pages = 1;
        $total = count($data); // total items in array

        // $perpage 0; get all data
        if ($perpage > 0) {
            $pages = ceil($total / $perpage); // calculate total pages
            $page = max($page, 1); // get 1 page when $_REQUEST['page'] <= 0
            $page = min($page, $pages); // get last page when $_REQUEST['page'] > $totalPages
            $offset = ($page - 1) * $perpage;
            if ($offset < 0) {
                $offset = 0;
            }

            $data = array_slice($data, $offset, $perpage, true);
        }

        $meta = array(
            'page' => $page,
            'pages' => $pages,
            'perpage' => $perpage,
            'total' => $total,
        );

        // if selected all records enabled, provide all the ids
        if (isset($option['requestIds']) && filter_var($option['requestIds'], FILTER_VALIDATE_BOOLEAN)) {
            $meta['rowIds'] = array_map(function ($row) {
                return $row->id;
            }, $alldata);
        }

        $result = array(
            'meta' => $meta + array(
                'sort' => $sort,
                'field' => $field,
            ),
            'data' => $data,
        );

        echo json_encode($result, JSON_PRETTY_PRINT); 
    }

    public function generate_json($msg, $status = true){
        $resp['status'] = $status;
        $resp['msg'] = $msg;
        echo json_encode($resp);
    }
}