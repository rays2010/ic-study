<?php 

	class Letters extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function fetch_list(){
			$sender_id = $this->auth->get_ID();
			$query = $this->db->get_where('letters', array('sender_id'=>$sender_id));
			$result = $query->result_array();
			return $result;
		}

		public function add($receiver_id, $text){
			$sender_id = $this->auth->get_ID();
			$query = $this->db->get_where('letters', array('sender_id'=>$sender_id, 'receiver_id'=>$receiver_id));
			$letter = array();
			$msg = array(
				'author_id' => $sender_id,
				'text' => $text,
				'created' => date('y-m-d H:i:s',time()),
			);
			// 发信人列表
			if($query->num_rows() >0 ){
				$query = $this->db->select('content')->get_where('letters', array('sender_id'=>$sender_id, 'receiver_id'=>$receiver_id))->row_array();
				$letter = unserialize($query['content']);
				array_push($letter, $msg);
				$data = array(
					'content' => serialize($letter),
					'modified' => date('y-m-d H:i:s',time()),
				);
				$this->db->where(array('sender_id'=>$sender_id, 'receiver_id'=>$receiver_id));
				$query = $this->db->update('letters', $data);
			} else {
				array_push($letter, $msg);
				$data = array(
					'content' => serialize($letter),
					'parent_id' => 0,
					'sender_id' => $sender_id,
					'receiver_id' => $receiver_id,
					'created' => date('y-m-d H:i:s',time()),
					'modified' => date('y-m-d H:i:s',time()),
				);
				$query = $this->db->insert('letters', $data);
			}
		}

		public function fetch($receiver_id){
			$sender_id = $this->auth->get_ID();
			$query = $this->db->get_where('letters', array('sender_id'=>$sender_id, 'receiver_id'=>$receiver_id));
			$result = $query->row_array();
			return $result;
		}

		public function del($receiver_id){

		}

	}

?>