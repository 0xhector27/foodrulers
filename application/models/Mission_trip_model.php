<?php
class Mission_trip_model extends CI_Model {

	private $table = 'mission_trip';

	public function __construct(){
		parent::__construct();
	}

	public function get_trips_by_mission_id($mission_id){
		$this->db->select('b.*');
		$this->db->from($this->table.' a');
		$this->db->where('mission_id', $mission_id);
		$this->db->join('trip b', 'a.trip_id = b.id', 'left');
		$this->db->where('b.is_delete', '0');
		return $this->db->get()->result_array();
	}
	
	public function get_mission_trips(){
		// filter by field query
        $query = isset($option['query']) && is_array($option['query']) ? $option['query'] : null;
        if (is_array($query)) {
            foreach ($query as $key => $val) {
                if ($key != 'generalSearch') {
                    $this->db->where($key, $val);
                }
            }
        }

        $sort = !empty($option['sort']['sort']) ? $option['sort']['sort'] : 'desc';
        $field = !empty($option['sort']['field']) ? $option['sort']['field'] : 'trip_id';

		$this->db->select('a.id as mt_id, b.*');
		$this->db->from($this->table.' a');
		$this->db->join('trip b', 'a.trip_id = b.id', 'left');
		$this->db->where('b.is_delete', '0');
		return $this->db->get()->result_array();
	}
}