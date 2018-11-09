<?php

class Country_model extends CI_Model{

	private $table = 'country_list';

	public function get_countries(){
		$this->db->select('*');
		$this->db->from($this->table);
		return $this->db->get()->result_array();
	}
}