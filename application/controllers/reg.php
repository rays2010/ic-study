<?php 

	class Reg extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('users');
		}

		public function index(){

			// 模板变量
			$data['title'] = '注册';

			// 模板渲染
			$this->load->view('templates/header', $data);
			$this->load->view('pages/reg', $data);
			$this->load->view('templates/footer');

		}

		public function create(){
			$error = array(
				'code' => '-1',
				'msg' => '无',
			);

			$mail = $this->input->post('mail');
			$pw = $this->input->post('pw');
			$nickname = $this->input->post('nickname');

			$result = $this->users->add_user($mail, $pw, $nickname);

			// 模板变量
			$data['title'] = '注册';
			$data['error'] = $result;

			// 模板渲染
			$this->load->view('templates/header', $data);
			$this->load->view('pages/reg_done', $data);
			$this->load->view('templates/footer');
		}
	}

?>