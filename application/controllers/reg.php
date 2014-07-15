<?php 

	class Reg extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('users');
		}

		public function index(){

			// 模板变量
			$data = array(
				'title' => '注册',
				'page' => 'index',
			);

			// 模板渲染
			$this->load->view('pages/reg', $data);
		}

		public function add(){

			// 请求
			$mail = $this->input->post('mail');
			$pw = $this->input->post('pw');
			$nickname = $this->input->post('nickname');

			// 注册
			$result = $this->users->add_user($mail, $pw, $nickname);

			if($result['code'] > 0){
				$page = 'finish';
			} else {
				$page = 'error';
			}

			// 模板变量
			$data = array(
				'title' => '注册',
				'page' => $page,
				'error' => $result,
			);

			// 模板输出
			$this->load->view('pages/reg', $data);
			
		}
	}

?>