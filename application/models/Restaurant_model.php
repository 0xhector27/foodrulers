<?php

class Restaurant_model extends CI_Model{

	private $table = 'restaurant';

	public function get_restaurant_list($option){
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
        $field = !empty($option['sort']['field']) ? $option['sort']['field'] : 'a.id';

        $this->db->select('a.*, b.f_name');
        $this->db->from($this->table.' a');
        $this->db->where('a.is_delete', '0');
        $this->db->join('member b', 'a.owner_id = b.id', 'left');
        $this->db->where('b.is_delete', '0');
        $this->db->order_by($field, $sort);
		
		return $this->db->get()->result_array();
	}
}