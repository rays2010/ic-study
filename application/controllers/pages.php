<?php 
	class Pages extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('users');
		}

		public function index(){
			$data['title'] = '首页';
			$this->load->view('templates/header', $data);
			$this->load->view('pages/home', $data);
			$this->load->view('templates/footer', $data);
		}

		public function view(){

			// 根据id取用户
			$data['user'] = $this->users->get_user(1);

			// 添加用户

			// 删除用户

			// 更新用户资料

			// template outing
			$data['title'] = $page;
			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer', $data);
		}
	}
?>