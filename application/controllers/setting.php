<?php 

	class Setting extends CI_Controller{

		public function index(){

			// 模板变量
			$data = array(
				'title' => '修改资料',
				'page' => 'profile',
				'current_user'  => $this->auth->get_current_user(),
			);

			// 模板输出
			$this->load->view('pages/setting', $data);
		}

		// 修改头像
		public function avatar(){

			// 模板变量
			$data = array(
				'title' => '修改头像',
				'page' => 'avatar',
				'current_user'  => $this->auth->get_current_user(),
			);

			// 模板输出
			$this->load->view('pages/setting', $data);
		}

		// 修改密码
		public function pw(){
			// 模板变量
			$data = array(
				'title' => '修改密码',
				'page' => 'pw',
				'current_user'  => $this->auth->get_current_user(),
			);

			// 模板输出
			$this->load->view('pages/setting', $data);
		}
	}

?>