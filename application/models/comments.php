<?php 
	
	class Comments extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_comments($iid){
			$query = $this->db->select('*')->get_where('comments', array('item_id'=>$iid));
			return $query->result_array();
		}

		public function add_comment($iid, $text, $parent_id=0){
			$user = $this->auth->get_current_user();
			$data = array(
				'item_id' => $iid,
				'author_id' => $user['uid'],
				'parent_id' => $parent_id,
				'created' => date('y-m-d H:i:s',time()),
				'ip' => '127.0.0.1',
				'content' => $text,
				'agent' => 'chrome',
			);
			$result = $this->db->insert('comments', $data);
		}

		public function del_comment($cid){

		}
	}

?>