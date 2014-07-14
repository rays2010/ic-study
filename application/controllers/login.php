<?php 

	class Login extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('users');
		}

		public function index(){

			$mail = $this->input->post('mail');
			$pw = $this->input->post('pw');
			
			if(!empty($mail) && !empty($pw)){
				$result = $this->users->login($mail, $pw);
				if($result['code'] > 0){
					$this->load->helper('url');
					redirect('/', 'refresh');
				} else {
					echo '登录失败';
				}
			}

			$data['title'] = '登录';
			$this->load->view('templates/header', $data);
			$this->load->view('pages/login', $data);
			$this->load->view('templates/footer', $data);
		}
	}

?>