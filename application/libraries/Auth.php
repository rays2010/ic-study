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
			);
			$this->_CI->session->set_userdata(array('user'=> serialize($user)));
		}

		public function logout(){
			$this->_CI->session->sess_destroy();
		}

		public function get_current_user(){
			$user = unserialize($this->_CI->session->userdata('user'));
			return $user;
		}

	}
?>