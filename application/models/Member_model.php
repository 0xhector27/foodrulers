<?php
class Member_model extends CI_Model {

	private $table = "member";

	public function get_member_list($option){
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
        $field = !empty($option['sort']['field']) ? $option['sort']['field'] : 'created_at';

        $this->db->select('*');
        $this->db->from($this->table);
		$this->db->where('is_delete', '0');
        $this->db->order_by($field, $sort);
		
		return $this->db->get()->result_array();
	}

    public function get_member_by_id($id){
        $this->db->select("a.*, b.id as cid, b.full_name, b.code");
        $this->db->from($this->table.' a');
        $this->db->where('a.id', $id);
        $this->db->join('country_list b', 'b.id = a.country_id', 'left');
        return $this->db->get()->row_array();
    }
}