<?php
	
	class Items extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_items(){
			$this->db->select('uid, iid, text, type, avatar, nickname, items.cover, items.created, t_title');
			$this->db->from('items');
			$this->db->order_by('created', 'desc');
			$this->db->join('users', 'users.uid = items.author_id', 'inner');
			$this->db->join('topics', 'topics.tid = items.parent_id', 'left outer');
			// $this->db->join('topics', 'topics.tid = items.parent_id');
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

		public function add_item($text, $cover = ''){
			$user = $this->auth->get_current_user();
			$data = array(
				'title' => $text,
				'slug' => '-',
				'created' => date('y-m-d H:i:s',time()),
				'modified' => date('y-m-d H:i:s',time()),
				'text' => $text,
				'author_id' => $user['uid'],
				'type' => 'post',
				'cover' => $cover,
				'status' => 'publish',
				'comment_count' => 0
			);
			$result = $this->db->insert('items', $data);
		}

		public function edit_item($id, $data){
			$this->db->where('iid', $id);
			$this->db->update('items', $data);
		}

		public function del_item($id){
			$this->db->delete('items', array('iid'=> $id));
		}

		public function can_edit($id){
			$user = $this->auth->get_current_user();
			$this->db->select('author_id');
			$query = $this->db->get_where('items', array('iid' => $id));
			$result = $query->row_array();
			if($result['author_id'] == $user['uid']){
				return true;
			} else {
				return false;
			}
		}
	}

?>