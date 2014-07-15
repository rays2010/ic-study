<?php 
	class Index extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model(array('users', 'items', 'topics'));
		}

		public function index(){

			// 模板变量
			$data = array(
				'title' => '首页',
				'user'  => $this->auth->get_current_user(),
				'item'  => $this->items->get_items(),
				'topic' => $this->topics->get_recent_topic(),
			);

			// 输出模板
			$this->load->view('pages/index', $data);
		}
	}
?>