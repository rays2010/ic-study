<?php 
	class Auth{

		public function __construct()
	    {
	        /* 获取CI句柄 */
			$this->_CI = & get_instance();
	    }

		public function login($user){
			$user = array(
				'is_login' => TRUE,
				'mail' => $user['mail'],
				'nickname' => $user['nickname'],
				'uid' => $user['uid'],
				'avatar' => $user['avatar'],
			);
			$this->_CI->session->set_userdata(array('user'=> serialize($user)));
		}

		public function logout(){
			$this->_CI->session->sess_destroy();
		}

		public function get_current_user(){
			$user = unserialize($this->_CI->session->userdata('user'));
			if(empty($user)) return null;
			return $user;
		}

		public function get_ID(){
			$user = $this->get_current_user();
			return $user['uid'];
		}

		public function get_nickname(){
			$user = $this->get_current_user();
			return $user['nickname'];
		}

		public function get_mail(){
			$user = $this->get_current_user();
			return $user['mail'];
		}

	}
?>