<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_account_model extends CI_Model {

	private $table = 'admin';

	public function get_current_time(){
		return date('Y-m-d H:i:s');
	}

	public function get_admin_info($userid)
	{
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('user_id', $userid);
		return $this->db->get()->row_array();
	}

	public function get_admin_list($role)
	{
		$this->db->select('a.*, b.id as gid, b.group_name');
		$this->db->from($this->table.' a');
		$this->db->join('admin_group b', 'a.group_id = b.id','left');
		$this->db->where('a.is_delete', '0');
		$this->db->where('group_id >', $role);//origion code
//        $this->db->where('group_id =', $role);//modified by Elvis 2018-11-08

		return $this->db->get()->result_array();
	}

	public function get_admin_by_id($id){
		$this->db->select("a.*, b.id as gid, b.group_name, c.id as cid, c.full_name, c.code");
		$this->db->from($this->table.' a');
		$this->db->where('a.id', $id);
		$this->db->join('admin_group b', 'b.id = a.group_id', 'left');
		$this->db->join('country_list c', 'c.id = a.country_id', 'left');
		return $this->db->get()->row_array();
	}

	public function update_info($id)
	{
        $info['last_login'] = $this->get_current_time();
        $this->db->where('id', $id);
        $this->db->update($this->table, $info);
	}
}