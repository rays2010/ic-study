<?php
	
	class Items extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_items(){
			$user = $this->auth->get_current_user();
			$sql = 
			"SELECT
					uid, iid, text, type, avatar, nickname, praise_count, items.cover, items.created, t_title,
					IF(praises.p_item, '1', '0') AS isUp
				FROM
					items
				INNER JOIN
					users
				ON
					items.author_id = users.uid
				LEFT OUTER JOIN
					topics
				ON
					topics.tid = items.parent_id
				LEFT OUTER JOIN
					praises
				ON
					items.iid = praises.p_item AND praises.p_author = ".$user['uid']."
				ORDER BY
					items.created 
				DESC";
			$query = $this->db->query($sql);
			return $query->result_array();
			// $this->db->select('uid, iid, text, type, avatar, nickname, items.cover, items.created, t_title, p_author AS isUp');
			// $this->db->from('items');
			// $this->db->order_by('created', 'desc');
			// $this->db->join('users', 'users.uid = items.author_id', 'inner');
			// $this->db->join('topics', 'topics.tid = items.parent_id', 'left outer');
			// $this->db->join('praises', 'items.iid = praises.p_item AND praises.p_author = 1' , 'left outer');
			// $query = $this->db->get();
			// return $query->result_array();
		}

		public function get_item_by_id($id){
			$query = $this->db->get_where('items', array('iid' => $id));
			return $query->row_array();
		}

		public function get_item_by_user($id){
			$this->db->select('uid, iid, text, type, avatar, nickname, items.cover, items.created, t_title');
			$this->db->from('items');
			$this->db->order_by('created', 'desc');
			$this->db->join('users', 'users.uid = items.author_id', 'inner');
			$this->db->join('topics', 'topics.tid = items.parent_id', 'left outer');
			$this->db->where('users.uid', $id);
			// $this->db->join('topics', 'topics.tid = items.parent_id');
			$query = $this->db->get();
			return $query->result_array();
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

		// 点赞
		public function up($id){
			$user = $this->auth->get_current_user();
			$values = array('p_item'=> $id, 'p_author'=> $user['uid']);
			$query = $this->db->get_where('praises', $values);
			if($query->num_rows > 0){
				$this->db->update('praises', array('created' =>  date('y-m-d H:i:s',time())), $values);
			} else {
				$values['created'] = date('y-m-d H:i:s',time());
				$this->db->set($values); 
				$this->db->insert('praises'); 
			}

			// 更新点赞数
			$query = $this->db->get_where('praises', array('p_item' => $id));
			$num = $query->num_rows();
			$this->db->update('items', array('praise_count' => $num), array('iid'=>$id));
		}

		// 取消点赞
		public function unup($id){
			$user = $this->auth->get_current_user();
			$values = array('p_item'=> $id, 'p_author'=> $user['uid']);
			$this->db->delete('praises', $values);

			// 更新点赞数
			$query = $this->db->get_where('praises', array('p_item' => $id));
			$num = $query->num_rows();
			$this->db->update('items', array('praise_count' => $num), array('iid'=>$id));
		}
	}

?>