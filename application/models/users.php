<?php
	
	class Users extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_user($id){
			$query = $this->db->get_where('users', array('uid' => $id));
			return $query->row_array();
		}

		public function add_user($mail, $pw, $nickname){

			// 错误信息
			$error = array(
				'code' => '-1',
				'msg' => '无',
			);

			// 加载类库
			$this->load->helper('email');

			// 注册逻辑
			if(empty($mail)){
				$error['msg'] = '邮箱地址不能为空';
			} else if(!valid_email($mail)){
				$error['msg'] = '邮箱地址格式不正确';
			} else if(empty($pw)){
				$error['msg'] = '密码不能为空';
			} else if(strlen($pw) < 6){
				$error['msg'] = '密码长度不小于6位';
			} else if(empty($nickname)){
				$error['msg'] = '昵称不能为空';
			} else {
				$result_mail = $this->db->get_where('users', array('mail' => $mail))->row_array();
				$result_nickname = $this->db->get_where('users', array('nickname' => $nickname))->row_array();
				
				if(!empty($result_mail)){
					$error['msg'] = '邮箱地址已存在';
				} else if(!empty($result_nickname)){
					$error['msg'] = '昵称已存在';
				}
			}
			
			return $error;
		}

		public function del_user($id){

		}

		public function update_user(){

		}
	}

?>