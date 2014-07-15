<?php
	
	class Users extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		// 根据id取单个用户
		public function get_user($id){
			$query = $this->db->get_where('users', array('uid' => $id));
			return $query->row_array();
		}

		public function get_nickname($id){
			$query = $this->db->select('nickname')->get_where('users', array('uid' => $id));
			return $query->row()->nickname;
		}

		// 登录
		public function login($mail, $pw){
			// 错误信息
			$error = array(
				'code' => '-1',
				'msg' => '无',
			);

			// 登录逻辑
			if(empty($mail)){
				$error['msg'] = '邮箱地址不能为空';
			} else if(!valid_email($mail)){
				$error['msg'] = '邮箱地址格式不正确';
			} else if(empty($pw)){
				$error['msg'] = '密码不能为空';
			} else {
				$result = $this->db->get_where('users', array('mail' => $mail, 'password' => do_hash($pw, 'md5')))->row_array();
				if(!empty($result)){
					$error['code'] = 1;
					$error['msg'] = '登录成功';

					$newdata = array(
					   'uid' => $result['uid'],
	                   'nickname'  => $result['nickname'],
	                   'mail'     => $result['mail'],
	                   'logged_in' => TRUE
	                );
					$this->session->set_userdata(array('user'=> serialize($newdata)));
				} else {
					$error['code'] = '-1';
					$error['msg'] = '登录失败';
				}
			}

			return $error;
		}

		// 注册
		public function add_user($mail, $pw, $nickname){

			// 错误信息
			$error = array(
				'code' => '-1',
				'msg' => '无',
			);

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
				} else {
					$data = array(
						'mail' => $mail,
						'password' => do_hash($pw, 'md5'),
						'nickname' => $nickname,
						'avatar' => '-',
						'group' => 'user',
						'register_time' => date('y-m-d H:i:s',time()),
						'last_login_time' => date('y-m-d H:i:s',time())
					);
					$this->db->insert('users', $data);
					$error['code'] = 1;
					$error['msg'] = '注册成功';

					// 设置session
					$this->db->select('uid');
					$query = $this->db->get_where('users', array('mail' => $mail));
					$resutl = $query->row_array();

					$newdata = array(
					   'uid' => $resutl['uid'],
	                   'nickname'  => $nickname,
	                   'mail'     => $mail,
	                   'logged_in' => TRUE
	                );
					$this->session->set_userdata(array('user'=> serialize($newdata)));
				}
			}

			return $error;
		}

		// 删除用户
		public function del_user($id){

		}

		// 更新用户资料
		public function update_user(){

		}
	}

?>