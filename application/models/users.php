<?php
	
	class Users extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_user($id){
			$query = $this->db->get_where('users', array('uid' => $id));
			return $query->row_array();
		}

		public function add_user(){

			return;
		}

		public function del_user($id){

		}

		public function update_user(){

		}
	}

?>