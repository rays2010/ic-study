<?php 
		
	class Topics extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_topics($array = null){

			// 取特定用户的创建的话题
			if(isset($array['author_id'])){
				$a = ' AND t_author_id='.$array['author_id'];
			} else {
				$a = '';
			}

			$this->db->select('tid, t_title, t_excerpt, t_created, t_cover, nickname');
			$this->db->from('topics');
			$this->db->order_by('t_created', 'desc');
			$this->db->join('users', 'users.uid = t_author_id'.$a, 'inner');

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
			$this->db->order_by('t_created', 'desc');

			$query = $this->db->get();
			return $query->row_array();
		}

		public function add_topic($title, $text, $id, $cover){
			$data = array(
				't_title' => $title,
				't_excerpt' => $text,
				't_created' => date('y-m-d H:i:s',time()),
				't_modified' => date('y-m-d H:i:s',time()),
				't_cover' => $cover,
				't_author_id' => $id,
			);
			$result = $this->db->insert('topics', $data);
			return $result;
		}

		public function del_topic(){

		}

		public function update_topic(){

		}
	}

?>