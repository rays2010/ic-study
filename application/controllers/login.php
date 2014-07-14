<?php 

	class Login extends CI_Controller{

		public function index(){
			$data['title'] = '登录';
			$this->load->view('templates/header', $data);
			$this->load->view('pages/login', $data);
			$this->load->view('templates/footer', $data);
		}

		public function create(){
			$data = array(
				'mail' => $this->input->post('mail')
			);
			$data_flag = false;
			if($data_flag){
				$data['reg'] = '成功';
			} else {
				$data['reg'] = '失败';
			}

			$this->load->view('templates/header', $data);
			$this->load->view('pages/reg_done', $data);
			$this->load->view('templates/footer');
		}
	}

?>