<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_group_model extends CI_Model {

	private $table_name = 'admin_group';

	public function get_current_time(){
		return date('Y-m-d H:i:s');
	}

	public function get_admin_group($role)
	{
		$sql = "SELECT a.id, a.group_name, (SELECT COUNT(b.group_id) FROM admin b WHERE a.id = b.group_id) AS admin_count
				FROM admin_group a WHERE a.is_delete = '0' AND a.id > ".$role;

		$query = $this->db->query($sql);
		return $query->result_array();
	}
}