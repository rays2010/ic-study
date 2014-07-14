<?php 
	class Pages extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('users');
		}

		public function view($page = 'home'){
			if(! file_exists(APPPATH.'/views/pages/'.$page.'.php')){
				show_404();
			}

			// 根据id取用户
			$data['user'] = $this->users->get_user(1);

			// 添加用户

			// 删除用户

			// 更新用户资料

			// template outing
			$data['title'] = ucfirst($page);
			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer', $data);
		}
	}
?>