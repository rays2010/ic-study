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

			// 信
			$sender_id = $this->auth->get_ID();
			$letter_s = array();
			$letter_r = array();
			$msg = array(
				'author_id' => $sender_id,
				'text' => $text,
				'created' => date('y-m-d H:i:s',time()),
			);

			// 发信人列表
			$query = $this->db->get_where('letters', array('sender_id'=>$sender_id, 'receiver_id'=>$receiver_id));
			if($query->num_rows() > 0 ){
				$query = $this->db->select('content')->get_where('letters', array('sender_id'=>$sender_id, 'receiver_id'=>$receiver_id))->row_array();
				$letter_s = unserialize($query['content']);
				array_push($letter_s, $msg);
				$data = array(
					'content' => serialize($letter_s),
					'modified' => date('y-m-d H:i:s',time()),
				);

				// 更新发送者的列表
				$this->db->where(array('sender_id'=>$sender_id, 'receiver_id'=>$receiver_id));
				$query = $this->db->update('letters', $data);
			} 
			else {
				array_push($letter_s, $msg);
				$data = array(
					'content' => serialize($letter_s),
					'unread' => 0,
					'sender_id' => $sender_id,
					'receiver_id' => $receiver_id,
					'created' => date('y-m-d H:i:s',time()),
					'modified' => date('y-m-d H:i:s',time()),
				);
				$query = $this->db->insert('letters', $data);
			}

			// 收件人列表
			$query = $this->db->get_where('letters', array('sender_id'=>$receiver_id, 'receiver_id'=>$sender_id));
			if($query->num_rows() > 0 ){
				$query = $this->db->select('content')->get_where('letters', array('sender_id'=>$receiver_id, 'receiver_id'=>$sender_id))->row_array();
				$letter_r = unserialize($query['content']);
				array_push($letter_r, $msg);
				$query = $this->db->select('unread')->get_where('letters', array('sender_id'=>$receiver_id, 'receiver_id'=>$sender_id))->row_array();
				$this->db->where(array('sender_id'=>$receiver_id, 'receiver_id'=>$sender_id));
				$data = array(
					'content' => serialize($letter_r),
					'modified' => date('y-m-d H:i:s',time()),
					'sender_id' => $receiver_id,
					'receiver_id' => $sender_id,
					'unread' => ++$query['unread'],
				);
				$query = $this->db->update('letters', $data);
			} else {
				array_push($letter_r, $msg);
				$data = array(
					'content' => serialize($letter_r),
					'unread' => 1,
					'sender_id' => $receiver_id,
					'receiver_id' => $sender_id,
					'created' => date('y-m-d H:i:s',time()),
					'modified' => date('y-m-d H:i:s',time()),
				);
				$query = $this->db->insert('letters', $data);
			}
		}

		public function set_readed($receiver_id){
			$sender_id = $this->auth->get_ID();
			$this->db->where(array('sender_id'=>$sender_id, 'receiver_id'=>$receiver_id));		
			$query = $this->db->update('letters', array('unread'=> '0'));
		}

		public function fetch($receiver_id){
			$sender_id = $this->auth->get_ID();
			$query = $this->db->get_where('letters', array('sender_id'=>$sender_id, 'receiver_id'=>$receiver_id));
			$result = $query->row_array();
			return $result;
		}

		public function del($receiver_id){
			$sender_id = $this->auth->get_ID();
			$query = $this->db->get_where('letters', array('sender_id'=>$sender_id, 'receiver_id'=>$receiver_id));
			if($query->num_rows() > 0 ){
				$query = $this->db->delete('letters', array('sender_id'=>$sender_id, 'receiver_id'=>$receiver_id));
			}
		}

	}

?>