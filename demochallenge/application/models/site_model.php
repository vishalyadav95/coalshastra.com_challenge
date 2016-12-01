<?php 

class Site_model extends CI_Model {

	function get_records() {
		//$this->db->from($this->data);
		$this->db->order_by("timestamp", "desc");
		$q = $this->db->get('data', 5, $this->uri->segment(3)); // 5 is per page
		return $q->result();		
	}

	function add_record($data) {
		$this->db->insert('data', $data);
		return;
	}

	/*function update_record($data) {
		$this->db->where('id',4);
		$this->db->update('data',$data);
	}*/

	function delete_row() {
		$this->db->where('id',$this->uri->segment(3));
		$this->db->delete('data');
	}

}