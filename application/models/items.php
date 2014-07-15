<?php
	
	class Items extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_items(){
			$this->db->select('*');
			$this->db->from('items');
			$this->db->order_by('created', 'desc');

			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_item_by_id($id){
			$query = $this->db->get_where('items', array('iid' => $id));
			return $query->row_array();
		}

		public function get_item_by_user($id){
			$this->db->order_by('created', 'desc');
			$query = $this->db->get_where('items', array('author_id' => $id));
			return $query->result();
		}

		public function add_item($text){
			$user = unserialize($this->session->userdata('user'));
			$data = array(
				'title' => $text,
				'slug' => '-',
				'created' => date('y-m-d H:i:s',time()),
				'modified' => date('y-m-d H:i:s',time()),
				'text' => $text,
				'author_id' => $user['uid'],
				'type' => 'post',
				'status' => 'publish',
				'comment_count' => 0
			);
			$result = $this->db->insert('items', $data);
		}

		public function update_item(){

		}

		public function del_item($pid){

		}
	}

?>