<?php 
		
	class Topics extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_topics(){
			$this->db->select('*');
			$this->db->from('topics');
			$this->db->order_by('created', 'desc');

			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_topic($id){
			$query = $this->db->get_where('topics', array('tid' => $id));
			return $query->row_array();
		}

		public function get_recent_topic(){
			$this->db->select('*');
			$this->db->from('topics');
			$this->db->order_by('created', 'desc');

			$query = $this->db->get();
			return $query->row_array();
		}

		public function add_topic($text){
			$user = unserialize($this->session->userdata('user'));
			$data = array(
				'title' => $text,
				'excerpt' => $text,
				'created' => date('y-m-d H:i:s',time()),
				'modified' => date('y-m-d H:i:s',time()),
				'cover' => 'cover.jpg',
				'author_id' => $user['uid']
			);
			$result = $this->db->insert('topics', $data);
		}

		public function del_topic(){

		}

		public function update_topic(){

		}
	}

?>