<?php

class Request_model extends CI_Model {

	private $table1 = "mission_review";
	private $table2 = "mission_trip";
	private $table3 = 'food_mission';
	private $table4 = 'trip';
	private $table5 = 'food';
    private $table6 = 'member';

	public function __construct(){
		parent::__construct();
	}

	public function get_request_missions($option){
		$query = isset($option['query']) && is_array($option['query']) ? $option['query'] : null;
        if (is_array($query)) {
            foreach ($query as $key => $val) {
                if ($key != 'generalSearch') {
                    $this->db->where($key, $val);
                }
            }
        }

        $sort = !empty($option['sort']['sort']) ? $option['sort']['sort'] : 'desc';
        $field = !empty($option['sort']['field']) ? $option['sort']['field'] : 'a.created_at';

        $this->db->select('a.*, c.name as mission_name, d.name as trip_name, e.name as food_name, f.f_name');
        $this->db->from($this->table1.' a');
        $this->db->join($this->table2.' b', 'a.trip_id = b. trip_id', 'left');
        $this->db->join($this->table3.' c', 'b.mission_id = c.id', 'left');
        $this->db->join($this->table4.' d', 'a.trip_id = d.id', 'left');
        $this->db->join($this->table5.' e', 'a.food_id = e.id', 'left');
        $this->db->join($this->table6.' f', 'f.id = a.member_id', 'left');
        $this->db->order_by($field, $sort);
		
		return $this->db->get()->result_array();
	}

    public function get_request_challenges($option){
        $query = isset($option['query']) && is_array($option['query']) ? $option['query'] : null;
        if (is_array($query)) {
            foreach ($query as $key => $val) {
                if ($key != 'generalSearch') {
                    $this->db->where($key, $val);
                }
            }
        }

        $sort = !empty($option['sort']['sort']) ? $option['sort']['sort'] : 'desc';
        $field = !empty($option['sort']['field']) ? $option['sort']['field'] : 'a.created_at';

        $this->db->select('a.*, b.f_name , c.name as challenge_name');
        $this->db->from('challenge_review a');
        $this->db->join('member b', 'a.member_id = b.id', 'left');
        $this->db->join('food_challenge c', 'a.challenge_id = c.id', 'left');
        $this->db->order_by($field, $sort);
        
        return $this->db->get()->result_array();
    }
}