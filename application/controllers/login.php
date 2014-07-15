<?php 

	class Login extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('users');
		}

		public function index(){

			// 请求处理
			$mail = $this->input->post('mail');
			$pw = $this->input->post('pw');
			
			if(!empty($mail) && !empty($pw)){
				$result = $this->users->login($mail, $pw);
				if($result['code'] > 0){
					redirect('/');
				} else {
					echo '登录失败';
				}
			}

			// 模板变量
			$data = array(
				'title' => '登录',
			);

			// 模板输出
			$this->load->view('pages/login', $data);
			
		}
	}

?>