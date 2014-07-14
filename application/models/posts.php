<?php
	
	class Posts extends CI_Model{
		public function __construct(){
			$this->load->database();
			$this->load->helper('email');
			$this->load->helper('security');
			$this->load->library('session');
		}

		public function add_post($text, ){

		}

		public function update_post(){

		}

		public function del_post($pid){

		}
	}

?>