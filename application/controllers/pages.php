<?php 
	class Pages extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('users');
		}

		public function index(){
			$data['title'] = '首页';


			$this->load->library('session');
			$data['user'] = unserialize($this->session->userdata('user'));

			$this->load->view('templates/header', $data);
			$this->load->view('pages/index', $data);
			$this->load->view('templates/footer', $data);
		}
	}
?>